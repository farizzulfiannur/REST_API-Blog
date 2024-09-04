<?php

use App\Http\Controllers\commentController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/',[loginController::class,'login'])->name('login');
Route::get('/logout',[loginController::class,'logout'])->name('logout')->middleware(['auth:sanctum']);
Route::get('/user',[UserController::class,'allUser'])->name('alluser')->middleware(['auth:sanctum']);

Route::get('/post',[PostController::class,'allpost'])->name('allpost')->middleware(['auth:sanctum']);
Route::get('/post/detail/{id}',[PostController::class,'detailPost'])->name('detailPost')->middleware(['auth:sanctum','postMiddleware']);
Route::post('/post/add',[PostController::class,'addpost'])->name('addpost')->middleware(['auth:sanctum']);
Route::post('post/update/{id}',[PostController::class,'updatePost'])->name('updatePost')->middleware(['auth:sanctum','postMiddleware']);
Route::get('/post/delete/{id}',[PostController::class,'deletePost'])->name('deletePost')->middleware(['auth:sanctum','postMiddleware']);

Route::post('/post/detail/{postid}/store',[commentController::class,'storeComment'])->name('storeComment')->middleware(['auth:sanctum'],'postMiddleware');
Route::get('/post/detail/{postid}/delete/{id}',[commentController::class,'deleteComment'])->name('deleteComment')->middleware(['auth:sanctum'],'postMiddleware');
