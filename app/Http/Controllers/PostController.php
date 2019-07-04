<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Member;

class PostController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_post(Request $request)
    {
        if (Post::where('status','ACTIVE')->count() < 1) {
            $post = "No Post";
        } else {
            $post = Post::where('status','ACTIVE')->get();
        }

        return view('new_home',['post'=>$post]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function post(Request $request)
    {
        $post = Post::where('id',$request->id)->first();
        return view('post',['post'=>$post]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    function mypost(){

        if (Post::where('user_id',session()->get('member')->id)->count() < 1) {
            $post = "No Post";
        } else {            
            $post = Post::where('user_id',session()->get('member')->id)->get();
        }
        
        $post_count = Post::where('user_id',session()->get('member')->id)->count();
        return view('mypost',['post'=>$post,'count'=>$post_count]);
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
