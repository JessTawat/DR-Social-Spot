<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});   


Route::get('users', 'Api\UserController@index');
Route::get('posts', 'Api\PostController@index');
Route::post('posts', 'Api\PostController@store');
Route::get('comments', 'Api\CommentController@index');
Route::post('comments', 'Api\CommentController@store');
Route::put('user', 'Api\UserController@update');
