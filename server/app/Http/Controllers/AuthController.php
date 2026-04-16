<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Symfony\Contracts\Service\Attribute\Required;

class AuthController extends Controller
{
    public function SignUp(Request $request){
        $fields = $request->validate([
        'firstName' => 'required|string|max:77',
        'lastName' => 'required|string|max:77',
        'login' => 'required|string|unique:users,login',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
        'gender' => 'required|string',
        'birthday' => 'required|date',
        ],[
            'login.required'=>'Le pseudo est obligatoire',
            'login.unique'=>'Ce pseudo existe déjà',
            'password.required' => 'Le mot de passe est obligatoire',
            'password.confirmed' => 'Le mot de passe ne correspond pas',
            'password.min' => 'Il vous faut au minimum 8 caractère',
            'email.required'=>"L'email est obligatoire",
            'email.unique'=>'Cet email existe déjà',
        ]);

        $user = User::create([
        'firstName' => $request->firstName,
        'lastName' => $request->lastName,
        'login' => $request->login,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'gender' => $request->gender,
        'role' => 'user',
        'birthday' => $request->birthday,
        ]);
        //Mail envoi
        event(new Registered($user));
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'satus' => 'parfait !',
            'message' => 'Utilisateur crée! Allez vérifier vos emails !',
            'token' => $token,
            'user' => $user,
        ], 201);
        //return redirect()->route('verification.notice');
    }

    public function SignIn(Request $request){
        $fields = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ], [
            'password' => 'Le mot de passe est nécessaire',
            'email.required'=>"L'email est nécessaire",
        ]);

        if(!Auth::attempt($request->only('email', 'password'))){
            return response()->json([
                'message' => "L'email ou le mot de passe est incorrect"
            ], 401);
        }

        $user = User::where('email', $fields['email'])->first();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'satus' => 'Connecté !',
            'token' => $token,
            'user' => $user,
        ]);
    }
}
