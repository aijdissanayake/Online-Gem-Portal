<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if(Auth::user()->role == 'shop'){
        return view('/shop/home');
        }

        if(Auth::user()->role == 'buyer'){
        return view('/buyer/home');
        }

        if(Auth::user()->role == 'admin'){
        return view('/admin/home');
        }
    }
}
