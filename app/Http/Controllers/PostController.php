<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{

//public function_construct(){
//    return $this->middleware('auth');
//}
    public function create()
    {
        return view('posts.create');
    }

    public function store(PostRequest $request)
    {
        $post = new Post($request->all());
        $post->save();
        return redirect('/posts/create')->with('success', 'A new post has been generated');

    }

    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
        $posts = Post::find($id);
        return view('posts.show', compact('posts'));
    }
}
