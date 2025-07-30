<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayoutController extends Controller
{
    
    public function home()
    {
        return view('home');
    }

      public function contact()
    {
        return view('contact');
    }
}
