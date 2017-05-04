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

    public static function create($shop_id, $description, $type_id, $size_id, $price){

    	$gem = new GemStone();
        $gem->shop_id=$shop_id;
        $gem->description=$description;
        $gem->gem_type_id=$type_id;
        $gem->gem_size_id=$size_id;
        $gem->price=$price;

        return $gem;
    }

    public static function remove($id){

    	
    	// check $this->find();
    		$size = GemStone::find($id);

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
