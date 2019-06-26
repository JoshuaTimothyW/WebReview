<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;


use App\Member;
use App\Post;

class Main extends Controller
{

    

    

    public function testdd() {
        // return Storage::putFile(
        //            storage_path('uploads'),
        //            request()->file('uploadedFile')
        // );
        // $path = Storage::exists('members/1');
        // $file = Storage::allFiles($path);
        
        // $member = Member::where('email','sad@gmail.com')->get();
        // return dd($val);

        // $user = Member::where('email','sad@gmail.com')->get();
        // return view('vueee',['user'=>$user]);
        $post = Post::all();
        return dd($post);

        // $arr = ['public/default.jpeg',Storage::exists(public_path().'\\pic\\default.jpeg'),Storage::exists('public/default.jpeg')];                
        // return dd($arr);
    }

    function register_account(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:members,email',
            'username' => 'required|min:3|max:25',
        ]);

        if ($validator->fails()) {
            return redirect('register')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $member = new Member();
        
        $member->email = $request->email;
        $member->name = $request->username;
        $member->role = "Member";
        $member->img = "upload/avatar/default.png";

        $member->save();
        
        $request->session()->put('member',$member);
        $request->session()->put('hasLogin',true);
        
        if(!Storage::exists('upload/avatar/'.$member->id)){
            Storage::makeDirectory('upload/avatar/'.$member->id);
        }
        return redirect('home');
    }

    function login_account(Request $request){
        
        $member = Member::where('email',$request->email)->first();
        
        if($member){
            // $request->session()->put('id',$member->id);               
            $request->session()->put('member',$member);         
            $request->session()->put('hasLogin',true);
            return redirect('home');
        }else{
            return redirect('login')->withErrors("Email or Username not exist");
        }
        
        return redirect('login');        
    }

    function profile_edit(Request $request){

        $validator = Validator::make($request->all(), [
            'avatar' => 'mimes:jpeg,jpg,png,gif|required',
        ]);

        if ($validator->fails()) {
            return redirect('profile')
                        ->withErrors($validator)
                        ->withInput();
        }

        $member = Member::find(session()->get('member')->id);
        $pic = $request->file('avatar');

        if(!Storage::exists('upload/avatar/'.$member->id)){
            Storage::makeDirectory('upload/avatar/'.$member->id);
        }
        
        if($member->img != 'upload/avatar/default.png'){
            Storage::delete($member->img);
        }

        $path = $pic->store('upload/avatar/'.$member->id);
        $member->img = $path;
        $member->save();
        $request->session()->put('member',$member);
        return redirect('profile');
    }

    function reset(Request $request){
        $member = Member::find(session()->get('member')->id);
        
        if($member->img != 'upload/avatar/default.png'){
            Storage::delete($member->img);
        }

        $member->img = 'upload/avatar/default.png';
        $member->save();
        $request->session()->put('member',$member);
        return redirect('profile');
    }

    function logout(Request $request){
        $request->session()->flush();
        return redirect('home');
    }

}

