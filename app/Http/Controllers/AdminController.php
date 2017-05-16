<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class AdminController extends Controller
{
  public function createPost(Request $request)
    {
        /* Validation */
        $this->validate($request, [
            'title' => 'required|max:100',
            'body' => 'required'
        ]);

        $post = new Post();
        $post->title = $request['title'];
        $post->body = $request['body'];
        $post->shop = $request['shop'] ? true : false;
        $post->buyer = $request['buyer'] ? true : false;

        $message = 'There was an error';

        	$post->save();
        	$message = 'Post Successfully Published!';
        
        return redirect(route('home'))->with(['message' => $message]);
    }

    public function viewUpdatePost($id)
    {
    	$post = Post::find($id);
    	return view('admin/updatepost', ['post' => $post]);
    }

    public function updatePost(Request $request)
    {
    	$this->validate($request, [
            'title' => 'required|max:100',
            'body' => 'required',
            'id' => 'required'
        ]);

        $post = Post::find($request['id']);
        $post->title = $request['title'];
        $post->body = $request['body'];
        $post->shop = $request['shop'] ? true : false;
        $post->buyer = $request['buyer'] ? true : false;

        $message = 'There was an error';
        if ($post->save())
        {
            $message = 'Post Successfully Updated!';
        }
        return redirect(route('home'))->with(['message' => $message]);
    }

    public function deActivatePost($id)
    {
    	$post = Post::find($id);
        $post->deleted = (!$post->deleted);
        $post->save();
        return back();

    }
    

}
