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
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $users = User::find($request->id);
    $users->is_verified = true;
    $users->email_verified_at = now()->format('d-m-Y H:i:s');
    return response()->json(['message' => 'votre Email à été vérifié']);
})->middleware(['auth:sanctum', 'signed'])->name('verification.verify');


Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return response()->json(['message' => 'Le lien de vérification est envoyé, Vérifiez vos emails!']);
})->middleware(['auth:sanctum', 'throttle:6,1'])->name('verification.send');

/*
Post api route need authentification
*/

Route::post('/post', [postController::class, 'getDataFromLink']);



/*
Categories api route need authentification
*/
Route::get('/categories', [Categories::class, 'getAll'])
->middleware('auth:sanctum');

Route::post('/categories', [Categories::class, 'create'])
->middleware('auth:sanctum');

