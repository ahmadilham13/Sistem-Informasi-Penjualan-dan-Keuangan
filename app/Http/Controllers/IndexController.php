<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class IndexController extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function __invoke(Request $request): View
    {
        return view('index.index');
    }
}
