<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\GemType;
use App\GemSize;
use App\GemStone;
use App\Shop;
use Auth;

class ShopController extends Controller
{
    public function visitShops(){
    	return view('shops');
    }

    public function visitShop($id){
        $shop = Shop::find($id);
        return view('shop')->with('shop',$shop);
    }

    public function addDetails(){
    	return view('shop/adddetails');
    }

    public function advertiseForm(){
    	return view('shop/advertise');
    }

    public function advertise(Request $request){

        $this->validate($request, [
        	'description' => 'required|string',
            'type' => 'required|integer',
            'size' => 'required|integer',
            'price' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $gem = new GemStone();
        $gem->shop_id=Auth::user()->shop->id;
        $gem->description=$request['description'];
        $gem->gem_type_id=$request['type'];
        $gem->gem_size_id=$request['size'];
        $gem->price=$request['price'];

        $now = date('Y-m-d') . '_' .date('H-i-s');
        $imageName = $gem->shop_id.'_'.$gem->gem_type_id.'_'.$gem->gem_size_id.'_'.$now.'.'.$request->file('image')->getClientOriginalExtension();

        $path = base_path() .'/storage/app/shops/'.$gem->shop_id .'_'.Auth::user()->name ;

        if(!is_dir($path)){
             mkdir($path,0777,true);
        }

        $request->file('image')->move($path , $imageName);

        $gem->image_src= $path.'/'.$imageName;
        $gem->image_name = $imageName;
        $gem->save();

    	return redirect()->route('gem_stone', ['id' => $gem->id]);
    }

    public function updateGemStone($id , Request $request){

        $this->validate($request, [
            'description' => 'required|string',
            'type' => 'required|integer',
            'size' => 'required|integer',
            'price' => 'required|integer',
        ]);

        $gem = GemStone::find($id);
        $gem->shop_id=Auth::user()->shop->id;
        $gem->description=$request['description'];
        $gem->gem_type_id=$request['type'];
        $gem->gem_size_id=$request['size'];
        $gem->price=$request['price'];

        if($request['reupload']){
            

            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ]);

            $now = date('Y-m-d') . '_' .date('H-i-s');
            $imageName = $gem->shop_id.'_'.$gem->gem_type_id.'_'.$gem->gem_size_id.'_'.$now.'.'.$request->file('image')->getClientOriginalExtension();

            $path = base_path() .'/storage/app/shops/'.$gem->shop_id .'_'.Auth::user()->name ;

            if(!is_dir($path)){
                 mkdir($path,0777,true);
            }

            $request->file('image')->move($path , $imageName);

            $gem->image_src= $path.'/'.$imageName;
            $gem->image_name = $imageName;
        }

        $gem->save();

        return redirect()->route('gem_stone', ['id' => $gem->id]);
    }


    public function gemStone($id) {

    	$gemStone = GemStone::find($id);
    	$size = $gemStone->size->size;
    	$type = $gemStone->type->type;
    	return view('shop/gemstone')->with('gemStone',$gemStone)
    								->with('type',$type)
    								->with('size',$size);

    }

    public function deActivateGemStone($id){

        $gemStone = GemStone::find($id);
        $gemStone->active = (!$gemStone->active);
        $gemStone->save();
        return back();

    }

    public function deleteGemStone($shop_id, $id){

        $gemStone = GemStone::find($id);
        $gemStone->active = false;
        $gemStone->deleted = true;
        $gemStone->save();

        return redirect()->route('visit_shop', ['id' => $shop_id]);

        // return response()->json([
        //         'success' => true
        //     ]);
    }

    //check for other types than jpg
    public function getImage($id){
    	$gemStone = GemStone::find($id);
    	$path = '/shops/'.$gemStone->shop->id.
    			'_'.$gemStone->shop->user->name.'/'.
    			$gemStone->image_name ;
    	$image = Storage::disk('local')->get($path);
    	ob_end_clean();
        return response($image,200,['Content-type'=>'image/jpg']);
    }

    public function viewUpdateGemStone($id){
        $gemStone = GemStone::find($id);
        $size = $gemStone->size->size;
        $type = $gemStone->type->type;
        return view('shop/updategemstone')->with('gemStone',$gemStone)
                                    ->with('type',$type)
                                    ->with('size',$size);
    }

    public function searchGems(){
        return view('gems');
    }

    public function shopFront($id){

        $shop = Shop::find($id);
        $urls = [
        str_replace(' ', '-',"https://place-hold.it/800x300/aaa/white&text=" . $shop->user->name . "&fontsize=30"),
        str_replace(' ', '-',"https://place-hold.it/800x300/aaa/white&text=0" . $shop->user->tel . "&fontsize=30"),
        str_replace(' ', '-',"https://place-hold.it/800x300/aaa/white&text=" . $shop->user->email . "&fontsize=30")
        ] ;
        return view('shopfront')->with('shop', $shop)
                          ->with('urls', $urls);

    }

    public function shopGems($id){

       $shop = Shop::find($id);
       return view('shopgems')->with('shop', $shop); 
    }

    public function shopLive($id){
       $shop = Shop::find($id);
       return view('shoplive')->with('shop', $shop);  
    }

    //ajax related methods
    public function addType(Request $request){

    	$type = $request['type'];
    	$newType = new GemType();
    	$newType->shop_id=Auth::user()->shop->id;
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
    	$newSize->shop_id=Auth::user()->shop->id;
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
