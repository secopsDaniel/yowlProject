<?php

namespace App\Http\Controllers;
use App\Services\OpenGraphService;
use Illuminate\Http\Request;
use App\Services\ScreenShotService;
use App\Models\Post;
use App\Models\Commentaire;
use Illuminate\Support\Facades\Auth;
use Termwind\Components\Dd;

class postController extends Controller
{


 public function getDataFromLink(Request $req){
$content = [];
    $data = $req->validate([
      'links' =>['required', 'string', 'unique:posts', 'url'],
       'categorie_id' =>['required'],
       'source' => ['required'],
   ]);


    $res = OpenGraphService::fetchUrl($data['links']);
    $capture= ScreenShotService::TakeScreenshot($data['links']);
     $content['titre'] = $res['titre'];
     $content['description'] = $res['description'] ?? "  ";
     $content['links'] = $res['links'];
    $content['photo_video'] = $capture;
    $content['creator_id'] = 8;
    $content['categ_id'] = $data['categorie_id'];
    $content['source'] = $data['source'];
    $post = Post::create($content);


    return response()->json([
          'status' => "succès",
          'data' => $post
    ]);



 }


  public function UpdatePost(Request $req , $id){
    $id_user =  $req->user()->id();
    $data = $req ->validate([
        'titre' => ['required', 'string','min:3'],
        'description' => ['required', 'string', 'min:10'],
        'categ_id' => ['required'],
        'links' => ['required', 'string', 'url'],
        'photo_video' =>['required'],
        'source' => ['required','string','min:3'],
        'commentaire' => ['required', 'string','min:10'],

    ]);

    $post = Post::find($id);
       if ($post) {
              $post ->update($data);
               Commentaire::create([
               'contenu' => $data['commentaire'],
               'user_id' => $id_user,
               'id_post' => $id,
               'likes' => 0,
               'waring' => 0
      
               ]) ;
       $res = $this->getPOst($id);
       return response()->json([
          'status' => "succès",
          'data' => $res
        ]);
      }
   
 

        
  }

    public function getPOst($id){
       $post = Post::with(['creator', 'categorie', 'Commentaire.user'])
         ->where('id',$id)
          ->get();
    }
}
