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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('register', function () {
    return view('register',['status'=>'register']);
});
Route::get('login', function () {
    return view('login',['status'=>'login']);
});

Route::get('/','PostController@index_post');
Route::post('register/submit','Main@register_account');
Route::post('login/submit','Main@login_account');

Route::get('home','Main@testdd');

Route::middleware("mymiddleware")->group(function() {
    // User
    Route::get('profile/{token}','Main@profile');
    Route::get('logout/{token}','Main@logout');
    // Route::post('profile/submit','Main@profile_edit');
    // Route::get('profile/reset','Main@reset');
    

    // Post
    Route::get('/{token}','PostController@index_post');
    Route::get('mypost/{token}','PostController@mypost');
    Route::post('postadd/submit/{token}','PostController@create');
    
    // Comment
    // Route::post('commentadd/submit/{token}','CommentController@comment_add');
});