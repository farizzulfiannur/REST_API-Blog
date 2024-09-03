<?php

namespace App\Http\Controllers;

use App\Http\Resources\DetailPostResource;
use App\Http\Resources\PostResource;
use App\Models\post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function allpost(){
        $posts = post::all();
        // return response()->json([
        //     'data' => $posts,
        // ]);
        return PostResource::collection($posts);
    }

    function detailPost($id){
        $post = post::findOrFail($id);
        return new DetailPostResource($post);
    }
}
