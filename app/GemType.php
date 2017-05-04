<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GemType extends Model
{
    public function shop(){
    	return $this->belongsTo('App\Shop');
    }

    public function gemStones(){
    	return $this->hasMany('App\GemStone');
    }

    public static function create($shop_id, $type){

    	$newType = new GemType();
    	$newType->shop_id=$shop_id;
    	$newType->type = $type;
    	$newType->active = true;

    	return $newType;
    }


    public static function remove($id){

    	

    		$type = GemType::find($id);

    		if($type == null){
    			return false;
    		}

	    	$type->active = false;
	    	$type->deleted = true;
	    	return true;
	    		
    	
    }

    public function store(){
    	$this->save();
    }
}
