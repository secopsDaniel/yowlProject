<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', function (Request $req ){
    return $req->all();
    });

/* use App\Http\Controllers\AuthenController;
Route::post('/register', [AuthenController::class, 'register']);
Route::post('/login', [AuthenController::class, 'login']); */

