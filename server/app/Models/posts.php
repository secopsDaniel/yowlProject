<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{


     protected $fillable = [
      'links',
      'titre',
      'description',
       'photo_video'

   ];
}
