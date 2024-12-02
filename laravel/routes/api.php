<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [UserController::class, 'create']); 

Route::post('/projects', [ProjectController::class, 'createProject']); 
Route::get('/projects/{id}', [ProjectController::class, 'getProject']); 
Route::post('/projects/{projectId}/add-member/{userId}', [ProjectController::class, 'addMember']); 
