<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GemType;
use App\GemSize;
use Auth;

class ShopController extends Controller
{
    public function visitShops(){
    	return view('shops');
    }

    public function addDetails(){
    	return view('shop/adddetails');
    }

    //ajax related methods
    public function addType(Request $request){

    	$type = $request['type'];
    	$newType = new GemType();
    	$newType->shop_id=Auth::user()->id;
    	$newType->type = $type;
    	$newType->active = true;
    	$newType->save();

    	return response()->json([
                'type' => $newType->type,
                'id'   => $newType->id
            ]);
    }

    public function removeType(Request $request){

    	$id = $request['id'];
    	$type = GemType::find($id);
    	$type->active = false;
    	$type->deleted = true;
    	$type->save();

    	return response()->json([
                'success' => true
            ]);
    }

    public function addSize(Request $request){

    	$size = $request['size'];
    	$newSize= new GemSize();
    	$newSize->shop_id=Auth::user()->id;
    	$newSize->size = $size;
    	$newSize->active = true;
    	$newSize->save();

    	return response()->json([
                'size' => $newSize->size,
                'id'   => $newSize->id
            ]);
    }

    public function removeSize(Request $request){

    	$id = $request['id'];
    	$size = GemSize::find($id);
    	$size->active = false;
    	$size->deleted = true;
    	$size->save();

    	return response()->json([
                'success' => true
            ]);
    }
}
