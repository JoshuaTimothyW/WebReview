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

Route::get('/', function () {
    return view('vueee');
});

Route::get('/json', function () {
    return response()->json(['name'=>'Hello World','state'=>'Gujarat']);
    // var_dump($_POST);
});

Route::get('/home', function () {
    return view('home');
});

Route::post('/post','Main@post');

Route::get('/register', function () {
    return view('register');
});

Route::post('/register/submit','Main@register_account');