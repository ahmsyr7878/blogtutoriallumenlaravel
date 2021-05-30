<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function __construct(){
        $this->middleware('auth', ['only'=>['add','edit' ]]);
    }
    
    //create post
    public function createPost(Request $request)
    {
        $post = Post::create($request->all());
        return response()->json($post);
    }


    //update post
    public function updatePost(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->views = $request->input('views');
        $post->save();

        return response()->json($post);
    }

    //update post
    public function viewPost( $id)
    {
        $post = Post::find($id);
        
        return response()->json($post);
    }
    //delete post
    public function deletePost($id)
    {
        $post = Post::find($id);
        $post->delete();
        return response()->json('Removed successflly.');
    }

    //list all posts
    public function index()
    {
        $posts = Post::all();
        return response()->json($posts);
    }
}
