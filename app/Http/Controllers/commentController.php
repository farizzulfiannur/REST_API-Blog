<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class commentController extends Controller
{
    function storeComment(Request $request, $postid){
        try{
            $request->validate([
                'comment_content' => 'required|string|max:255',
            ]);
            
            $post = post::findOrFail($postid);
            // dd($post);
            $user = Auth::user();
    
            $comment  = comment::create([
                'user_id' => $user->id,
                'post_id' => $post->id,
                'comment_content' => $request->comment_content
            ]);
            $comment->save();
            return response()->json([
                'message' => 'Successfully Added Comment',
                'data' => $comment
            ]);
        }catch(\Exception $e){
            return response()->json([
                'error' => 'Failed Added Comment',
                'message' => $e->getMessage(),
            ]);
        }
    }

    function deleteComment($postId,$id){
        try{
            comment::destroy($id);
            return response()->json([
                'message' => 'Comment has deleted'
            ]);
        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
                'error' => 'Failed Delete Comment'
            ]);
        }
    }
}