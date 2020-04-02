<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class PostController extends Controller
{
    //ACCESSO A TUTTI registrati e non
    public function index()
    {
        $posts = Post::where('published', 1)->get();

        return view('posts.index', compact('posts'));
    }
    
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();

        return view('posts.show', compact('post'));
    }
}
