<?php

namespace App\Http\Controllers\Registred;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PostController extends Controller
{
    private $validateRules;

    public function __construct()
    {

        $this->validateRules = [
            'title' => 'required|string|max:255',
            'body' => 'required|string'
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('user_id', Auth::id())->get();

        return view('registred.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'tags' => Tag::all(),
        ];
        return view('registred.posts.insert', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validateRules);
        $data = $request->all();

        $newPost = new Post;
        $newPost->title = $data['title'];
        $newPost->body = $data['body'];
        $newPost->slug = rand(1, 100) . '-' . Str::slug($newPost->title);
        $newPost->user_id = Auth::id();
        
        $saved = $newPost->save();
        if (!$saved) {
            return redirect()->back()->with('error', 'Post Store ERROR!');;
        }
        
        if (!empty($data['tags'])){
            $newPost->tags()->attach($data['tags']);
        }


        return redirect()->route('registred.posts.show', $newPost->slug)->with('message', 'Post Stored!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();

        return view('registred.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'post' => Post::find($id),
            'tags' => Tag::all()
        ];
        return view('registred.posts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Post $post)
    {
        if (empty($post)) {
            abort(404);
        }
        if ($post->user->id != Auth::id()) {
            abort(404);
        }
        $request->validate($this->validateRules);
        $data = $request->all();

        $post->title = $data['title'];
        $post->body = $data['body'];
        $post->slug = rand(1, 100) . '-' . Str::slug($post->title);
        $post->user_id = Auth::id();
        $post->updated_at = Carbon::now();

        $saved = $post->update();
        if (!$saved) {
            return redirect()->back()->with('error', 'Post Update ERROR!');;
        }

        if (!empty($data['tags'])) {
            $post->tags()->sync($data['tags']);
        }

        return redirect()->route('registred.posts.show', $post->slug)->with('message', 'Post Updated!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (empty($post)) {
            abort(404);
        }
        $post->tags()->detach();
        $post->delete();
                                                        //no error only for color
        return redirect()->route('registred.posts.index')->with('error', 'Post Deleted!');
    }
}
