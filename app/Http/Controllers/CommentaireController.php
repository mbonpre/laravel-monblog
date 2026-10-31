<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentaireController extends Controller
{
    public function store(Request $request, Article $article)
    {
        $request->validate([
            'contenu' => 'required|min:3',
        ]);

        Commentaire::create([
            'contenu'    => $request->contenu,
            'user_id'    => Auth::id(),
            'article_id' => $article->id,
        ]);

        return back()->with('success', 'Commentaire ajouté !');
    }

    public function destroy(Commentaire $commentaire)
    {
        if ($commentaire->user_id !== Auth::id()) {
            abort(403);
        }

        $commentaire->delete();

        return back()->with('success', 'Commentaire supprimé !');
    }
}
