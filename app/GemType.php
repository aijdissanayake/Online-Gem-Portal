<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GemType extends Model
{
    public function shop(){
    	return $this->belongsTo('App\Shop');
    }
}
