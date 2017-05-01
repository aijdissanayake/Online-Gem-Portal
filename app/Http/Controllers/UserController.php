<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\User;

class UserController extends Controller
{   
    public function viewProfile(){
        return view('profile');
    }
    public function updateUser(Request $request){

    	$user = Auth::user();



        $validator = Validator::make($request->all(), [
            'email' => [
                'required','email','max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'tel' => [
                'size:9'
            ],

        ]);

        if ($validator->fails()) {
            return redirect('/update')
                        ->withErrors($validator)
                        ->withInput();
        }

        if($request['reset_password']){
            

            $this->validate($request, [
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

        return redirect()->route('profile_view');


    }
    public function deActivate($id){
        $user = User::find($id);
        $user->active = (!$user->active);
        $user->save();
        return back();

    }
}
