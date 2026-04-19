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
        try {
            \Log::info('Début de création de post', ['user_id' => $req->user()->id]);

            $data = $req->validate([
                'titre' => ['required', 'string', 'min:3', 'unique:posts'],
                'description' => ['required', 'string', 'min:10'],
                'links' => ['required', 'string', 'url', 'unique:posts'],
                'categ_id' => ['required', 'exists:categories,id'],
                'source' => ['required', 'string', 'min:3'],
                'commentaire' => ['nullable', 'string', 'min:3'],
            ]);

            \Log::info('Validation réussie, génération de screenshot', ['url' => $data['links']]);

            $screenshotUrl = ScreenShotService::TakeScreenshot($data['links']);

            \Log::info('Screenshot généré', ['screenshot_url' => $screenshotUrl]);

            $post = Post::create([
                'titre' => $data['titre'],
                'description' => $data['description'],
                'links' => $data['links'],
                'source' => $data['source'],
                'photo_video' => $screenshotUrl,
                'creator_id' => $req->user()->id,
                'categ_id' => $data['categ_id'],
            ]);

            \Log::info('Post créé', ['post_id' => $post->id]);

            if (!empty($data['commentaire'])) {
                Commentaire::create([
                    'contenu' => $data['commentaire'],
                    'user_id' => $req->user()->id,
                    'id_post' => $post->id,
                    'waring' => 0,
                ]);

                \Log::info('Commentaire créé', ['post_id' => $post->id]);
            }

            $post = Post::with(['creator', 'categorie', 'commentaires.user'])->find($post->id);

            \Log::info('Post créé avec succès', ['post_id' => $post->id]);

            return response()->json([
                'status' => 'succès',
                'data' => $post,
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::warning('Erreur de validation', [
                'user_id' => $req->user()->id,
                'errors' => $e->errors()
            ]);
            throw $e; // Laravel gère automatiquement les ValidationException

        } catch (\Exception $e) {
            \Log::error('Erreur lors de la création du post', [
                'user_id' => $req->user()->id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'message' => 'Erreur interne du serveur',
                'error' => $e->getMessage()
            ], 500);
        }
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
            'like' => 0,
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

    public function getAllPosts(Request $req)
    {
        $cat = $req->query('categ_id');
        if ($cat) {
             $posts = Post::with(['creator', 'categorie', 'commentaires.user'])->where('categ_id', $cat)->latest()->paginate(10);
        } else {
             $posts = Post::with(['creator', 'categorie', 'commentaires.user'])->latest()->paginate(10);
        };

        return response()->json([
            'status' => 'succès',
            'data' => $posts,
        ]);
    }

    
}
