<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\File;
use App\Http\Controllers\Log;
use Illuminate\Support\Facades\Storage;

use App\Member;

class Main extends Controller
{
    function post(Request $request){
        return view('post',['post'=>$request->id]);
    }

    public function store(Request $request) {
        // return Storage::putFile(
        //            storage_path('uploads'),
        //            request()->file('uploadedFile')
        // );
        $path = $request->file('img');
        Log::alert($path);
    }

    function register_account(Request $request){
        // return dd($request);
        $member = new Member();
        $member->email = $request->email;
        $member->name = $request->username;
        
        $file = $request->img->store('members');
        $member->img = $file;
        // Storage::putFile('images',$request->file('img'));

        $member->save();
        
        return redirect('home');
    }
}

