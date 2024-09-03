<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function allpost(){
        $post = post::all();
        return response()->json([
            'message' => 'List Data Post',
            'data' => $post
        ]);
    }
}
