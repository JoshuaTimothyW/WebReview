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
use App\Member;
use App\Comment;

class Main extends Controller
{
    // Buat Test Aja
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
        
        // $post = Post::where('description','like',"%$search%")->get();

        $post = Post::paginate(2);

        // foreach($post as $i){
        //     $i['tag'] = Post::find($i['id'])->tag;
        // }

        return response()->json($post);
        // ###############################################################

        // return view('new_home',compact('post'));
    }


    // Register Function
    function register_account(Request $request){
        // Validasi Input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:members,email',
            'username' => 'required|unique:members,name|min:3|max:25',
            'password' => 'required|min:6',
        ]);

        // Return error kalau validate error
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()]);
        }
        
        // Buat objek member baru untuk insert data
        $member = new Member();
        
        $member->email = $request->email;
        $member->name = $request->username;
        $member->password = bcrypt($request->password);
        $member->role = "Member";
        $member->img = "/upload/avatar/default.png";
        $member->status = "Active";
        $member->last_activity = Carbon::now();
        $member->save();
        
        // Buat folder profile picture baru kalo gaada
        if(!Storage::exists('upload/avatar/'.$member->id)){
            Storage::makeDirectory('upload/avatar/'.$member->id);
        }

        // Generate Token
        $token = JWTAuth::fromUser($member);

        // Get Token Timeline
        $expired = JWTAuth::factory()->getTTL()*60;
        
        // Return json (Member dan Token)
        return response()->json(compact('member','token','expired'));
    }


    // Login Function
    function login_account(Request $request){
        // Get email dan password
        $credentials = $request->only('email', 'password');
        
        // Attempt user untk check data
        $token = JWTAuth::attempt($credentials);

        // Get Token Timeline
        $expired = JWTAuth::factory()->getTTL()*60;

        // Verifikasi token dengan user di db
        try {
            # Data ada, tapi token salah
            if (!$token) {
                return response()->json(['error' => 'invalid_credentials']);
            }
        }catch (JWTException $e) {
            # Fail to generate token
            return response()->json(['error' => 'could_not_create_token']);
        }
        
        // Return json (Member dan Token)
        return response()->json(compact('token','expired'));   
    }


    // Get Profile Function
    function profile($name){
        // Get member data
        $member = Member::where('name',$name)->get();
         
        // Return json member
        return response()->json($member);
    }
   
    // Get Token
    function getToken(){
        // Get token
        $token = JWTAuth::getToken();
        
        // Return json member
        return response()->json($token);
    }

    // Edit Profile Picture Function
    function profile_pic(Request $request){
        // Validate Input
        $validator = Validator::make($request->all(), [
            'avatar' => 'mimes:jpeg,jpg,png,gif|required',
        ]);
        
        // Return error kalau validate error
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()]);
        }

        // Member data from token
        $member = JWTAuth::user();
        
        // Store picture to Storage, make folder if not exist
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
        
        // Redirect to Profile
        return redirect('profile');
    }

    // Lagi Fix
    function profile_edit(Request $request){

    }

    // Reset Profile Picture
    function reset(Request $request){
        // Member data from token
        $member = JWTAuth::user();
        
        // Set Profile Picture to Default
        if($member->img != 'upload/avatar/default.png'){
            Storage::delete($member->img);
        }

        $member->img = 'upload/avatar/default.png';
        $member->save();

        // Return json member
        return response()->json($member);
    }


    // Fungsi Logout
    function logout(){
        // Forget the token and back to home
        auth()->logout();
        return response()->json("Logout Successful");
    }
}

