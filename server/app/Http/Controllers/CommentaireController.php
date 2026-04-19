<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commentaire;

class CommentaireController extends Controller
{
  public function createComment(Request $req)
    {
        $data = $req->validate([
            'contenu' => 'required|string|min:3',
            'id_post' => 'required|exists:posts,id',
            'comParent_id' => 'nullable|exists:commentaires,id',
        ]);

        $comment = Commentaire::create([
            'contenu' => $data['contenu'],
            'user_id' => $req->user()->id,
            'id_post' => $data['id_post'],
            'comParent_id' => isset( $data['comParent_id']) ? $data['comParent_id'] : null,
            'waring' => 0,
            'like' => 0,
        ]);

        return response()->json([
            'status' => 'succès',
            'data' => $comment->load('user'),
        ], 201);
    }

    public function updateComment(Request $req, $id)
    {
        $comment = Commentaire::where('id', $id)->where('user_id', $req->user()->id)->first();

        if (!$comment) {
            return response()->json(['status' => 'error', 'message' => 'Commentaire non trouvé ou non autorisé'], 404);
        }

        $data = $req->validate([
            'contenu' => 'required|string|min:3',
        ]);

        $comment->update($data);

        return response()->json([
            'status' => 'succès',
            'data' => $comment->load('user'),
        ]);
    }

    public function deleteComment(Request $req, $id)
    {
        $comment = Commentaire::where('id', $id)->where('user_id', $req->user()->id)->first();

        if (!$comment) {
            return response()->json(['status' => 'error', 'message' => 'Commentaire non trouvé ou non autorisé'], 404);
        }

        $comment->delete();

        return response()->json([
            'status' => 'succès',
            'message' => 'Commentaire supprimé',
        ]);
    }

    public function likeComment(Request $req, $id)
    {
        $comment = Commentaire::find($id);

        if (!$comment) {
            return response()->json(['status' => 'error', 'message' => 'Commentaire non trouvé'], 404);
        }

        $comment->increment('like');

        return response()->json([
            'status' => 'succès',
            'data' => $comment,
        ]);
    }
}
