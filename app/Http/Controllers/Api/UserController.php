<?php

namespace App\Http\Controllers\Api;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $id = Auth::id();

        $users = User::where('id', '!=', $id)->get();

        return response()->json($users);
    }

    public function update(Request $request)
    {
        $user = User::findOrFail($request->id);

        $user->name = $request->name;
        $user->email =  $request->email;
        $user->save();

        return response()->json($user, 201);

    }
}
