<?php

namespace App\Http\Controllers\Api;

use App\Model\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('comments', 'user')
        ->orderBy('created_at', 'desc')
        ->get();

        return $posts; 
    }

    public function store(Request $request)
    {
        $post = Post::create($request->all());

        return response()->json($post, 201);
    }

    public function getpostuser($id)
    {
        $userpost = Post::where('user_id', '=', $id)->get();

        return $userpost;
    }

}
