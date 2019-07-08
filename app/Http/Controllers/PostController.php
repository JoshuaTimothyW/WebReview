<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Post;
use App\Tag;
use App\Member;
use App\Comment;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_post(Request $request)
    {
        $post = Post::where('status','like','ACTIVE')->orderBy('created_at','desc');

        if ($post->count() < 1) {
            $arr = "No Post";
        } else {            
            $post = $post->get();
            foreach($post as $i){
                $i->members;
                $i['tag'] = Tag::where('post_id',$i['id'])->get();
                $i['comment'] = Comment::where('post_id',$i['id'])->get();
            }
        }

        return response()->json($post);
        // return view('new_home',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function post($id)
    {
        $post = Post::where('id',$id)->first();
    
        $post->members;
        $post['tag'] = Tag::where('post_id',$i['id'])->get();
        $post['comment'] = Comment::where('post_id',$i['id'])->get();

        return response()->json($post);
        // return view('post',compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    function mypost(){
        
        // if (Post::where('user_id',session()->get('member')->id)->count() < 1) {
        //     $post = "No Post";
        // } else {            
        //     $post = Post::where('user_id',session()->get('member')->id)->get();
        // }
        
        // $post_count = Post::where('user_id',session()->get('member')->id)->count();
        // return view('mypost',['post'=>$post,'count'=>$post_count]);
        
        $member = JWTAuth::user();
        if (Post::where('user_id',$member->id)->count() < 1) {
            $post = "No Post";
        } else {            
            $post = Post::where('user_id',$member->id)->get();
        }
        
        return response()->json($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->ckeditor;
        $post->user_id = session()->get('member')->id;
        $post->img = '';
        $post->status = "Active";
        $post->save();
        return redirect('mypost');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
