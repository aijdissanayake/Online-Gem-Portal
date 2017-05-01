<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GemStone extends Model
{	
	public function shop(){
    	return $this->belongsTo('App\Shop');
    }
    public function size(){
    	return $this->belongsTo('App\GemSize','gem_size_id');
    }

    public function type(){
    	return $this->belongsTo('App\GemType','gem_type_id');
    }
}
