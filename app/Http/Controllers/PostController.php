<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;

// use JWTAuth;
use App\Post;
use App\Member;
use App\Comment;
use App\Media;

class PostController extends Controller
{
    // List Post Function
    public function index_post()
    {
        
        // Pilih post yang statusnya masih ACTIVE, di sort desc based on date
        $post = Post::where('status','like','ACTIVE')->orderBy('created_at','desc');

        // Detect kalau ada post atau tidak
        if ($post->count() < 1) {
            $arr = "No Post";
        } else {            
            $post = $post->get();
            foreach($post as $i){
                $i->members;
                $i['media'] = Media::where('post_id',$i['id'])->get();
                $i['comment'] = Comment::where('post_id',$i['id'])->get();
            }
        }

        // Get user data kalau ada token
        $member = auth()->user();

        // return json post
        // return response()->json(compact('post','member'));
        return view('new_home',compact('post','member'));
    }


    // User Post
    function mypost(){
        // Member data dari token
        $member = auth()->user();
 
        // Select semua post
        $post = Post::where('user_id',$member->id);
        // Cek post ada atau tidak
        if ($post->count() < 1) {
            $post = "No Post";
        } else {            
            $post = $post->get();
            foreach($post as $i){
                $i->members;
                $i['comment'] = Comment::where('post_id',$i['id'])->get();
            }
        }
        
        // return json post
        return response()->json($post);
    }


    // Create Post Function
    public function create(Request $request)
    {
        // Get member data dari si token
        $member = auth()->user();

        // Bikin objek post untuk diinsert ke db
        $post = new Post();
        $post->content = $request->content;
        $post->category = $request->category;
        $post->user_id = $member->id;
        $post->status = "Active";
        $post->save();


        // return json post
        return response()->json("Post Added Successful");
    }
    

    // Lagi fix
    public function post($id)
    {
        $post = Post::where('id',$id)->first();
    
        $post->members;
        $post['comment'] = Comment::where('post_id',$i['id'])->get();

        return response()->json($post);
        // return view('post',compact('post'));
    }
}
