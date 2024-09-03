<?php

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/',[loginController::class,'login'])->name('login');
Route::get('/logout',[loginController::class,'logout'])->name('logout')->middleware(['auth:sanctum']);

Route::get('/user',[UserController::class,'allUser'])->name('alluser')->middleware(['auth:sanctum']);
Route::get('/post',[PostController::class,'allpost'])->name('allpost')->middleware(['auth:sanctum']);
Route::get('/post/detail/{id}',[PostController::class,'detailPost'])->name('detailPost')->middleware(['auth:sanctum']);;


