<?php

namespace App\Http\Middleware;

use App\Models\post;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PostMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        $post = post::findOrFail($request->id);

        if($post->author != $user->id){
            return response()->json([
                'message' => 'Page Not Found'
            ],404);
        }
        return $next($request);
    }
}
