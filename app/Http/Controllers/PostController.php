<?php

namespace App\Http\Controllers;

use App\Http\Resources\DetailPostResource;
use App\Http\Resources\PostResource;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    function allpost()
    {
        $posts = post::all();
        // return response()->json([
        //     'data' => $posts,
        // ]);
        return PostResource::collection($posts);
    }

    function detailPost($id)
    {
        $post = post::findOrFail($id);
        return new DetailPostResource($post);
    }

    function addpost(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'news_content' => 'required',
        ]);
        $user = Auth::user();
        try {
            $post = post::create([
                'title' => $request->title,
                'news_content' => $request->news_content,
                'author' => $user->id,
            ]);
            $post->save();
            return response()->json([
                'Message' => 'Post Successfully Added',
                'data' => $post
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Post Failed Added',
                'message' => $e->getMessage(),
            ],500);
        }
    }

    function updatePost(Request $request, $id){
        $request->validate([
            'title' => 'required',
            'news_content' => 'required'
        ]);

        $user = Auth::user();
        $post = post::findOrFail($id);
        try{
            $post->update([
                'title' => $request->title,
                'news_content' => $request->news_content,
                'author' => $user->id,
            ]);
            $post->save();
            return response()->json([
                'message' => 'Successfully Updated Post',
                'data' => $post
            ], 202);
        } catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
                'error' => 'Failed Updated Post',
            ]);
        }
    }

    function deletePost($id){
        try{
            post::destroy($id);
            return response()->json([
                'message' => 'Successfully Deleted Post'
            ]);
        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
                'error' => 'Failed Deleted Post'
            ]);
        }
    }
}
