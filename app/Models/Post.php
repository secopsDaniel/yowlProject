<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Categorie;
use App\Models\Commentaire;

class Post extends Model
{


     protected $fillable = [
       'links',
       'source',
       'titre',
       'description',
       'photo_video',
       'creator_id',
       'categ_id',

   ];

    public function creator(){
        return $this->belongsTo(User::class);
    }

     public function categorie(){
        return $this->belongsTo(Categorie::class,  'categ_id','id');
    }
    public function commentaires (){
        return $this->hasMany(Commentaire::class, 'id_post', 'id' );
    }



}
