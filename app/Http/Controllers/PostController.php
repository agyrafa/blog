<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Jenssegers\Agent\Agent;

class PostController extends Controller
{
    public function getDashboard()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

        $agent = new Agent();
        $device = $agent->isMobile();
        if($device) {
            return view('mobile', ['posts' => $posts]);
        } else {
            return view('dashboard', ['posts' => $posts]);
        }
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

        $file = $request->file('upload_photo');
        $filename = $post->id . '.jpg';
        if ($file) {
            Storage::disk('public')->put($filename, File::get($file));
        }

        return redirect()->route('home')->with(['message' => $message]);
    }

    public function postPostEdit($post_id)
    {
        $post = Post::where('id', $post_id)->first();
        if(Auth::user() != $post->user) {
            return redirect()->back();
        }
        
        $message = '';
        
        
    }

    public function getEditPost() {

        return view('edit_post');
    }

    public function getDeletePost($post_id)
    {
        $post = Post::where('id', $post_id)->first();
        if (Auth::user() != $post->user) {
            return redirect()->back();
        }
        $message = '';
        if($post->delete()) {
            $message = 'Post successfully deleted!';
        }

        return redirect()->route('home')->with(['message' => $message]);
    }

    public function getAttachPhoto($filename)
    {
        $file = Storage::disk('public')->get($filename);
        return new Response($file, 200);
    }
    
}