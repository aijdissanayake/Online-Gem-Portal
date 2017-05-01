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
}
