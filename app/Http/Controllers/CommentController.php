<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
     // Create Post Function
     public function create(Request $request)
     {
         // Get member data dari si token
         $member = auth()->user();
 
         // Bikin objek post untuk diinsert ke db
         $comment = new Comment();
         $comment->content = $request->content;
        // Post id is a hidden attribute in view
         $comment->post_id = $request->post_id;
         $comment->user_id = $member->id;
         $comment->save();
 
         // return json post
         return response()->json("Comment Added Successful");
     }
}
