<?php

namespace App\Http\Controllers;

use App\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Support\Str;


class UsersController extends Controller
{
    //create post
    public function create(Request $request)
    {
        $request['api_token'] = Str::random(60);
        $request['password'] = app('hash')->make($request['password']); //bcrypt($request['password'])
        $user = User::create($request->all());
        
        return response()->json($user);
    }


    //update post
    public function edit(Request $request,$id)
    {
        $user = User::find($id);

        $user->update($request->all());

        return response()->json($user);
    }

    //update post
    public function view( $id)
    {
        $user = User::find($id);
        
        return response()->json($user);
    }
    //delete post
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json('Removed successflly.');
    }

    //list all posts
    public function index()
    {
        $posts = User::all();
        return response()->json($posts);
    }
}
