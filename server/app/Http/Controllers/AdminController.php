<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $tousLesUsers = User::withTrashed()->get();

        return $tousLesUsers;
    }
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return ["message" => "L'utilisateur a bien été désactivé"];
    }

    public function restore($id)
    {
        $user = User::withTrashed()->find($id);
        $user->restore();

        return ["message" => "L'utilisateur est de nouveau actif"];
    }
}
