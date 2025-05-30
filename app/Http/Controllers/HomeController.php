<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home')->with('welcome', true);; // This will point to the home view
    }
    
}
