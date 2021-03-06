<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    /**
     * Show profile page
     */
    public function index()
    {
        $this->data['title'] = backpack_user()->name;
        return view('profile.index', $this->data);
    }

    /**
     * Show profile orders
     */
    public function orders()
    {
        $this->data['title'] = 'Compras';
        $this->data['orders'] = backpack_user()->orders()->latest()->get();
        return view('profile.orders', $this->data);
    }

    /**
     * Show order
     */
    public function tickets()
    {
        $this->data['title'] = 'Boletería';
        $this->data['tickets'] = backpack_user()->qr()->ticket()->get();
        return view('profile.tickets', $this->data);
    }

    /**
     * Show order
     */
    public function order($order_number)
    {
        $this->data['title'] = 'Compra';
        $this->data['order'] = backpack_user()->orders()->where('number', $order_number)->firstOrFail();
        return view('profile.order', $this->data);
    }

    /**
     * Process profile updated
     */
    public function updateInfo(Request $request)
    {
        // Validate
        $validated = Validator::make($request->all(), [
            'name'              => 'required|max:191|min:2',
            'email'             => 'required|email|max:255|confirmed|unique:users,email,' . backpack_user()->id,
        ], [], [
            'name' => 'nombre',
            'email' => 'correo electrónico'
        ])->validate();

        try {
            backpack_user()->update([
                'name' => $validated['name'],
                'email' => $validated['email']
            ]);
        } catch (Exception $e) {
            Log::error('Profile update failed: ' . $e->getMessage());
            return redirect(route('profile'))->with('flash', [
                'text' => App::environment('production') ? $e->getMessage() : 'Ocurrió un error y no pudimos completar la operación. Por favor, intentá nuevamente o contactate con nosotros si el error persiste.',
                'type' => 'danger',
                'icon' => 'la-exclamation'
            ]);
        }

        return redirect(route('profile'))->with('flash', [
            'text' => 'La información de tu perfil fue actualizada.',
            'type' => 'success'
        ]);
    }

    /**
     * Process password updated
     */
    public function updatePassword(Request $request)
    {
        // Validate
        $validated = Validator::make($request->all(), [
            'password'          => 'required|max:20|min:6|confirmed'
        ], [], [
            'password' => 'contraseña'
        ])->validate();

        try {
            backpack_user()->update([
                'password' => bcrypt($validated['password'])
            ]);
        } catch (Exception $e) {
            Log::error('Profile password update failed: ' . $e->getMessage());
            return redirect(route('profile'))->with('flash', [
                'text' => App::environment('production') ? $e->getMessage() : 'Ocurrió un error y no pudimos completar la operación. Por favor, intentá nuevamente o contactate con nosotros si el error persiste.',
                'type' => 'danger',
                'icon' => 'la-exclamation'
            ]);
        }

        return redirect(route('profile'))->with('flash', [
            'text' => 'La contraseña fue actualizada.',
            'type' => 'success'
        ]);
    }

    /**
     * Checkout page
     * 
     */
    public function checkout()
    {
        $this->data['title'] = 'Checkout';
        $this->data['items'] = backpack_user()->cart()->whereHas('product', function ($query) {
            // Regular
            $query->where(function ($q) {
                $q->where('type', 'regular')
                    ->activo()
                    ->onTime()
                    ->hasStock();
            })
                // is subasta
                ->orWhere(function ($qr) {
                    $qr->where('type', 'auction')
                        ->activo();
                });
        })->get();
        return view('checkout.index', $this->data);
    }
}
