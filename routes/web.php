<?php

use Illuminate\Support\Facades\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','Main@testdd');

Route::get('/json', function () {
    return response()->json(['name'=>'Hello World','state'=>'Gujarat']);
    // var_dump($_POST);
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/login', function () {
    return view('login');
});

// Route::get('/home','Main@index_post');

Route::get('/home','Main@index_post');

Route::post('/post','Main@post');

Route::post('/register/submit','Main@register_account');
Route::post('/login/submit','Main@login_account');

// Route::middleware('MyAuth')->group(function () {
    Route::get('/logout','Main@logout'); 
    Route::get('/profile',function(){
        return view('profile');
    }); 
    Route::post('/profile/submit','Main@profile_edit');
    Route::get('/profile/reset','Main@reset');
    Route::get('/mypost','Main@mypost');
    Route::get('/mypost/create',function(){
        return "Sorry, under maintainance";
    });
// });