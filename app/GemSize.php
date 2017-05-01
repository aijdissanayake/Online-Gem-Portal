<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GemSize extends Model
{
    public function shop(){
    	return $this->belongsTo('App\Shop');
    }

    public function gemStones(){
    	return $this->hasMany('App\GemStone');
    }
}
