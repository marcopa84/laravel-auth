<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    //ACCESSO A TUTTI registrati e non
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

}