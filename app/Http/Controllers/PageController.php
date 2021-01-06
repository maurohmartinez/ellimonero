<?php

namespace App\Http\Controllers;

use Backpack\PageManager\app\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Show home
     */
    public function home()
    {
        // $this->data['title'] = 'Hey';
        return view('home.index');
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
