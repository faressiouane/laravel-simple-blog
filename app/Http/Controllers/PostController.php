<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{

    public function __construct(){
        $this->middleware(['auth'])->only('store', 'destroy');
    }
    
    public function show(Post $post){
        return view('posts.show', ['post' => $post]);
    }
    
    public function index(){
        $posts = Post::orderBy('created_at', 'desc')->with(['user', 'likes'])->paginate(20);
       
        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'body' => 'required',
        ]);

        auth()->user()->posts()->create($request->only('body'));
        
        return back();
    }

    public function destroy(Request $request, Post $post){
        //dd($post->ownedBy($request->user()));
        // if ($post->ownedBy($request->user())) {
        //     $post->delete();
        // }

        $this->authorize('delete', $post);
        $post->delete();
        return back();
    }
    
}
