<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function visitShops(){
    	return view('shops');
    }

    public function addDetails(){
    	return view('shop/adddetails');
    }
}
