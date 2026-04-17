<?php
use App\Models\User;
use App\Http\Controllers\AuthController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;
use App\Http\Controllers\Categories;


/*
Authentification api routes
these route don't need authentifications
*/
Route::post('/register', [AuthController::class, 'SignUp']);
Route::post('/login', [AuthController::class, 'SignIn']);

/*
User api route need authentifiation
*/
Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
/*
Mail api routes
*/
Route::get('/email/verify/{id}/{hash}',[AuthController::class, 'Verify_Email'])->name('verification.verify');


Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return response()->json(['message' => 'Le lien de vérification est envoyé, Vérifiez vos emails!']);
})->middleware(['auth:sanctum', 'throttle:6,1'])->name('verification.send');

/*
Post api route need authentification
*/

Route::post('/post', [postController::class, 'getDataFromLink']);

Route::post('/post/update/{id}', [postController::class, 'UpdatePost']);
Route::post('/post/update/{id}', [postController::class, 'UpdatePost']);
Route::post('/post/{id}', [postController::class, 'getPOst']);



/*
Categories api route need authentification
*/
Route::get('/categories', [Categories::class, 'getAll'])
->middleware('auth:sanctum');

Route::post('/categories', [Categories::class, 'create'])
->middleware('auth:sanctum');


