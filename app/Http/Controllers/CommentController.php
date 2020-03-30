<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        // $request->validate($this->validateRules);
        $data = $request->all();

        $newComment = new Comment;
        $newComment->name = $data['name'];
        $newComment->body = $data['body'];
        $newComment->post_id = $data['post_id'];

        $saved = $newComment->save();
        if (!$saved) {
            return redirect()->back()->with('error', 'Post Store ERROR!');;
        }

        return redirect()->route('posts.show', $newComment->post->slug)->with('message', 'Comment Uploaded!');
    }
}
