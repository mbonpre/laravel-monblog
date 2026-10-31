<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    // Liste des articles de l'utilisateur connecté
    public function index()
    {
        $articles = Article::where('user_id', Auth::id())->with('categorie')->latest()->get();
        return view('articles.index', compact('articles'));
    }

    // Formulaire de création
    public function create()
    {
        $categories = Categorie::all();
        return view('articles.create', compact('categories'));
    }

    // Enregistrer un nouvel article
    public function store(Request $request)
    {
        $request->validate([
            'titre'        => 'required|max:255',
            'contenu'      => 'required',
            'statut'       => 'required|in:brouillon,publié',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        Article::create([
            'titre'        => $request->titre,
            'contenu'      => $request->contenu,
            'statut'       => $request->statut,
            'categorie_id' => $request->categorie_id,
            'user_id'      => Auth::id(),
        ]);

        return redirect()->route('articles.index')->with('success', 'Article créé avec succès !');
    }

    // Afficher un article
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    // Formulaire de modification
    public function edit(Article $article)
    {
        if ($article->user_id !== Auth::id()) {
            abort(403);
        }
        $categories = Categorie::all();
        return view('articles.edit', compact('article', 'categories'));
    }

    // Mettre à jour un article
    public function update(Request $request, Article $article)
    {
        if ($article->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'titre'        => 'required|max:255',
            'contenu'      => 'required',
            'statut'       => 'required|in:brouillon,publié',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        $article->update($request->all());

        return redirect()->route('articles.index')->with('success', 'Article modifié avec succès !');
    }

    // Supprimer un article
    public function destroy(Article $article)
    {
        if ($article->user_id !== Auth::id()) {
            abort(403);
        }

        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Article supprimé !');
    }
}
