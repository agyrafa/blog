<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function getDashboard()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('dashboard', ['posts' => $posts]);
    }

    public function postCreatePost(Request $request)
    {
        $this->validate($request, [
            'content' => 'required'
        ]);

        $post = new Post();
        $post->content = $request['content'];
        $message = '';

        if($request->user()->posts()->save($post)) {
            $message = 'Post successfully created!';
        }

        return redirect()->route('dashboard')->with(['message' => $message]);
    }

    public function getDeletePost($post_id)
    {
        $post = Post::where('id',$post_id)->first();
        if (Auth::user() != $post->user) {
            return redirect()->back();
        }
        $message = '';
        if($post->delete()) {
            $message = 'Post successfully deleted!';
        }

        return redirect()->route('dashboard')->with(['message' => $message]);
    }
}