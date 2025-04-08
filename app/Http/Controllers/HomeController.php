<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Dynamically show any view if it exists.
     *
     * @param string $view
     * @return \Illuminate\Contracts\Support\Renderable|\Illuminate\Http\Response
     */
    public function show($view)
    {
        if (View::exists($view)) {
            return view($view);
        }

        return response()->view('errors.404', [], 404);
    }
}