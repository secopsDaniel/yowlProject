<?php

use App\Http\Controllers\AuthController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'SignUp']);
Route::post('/login', [AuthController::class, 'SignIn']);

Route::get('/user', function (Request $request ){
    return response()->json($request->user());
    })->middleware('auth:sanctum');


//mail
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return response()->json(['message' => 'votre Email à été vérifié']);
})->middleware(['auth:sanctum', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return response()->json(['message' => 'Le lien de vérification est envoyé, Vérifiez vos emails!']);
})->middleware(['auth:sanctum', 'throttle:6,1'])->name('verification.send');

// Route::get('/', function () {
//     return view('welcome');
// })->name('verification.notice');
