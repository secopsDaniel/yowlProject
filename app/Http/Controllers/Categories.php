<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use Illuminate\Support\Str;

class Categories extends Controller
{


 public function getAll(){
     $all_cat = Categorie::all();
     return \response()->json([
         'statut' => 'succces',
         'data'  => $all_cat
     ],200);
 }

  public function create(Request $req){

    $data = $req ->validate([
      'title' => 'required|string|max:20',
      'description' => 'required|string|max:77'
       ]);

     $data['slug'] = Str::slug($data['title']);
     $cat =  Categorie::updateOrCreate($data);

     return \response()->json([
         'statut' => 'succces',
     ],200);

  }
}
