<?php

namespace App\Http\Controllers;

use App\Models\Qr;
use Backpack\PageManager\app\Models\Page;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use App\Traits\HandleQrResponse;
use App\Models\Product;

class PageController extends Controller
{
    use HandleQrResponse;

    /**
     * Show home
     */
    public function home()
    {
        return view('home.index');
    }

    /**
     * Show shop
     */
    public function shop()
    {
        $products = Product::activo()->orderBy('lft', 'ASC')->onTime()->get();
        $this->data['title'] = 'tienda';
        return view('shop.index', ['products' => $products, 'data' => $this->data]);
    }
    
    /**
     * Show cita con el amor landing
     */
    public function cita()
    {
        $this->data['title'] = 'Cita con el amor';
        return view('cita.index', $this->data);
    }
    
    /**
     * Show RNG landing
     */
    public function rnf()
    {
        $this->data['title'] = 'RNF';
        return view('rnf.index', $this->data);
    }
    
    /**
     * Show Mundo Maxi landing
     */
    public function mundoMaxi()
    {
        $this->data['title'] = 'Mundo Maxi';
        return view('mundo-maxi.index', $this->data);
    }

    /**
     * Show product
     */
    public function product($slug)
    {
        $product = Product::activo()->onTime()->where('slug', $slug)->firstOrFail();
        return view('product', ['product' => $product]);
    }

    /**
     * Handle QR
     * 
     * @param string $token
     */
    public function qr($token)
    {
        $this->data['title'] = 'QR';

        // Validate
        if (!Qr::where('token', $token)->exists()) {
            return redirect(route('qr.error', ['error' => 'doesnt_exist']));
        }

        $qr = Qr::where('token', $token)->first();

        // Is logged
        if (backpack_auth()->check()) {
            return $this->addQrToUser($qr);
        }

        // Save session with QR
        Session::put('qr', $token);
        $this->data['qr'] = $qr;

        return view('qr.index', $this->data);
    }

    /**
     * Handle QR success
     * 
     * @param string $token
     */
    public function qrSuccess($token)
    {
        if (backpack_user()->qr()->where('token', $token)->doesntExist()) {
            abort(404);
        }
        
        $qr = Qr::where('token', $token)->first();
        
        $this->data['title'] = '¡QR escaneado!';
        $this->data['qr'] = $qr;
        
        return view('qr.success', $this->data);
    }

    /**
     * Handle QR error
     * 
     * @param string $error
     */
    public function qrError($error)
    {
        $this->data['feedback'] = 'El código QR escaneado es inválido.';

        switch ($error) {
            case 'already_used':
                $this->data['feedback'] = 'Ya has utilizado este código QR.';
                break;
            case 'expired':
                $this->data['feedback'] = 'El código QR escaneado no existe o ya venció.';
                break;
            case 'failed':
                $this->data['feedback'] = 'Ocurrió un error y no pudimos completar la operación para el código QR escaneado. Por favor, intentá nuevamente o contactate con nosotros si el error persiste.';
                break;
            case 'deactivated':
                $this->data['feedback'] = 'El código QR escaneado está desactivado.';
                break;
            case 'out_of_stock':
                $this->data['feedback'] = 'Lo sentimos, pero se ha terminado el stock. En las próxmas semanas haremos nuevos sorteos y subastaremos productos de nuestros invitados especiales, ¡quedate cerca de nuestra Tienda Limonera!';
                break;
        }

        $this->data['title'] = 'QR inválido';
        return view('qr.error', $this->data);
    }

    /**
     * 
     * @param string $slug
     * @param string|null $subs
     */
    public function index($slug, $subs = null)
    {
        $page = Page::findBySlug($slug);

        if (!$page) {
            abort(404, 'Regresar a <a href="' . url('') . '">página principal</a>.');
        }

        $this->data['title'] = $page->title;
        $this->data['page'] = $page->withFakes();

        return view('pages.' . $page->template, $this->data);
    }
}
