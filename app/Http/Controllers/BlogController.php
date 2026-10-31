<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::where('statut', 'publié')
            ->with('user', 'categorie')
            ->latest();

        if ($request->has('categorie')) {
            $query->where('categorie_id', $request->categorie);
        }

        $articles = $query->paginate(5);
        $categories = Categorie::all();

        return view('blog.index', compact('articles', 'categories'));
    }

    public function show(Article $article)
    {
        $article->load('commentaires.user', 'user', 'categorie');
        return view('blog.show', compact('article'));
    }
}
