<?php

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', function (Request $req ){
    return $req->all();
    });
/*
Admin api route necessite authentification
for sure !!
*/
Route::middleware('auth:sanctum')->group(function(){
Route::get('/admin/users', [AdminController::class, 'index']);
route::delete('/admin/users/{id}', [AdminController::class, 'destroy']);
route::put('/admin/users/{id}', [AdminController::class, 'update']);

});
