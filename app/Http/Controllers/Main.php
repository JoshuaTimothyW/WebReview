<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;

use JWTAuth;
use App\Post;
use App\Tag;
use App\Member;
use App\Comment;

class Main extends Controller
{
    public function testdd() {
        // return Storage::putFile(
        //            storage_path('uploads'),
        //            request()->file('uploadedFile')
        // );
        // $path = Storage::exists('members/1');
        // $file = Storage::allFiles($path);

        // $member = Post::find(1)->tag;

        // Searching
        // ###############################################################
        $search = "lor";
        
        $post = Post::where('description','like',"%$search%")->get();

        // foreach($post as $i){
        //     $i['tag'] = Post::find($i['id'])->tag;
        // }

        return response()->json($post);
        // ###############################################################

        // return dd($arr);
    }

    function register_account(Request $request){
        // Validasi
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:members,email',
            'username' => 'required|unique:members,name|min:3|max:25',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect('register')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        // Buat objek member baru untuk insert data
        $member = new Member();
        
        $member->email = $request->email;
        $member->name = $request->username;
        $member->password = bcrypt($request->password);
        $member->role = "Member";
        $member->img = "upload/avatar/default.png";
        $member->last_activity = Carbon::now();
        $member->save();
        
        // Buat folder profile picture baru kalo gaada
        if(!Storage::exists('upload/avatar/'.$member->id)){
            Storage::makeDirectory('upload/avatar/'.$member->id);
        }

        // Generate Token
        $token = JWTAuth::fromUser($member);

        # Return json (Member dan Token)
        return response()->json(compact('member','token'));
        // return redirect('home');
    }

    function login_account(Request $request){
        $credentials = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials']);
            }
        }catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token']);
        }

        $member = JWTAuth::user();
        return response()->json(compact('member','token'));       
    }

    function profile($name){
        $member = Member::where('name',$name)->first();
        return view('profile',['member'=>$member]);
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

