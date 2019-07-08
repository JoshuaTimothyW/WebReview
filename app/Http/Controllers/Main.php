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
        
        // $member = Member::where('email','sad@gmail.com')->get();
        // return dd($val);

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

        // $post = Member::find(1)->post;
        // $arr = [$post,$user];
        // return view('vueee',['data'=>$arr]);

        // $arr = ['public/default.jpeg',Storage::exists(public_path().'\\pic\\default.jpeg'),Storage::exists('public/default.jpeg')];                
        // return dd($arr);
    }

    function register_account(Request $request){

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
        
        $member = new Member();
        
        $member->email = $request->email;
        $member->name = $request->username;
        $member->password = bcrypt($request->password);
        $member->role = "Member";
        $member->img = "upload/avatar/default.png";
        $member->last_activity = Carbon::now();
        $member->save();

        // $user = User::create([
        //     'name' => $request->get('username'),
        //     'email' => $request->get('email'),
        //     'password' => Hash::make($request->get('password')),
        //     'role' => "Member",
        //     'img' => "upload/avatar/default.png",
        // ]);
        
        if(!Storage::exists('upload/avatar/'.$member->id)){
            Storage::makeDirectory('upload/avatar/'.$member->id);
        }

        $token = JWTAuth::fromUser($member);
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

        // $payload = JWTAuth::decode($token);
        // return dd($payload);
        $member = JWTAuth::user();
        return response()->json(compact('member','token'));
        
        // $member = Member::where('email',$request->email)->first();
        
        // if($member){
        //     if (Hash::check($request->password, $member->password)) {
        //         $request->session()->put('member',$member);         
        //         $request->session()->put('hasLogin',true);
        //         return redirect('home');
        //     } else {
        //         return redirect('login')->withErrors("Email or Password incorrect");
        //     }
        // }else{
        //     return redirect('login')->withErrors("Email or Password incorrect");
        // }
        // return redirect('home',compact('token'));        
    }

    public function token($token){
        $user = JWTAuth::parseToken()->authenticate($token);
        return response()->json($user);
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

