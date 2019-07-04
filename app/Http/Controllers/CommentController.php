<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Post;
use App\Comment;

class CommentController extends Controller
{
    function index(){
        $comment = Comment::all();
        
    }
}
