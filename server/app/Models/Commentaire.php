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
        'comParent_id',
        'waring',
        'like',
    ];


    public function post(){
        return $this->belongsTo(Post::class, 'id_post', 'id' );
    }
    public function user (){
        return $this->belongsTo(User::class);
    }

    public function parent()
    {
        return $this->belongsTo(Commentaire::class, 'comParent_id');
    }

    public function replies()
    {
        return $this->hasMany(Commentaire::class, 'comParent_id');
    }


}
