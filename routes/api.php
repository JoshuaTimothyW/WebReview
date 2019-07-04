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
    return view('form',['status'=>'register']);
});
Route::get('login', function () {
    return view('form',['status'=>'login']);
});

Route::post('register/submit','Main@register_account');
Route::post('login/submit','Main@login_account');
Route::get('profile/{token}','Main@token');

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('user', 'Main@getAuthenticatedUser');
});