<?php

namespace App\Http\Controllers\Api;

use App\Model\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function index()
    {
        return Comment::with('user')->get();
    }

    public function store(Request $request)
    {
        $comment = Comment::create($request->all());

        return response()->json($comment, 201);
    }
}
