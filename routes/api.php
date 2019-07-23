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
Route::get('{name}','Main@profile');
Route::post('register/submit','Main@register_account');
Route::post('login/submit','Main@login_account');


Route::middleware("mymiddleware")->group(function() {
    // User
    Route::post('profilepic/submit','Main@profile_pic');
    Route::post('profile/submit','Main@profile_edit');
    Route::get('profile/reset','Main@reset');
    // Route::get('mytoken','Main@getToken');
    Route::get('profile/logout','Main@logout');

    // Post
    Route::get('profile/mypost','PostController@mypost');
    Route::post('postadd/submit/','PostController@create');
    

    // Comment
    Route::post('commentadd/submit','CommentController@comment_add');
});