<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Main extends Controller
{
    function post(Request $request){
        return view('about',['post'=>$request->id]);
    }
}
