<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ScreenShotService;
use App\Models\Post;
use App\Models\Commentaire;

class postController extends Controller
{
    public function getDataFromLink(Request $req)
    {
        $data = $req->validate([
            'titre' => ['required', 'string', 'min:3', 'unique:posts'],
            'description' => ['required', 'string', 'min:10'],
            'links' => ['required', 'string', 'url', 'unique:posts'],
            'categ_id' => ['required', 'exists:categories,id'],
            'source' => ['required', 'string', 'min:3'],
            'commentaire' => ['nullable', 'string', 'min:3'],
        ]);

        $screenshotUrl = ScreenShotService::TakeScreenshot($data['links']);

        $post = Post::create([
            'titre' => $data['titre'],
            'description' => $data['description'],
            'links' => $data['links'],
            'source' => $data['source'],
            'photo_video' => $screenshotUrl,
            'creator_id' => $req->user()->id,
            'categ_id' => $data['categ_id'],
        ]);

        if (!empty($data['commentaire'])) {
            Commentaire::create([
                'contenu' => $data['commentaire'],
                'user_id' => $req->user()->id,
                'id_post' => $post->id,
                'likes' => 0,
                'waring' => 0,
            ]);
        }

        $post = Post::with(['creator', 'categorie', 'commentaires.user'])->find($post->id);

        return response()->json([
            'status' => 'succès',
            'data' => $post,
        ], 201);
    }

    public function UpdatePost(Request $req, $id)
    {
        $id_user = $req->user()->id;
        $data = $req->validate([
            'titre' => ['required', 'string', 'min:3'],
            'description' => ['required', 'string', 'min:10'],
            'categ_id' => ['required', 'exists:categories,id'],
            'links' => ['required', 'string', 'url'],
            'photo_video' => ['required'],
            'source' => ['required', 'string', 'min:3'],
            'commentaire' => ['required', 'string', 'min:10'],
        ]);

        $post = Post::find($id);
        if (!$post) {
            return response()->json(['status' => 'error', 'message' => 'Post non trouvé'], 404);
        }

        $post->update($data);

        Commentaire::create([
            'contenu' => $data['commentaire'],
            'user_id' => $id_user,
            'id_post' => $id,
            'likes' => 0,
            'waring' => 0,
        ]);

        $res = $this->getPOst($id);
        return response()->json([
            'status' => 'succès',
            'data' => $res,
        ]);
    }

    public function getPOst($id)
    {
        $post = Post::with(['creator', 'categorie', 'commentaires.user'])
            ->where('id', $id)
            ->first();

        return response()->json([
            'status' => 'succès',
            'data' => $post,
        ]);
    }
}
