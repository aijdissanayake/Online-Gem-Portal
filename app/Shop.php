<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function gemTypes(){
    	return $this->hasMany('App\GemType');
    }

    public function gemSizes(){
    	return $this->hasMany('App\GemSize');
    }
    public function gemStones(){
    	return $this->hasMany('App\GemStone');
    }

    public static function create($user_id){

        $shop = new Shop();
        $shop->user_id = $user_id;

        return $shop;

    }

    public function store(){
        $this->save();
    }
}
