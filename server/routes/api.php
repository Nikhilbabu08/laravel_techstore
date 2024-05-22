<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TechPostsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function(){

   //crud_operations
Route::post('/createpost',[TechPostsController::class,'createPost']);
Route::get('/getposts/{id}',[TechPostsController::class,'getPostById']);
Route::put('/getposts/{id}/update',[TechPostsController::class,'updatePost']);
Route::delete('/getposts/{id}/delete',[TechPostsController::class,'deletePost']);

});

Route::get('/getposts',[TechPostsController::class,'getPosts']);

    //auth
    Route::post('/signup',[AuthController::class,'signup']);
    Route::post('/login',[AuthController::class,'login']);