<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\User;

class Commentaire extends Model
{
    
 protected $fillable = [
        'contenu',
        'user_id',
        'id_post',
        'likes',
        'waring',
    ];


    public function post(){
        return $this->belongsTo(Post::class, 'id_post', 'id' );
    }
    public function user (){
        return $this->belongsTo(User::class);
    }
      

}
