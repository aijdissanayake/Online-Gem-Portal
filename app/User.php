<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role','address','tele','active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function shop(){
        return $this->hasOne('App\Shop');
    }

    public static function create($name, $role, $email, $password){

        $user = new User();
        $user->name=$name;
        $user->role=$role;
        $user->email=$email;
        $user->password=$password;

        return $user;
    }

    public static function deActivate(){

        $user = User::find($id);

        if ($user == null){
            return false;
        }

        $user->active = (!$user->active);
        return true;
    }

    

    public function store(){
        $this->save();
    }
}
