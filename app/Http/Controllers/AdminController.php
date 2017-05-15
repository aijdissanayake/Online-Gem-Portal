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

        $message = 'There was an error';

        	$post->save();
        	$message = 'Post Successfully Published!';
        
        return back()->with(['message' => $message]);
    }
}
