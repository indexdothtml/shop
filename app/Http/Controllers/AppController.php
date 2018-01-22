<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AppController extends Controller
{
    /**
     * Home page
     *
     * @return View
     */
    public function home() : View
    {
        return view('app.welcome');
    }

    /**
     * Profile page
     *
     * @return View
     */
    public function profile() : View
    {
        return view('app.profile');
    }
}
