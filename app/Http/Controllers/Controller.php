<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}

class ViewController extends Controller
{
    /**
     * Display a view dynamically if it exists.
     *
     * @param string $view
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($view)
    {
        // Check if the view exists
        if (View::exists($view)) {
            return view($view);
        }

        // Return a 404 error page if the view does not exist
        return response()->view('errors.404', [], 404);
    }
}
