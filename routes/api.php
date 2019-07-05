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

Route::get('/','PostController@index_post');

Route::get('register', function () {
    return view('register',['status'=>'register']);
});
Route::get('login', function () {
    return view('login',['status'=>'login']);
});

Route::post('register/submit','Main@register_account');
Route::post('login/submit','Main@login_account');

Route::middleware("mymiddleware")->group(function() {
    Route::get('profile/{token}','Main@token');
    Route::get('logout','Main@logout'); 
    Route::post('profile/submit','Main@profile_edit');
    Route::get('profile/reset','Main@reset');
    Route::get('mypost','PostController@mypost');
    Route::get('postadd',function(){
        return view('post_add');
    });
    Route::post('postadd/submit','PostController@create');
});