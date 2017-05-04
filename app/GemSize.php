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

    public static function create($shop_id, $size){

    	$newSize = new GemSize();
    	$newSize->shop_id=$shop_id;
    	$newSize->size = $size;
    	$newSize->active = true;

    	return $newSize;
    }


    public static function remove($id){

    	

    		$size = GemSize::find($id);

    		if($size == null){
    			return false;
    		}

	    	$size->active = false;
	    	$size->deleted = true;
	    	return true;
	    		
    	
    }

    public function store(){
    	$this->save();
    }
}
