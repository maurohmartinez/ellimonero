<?php

namespace App\Http\Controllers;

use App\Models\Qr;
use Backpack\PageManager\app\Models\Page;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use App\Traits\HandleQrResponse;
use App;

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
     * Handle QR
     * 
     * @param string $token
     */
    public function qr($token)
    {
        $this->data['title'] = 'QR';
        
        // Validate
        if(!Qr::where('token', $token)->exists()){
            return redirect(route('qr.error', ['error' => 'doesnt_exist']));
        }

        $qr = Qr::where('token', $token)->first();

        // Is logged
        if(backpack_auth()->check()){
            return $this->addQrToUser($qr);
        }

        // Save session with QR
        Session::put('qr', $token);

        return view('qr.index', $this->data);
    }

    /**
     * Handle QR success
     * 
     * @param string $token
     */
    public function qrSuccess($token)
    {
        $this->data['title'] = '¡QR listo!';
        if(backpack_user()->qr()->where('token', $token)->doesntExist()){
            abort(404);
        }
        return view('qr.success', $this->data);
    }

    /**
     * Handle QR error
     * 
     * @param string $error
     */
    public function qrError()
    {
        $this->data['title'] = 'QR ya utilizado';        
        return view('qr.error');
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
