<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class AdminController extends Controller
{
    public function index()
    {
        $tousLesUsers = User::get();

        return $tousLesUsers;
    }
    public function destroy($id)
    {
        $user = User::withTrashed()->find($id);

        if(!$user){
            return response()->json(["message" => "L'utilisateur n'existe pas! "], 404);
        }

        $user->delete();

        return response()->json(["message" => "L'utilisateur a bien été supprimé"]);
    }

    public function restore($id)
    {
        $user = User::withTrashed()->find($id);
        $user->restore();

        return ["message" => "L'utilisateur est de nouveau actif"];
    }

    //mettre à jour les données
    public function update(Request $request, $id){
        $user = User::findOrFail($id);
        $user->update($request->only(['firstName', 'lastName', 'login', 'role']));
        return response()->json(["message" => 'Mise à jour fait!']);
    }
}

