<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;

class UserUpdateController extends Controller
{
    public function updateUser(Request $request){

    	$user = Auth::user();
        Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        if($request['reset_password']){
           Validator::make($request, [
            'password' => 'required|string|min:6|confirmed',
        ]); 
        }

        $user = Auth::user();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->address = $request['address'];
        $user->tel = $request['tel'];
        if($request['reset_password']){
           $user->password = bcrypt($request['password']);
        }
        $user->save();

        return redirect()->route('home');


    }
}
