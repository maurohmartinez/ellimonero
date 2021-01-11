<?php

namespace App\Http\Controllers;

use App\Mail\OrderPaid;
use App\MercadoPago;
use App\Models\Product;
use Exception;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    /**
     * Checkout page
     * 
     */
    public function index()
    {
        $this->data['title'] = 'Checkout';
        $this->data['has_items'] = backpack_user()->cart()->whereHas('product', function ($query) {
            $query
                ->activo()
                ->onTime()
                ->hasStock();
        })->exists();
        return view('checkout.index', $this->data);
    }

    /**
     * Init checkout payment - Post request
     * 
     */
    public function initPayment(Request $request)
    {
        if (backpack_user()->cart()->whereHas('product', function ($query) {
            $query
                ->activo()
                ->onTime()
                ->hasStock();
        })->doesntExist()) {
            abort(404);
        }

        DB::beginTransaction();
        try {
            // Create order
            $order = backpack_user()->orders()->create([
                'number'        => backpack_user()->id . '-' . time(),
                'total'         => $this->getCartTotal(),
                'products'      => $this->getProductForOrder(),
                'observations'  => $request->observations
            ]);

            // Clear cart
            backpack_user()->cart()->delete();

            // Decrement stock for products
            foreach ($order->products as $product) {
                Product::find($product['id'])->decrement('stock', $product['quantity']);
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Payment error: ' . $e->getMessage());

            // Redirect back with emessage
            return redirect(route('checkout'))->with('flash', [
                'text' => 'Ocurrió  un error al preparar tu orden para el pago. Intentá nuevamente y si el error persiste comunicate con nosotros.',
                'icon' => 'la-exclamation',
                'type' => 'danger'
            ]);
        }
        return redirect(route('checkout.payment', ['order_number' => $order->number]));
    }

    /**
     * Checkout payment
     * 
     */
    public function payment($order_number)
    {
        $order = backpack_user()->orders()->where('status', 'pending')->where('number', $order_number)->firstOrFail();

        // No products?
        if (count($order->products) == 0) {
            $order->delete();
            return redirect(route('profile.orders'))->with('flash', [
                'text' => 'La orden que estás buscando no existe.',
                'icon' => 'la-exclamation',
                'type' => 'danger'
            ]);
        }

        $mercadopago = new MercadoPago();

        $this->data['preference'] = $mercadopago->preference($order);
        $this->data['title'] = 'Checkout Pago';
        $this->data['order'] = $order;

        return view('checkout.payment', $this->data);
    }

    /**
     * Checkout payment response
     * 
     */
    public function paymentResponse(Request $request, $type, $order_number)
    {
        if ($type === 'success') {
            DB::beginTransaction();
            try {
                $mercadopago = new MercadoPago();
                $preference = $mercadopago->checkPayment($request->payment_id);

                // Update order
                backpack_user()->orders()->where('number', $order_number)->where('status', 'pending')->firstOrFail()->update(['status' => 'paid']);

                // Create payment
                backpack_user()->payments()->create([
                    'order_id' => backpack_user()->orders()->where('number', $order_number)->first()->id,
                    'mp' => [
                        'payment_id' => $request->payment_id,
                        'transaction_amount' => $preference->transaction_amount,
                        'date_approved' => $preference->date_approved,
                        'description' => $preference->description,
                        'payment_method_id' => $preference->payment_method_id,
                        'payment_type_id' => $preference->payment_type_id
                    ],
                    'status' => $preference->status,
                ]);

                DB::commit();
            } catch (Exception $e) {
                DB::rollBack();
                Log::error('Payment error: ' . $e->getMessage());

                // Redirect back with emessage
                return redirect(route('checkout'))->with('flash', [
                    'text' => 'Ocurrió  un error al intentar crear tu orden y tu pago ha sido cancelado.',
                    'icon' => 'la-exclamation',
                    'type' => 'danger'
                ]);
            }

            // Send email and redirect
            if ($preference->status === 'approved') {
                // Send email
                Mail::to(backpack_user()->email)->send(new OrderPaid($order_number));
                // Redirect
                return redirect(route('profile.order', ['order_number' => $order_number]))->with('flash', [
                    'text' => '¡Gracias por tu compra! Pronto recibirás un email con la confirmación.',
                    'type' => 'success'
                ]);
            }

            // Payment failed - not approved
            return redirect(route('checkout'))->with('flash', [
                'text' => 'Mercadopago nos informa que el estado de tu pago es: ' . $preference->status . '. Ante cualquier pregunta comunicate con nosotros.',
                'icon' => 'la-exclamation',
                'type' => 'danger'
            ]);
        }

        // Payment failed - probably skipped by user
        return redirect(route('checkout.payment', ['order_number' => $order_number]))->with('flash', [
            'text' => 'No se realizó el pago en Mercadopago.',
            'icon' => 'la-exclamation',
            'type' => 'danger'
        ]);
    }

    /**
     * Add product to cart
     * 
     */
    private function getCartTotal()
    {
        $items = backpack_user()->cart()->whereHas('product', function ($query) {
            $query
                ->activo()
                ->onTime()
                ->hasStock();
        })->get();

        $total  = 0;
        foreach ($items as $item) {
            $total += $item->product->final_price * $item->quantity;
        }

        return $total;
    }

    /**
     * Add product to cart
     * 
     */
    private function getProductForOrder()
    {
        $products = [];

        $items = backpack_user()->cart()->whereHas('product', function ($query) {
            $query
                ->activo()
                ->onTime()
                ->hasStock();
        })->get();

        foreach ($items as $item) {
            $products[] = [
                'id' => $item->product->id,
                'name' => $item->product->name,
                'image' => $item->product->images[0]['image_url'],
                'description' => $item->product->description,
                'price' => $item->product->final_price,
                'quantity' => $item->quantity,
            ];
        }

        return $products;
    }
}
