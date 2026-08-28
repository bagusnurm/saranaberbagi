<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Serve the single-page application view.
     */
    public function index()
    {
        return view('app');
    }
}
