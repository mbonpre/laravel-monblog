<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->titre }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <nav class="bg-white shadow p-4 mb-6">
        <div class="max-w-4xl mx-auto flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-xl font-bold text-blue-600">Mon Blog</a>
            <div class="flex gap-4">
                @auth
                    <a href="{{ route('articles.index') }}" class="text-gray-600 hover:text-blue-600">Mes articles</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="text-gray-600 hover:text-red-600">Déconnexion</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600">Connexion</a>
                    <a href="{{ route('register') }}" class="text-gray-600 hover:text-blue-600">Inscription</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="max-w-4xl mx-auto px-4">

        <!-- Article -->
        <div class="bg-white rounded shadow p-6 mb-6">
            <h1 class="text-3xl font-bold mb-2">{{ $article->titre }}</h1>
            <div class="text-sm text-gray-500 mb-6">
                Par {{ $article->user->name }} &nbsp;·&nbsp;
                {{ $article->categorie->nom ?? '-' }} &nbsp;·&nbsp;
                {{ $article->created_at->format('d/m/Y') }}
            </div>
            <div class="text-gray-800 leading-relaxed">
                {{ $article->contenu }}
            </div>
            <div class="mt-6">
                <a href="{{ route('home') }}" class="text-blue-600 hover:underline">← Retour au blog</a>
            </div>
        </div>

        <!-- Commentaires -->
        <div class="bg-white rounded shadow p-6 mb-6">
            <h2 class="text-xl font-bold mb-4">Commentaires ({{ $article->commentaires->count() }})</h2>

            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @forelse($article->commentaires as $commentaire)
            <div class="border-b py-3">
                <div class="flex justify-between items-start">
                    <div>
                        <span class="font-semibold text-sm">{{ $commentaire->user->name }}</span>
                        <span class="text-gray-400 text-xs ml-2">{{ $commentaire->created_at->format('d/m/Y H:i') }}</span>
                        <p class="text-gray-700 mt-1">{{ $commentaire->contenu }}</p>
                    </div>
                    @auth
                        @if($commentaire->user_id === Auth::id())
                        <form action="{{ route('commentaires.destroy', $commentaire) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500 text-sm hover:underline">Supprimer</button>
                        </form>
                        @endif
                    @endauth
                </div>
            </div>
            @empty
                <p class="text-gray-500">Aucun commentaire pour l'instant.</p>
            @endforelse
        </div>

        <!-- Formulaire commentaire -->
        @auth
        <div class="bg-white rounded shadow p-6">
            <h3 class="text-lg font-bold mb-4">Laisser un commentaire</h3>
            <form action="{{ route('commentaires.store', $article) }}" method="POST">
                @csrf
                <textarea name="contenu" rows="4" placeholder="Votre commentaire..."
                          class="w-full border rounded p-2 mb-3" required></textarea>
                @error('contenu') <p class="text-red-500 text-sm mb-2">{{ $message }}</p> @enderror
                <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded">
                    Publier
                </button>
            </form>
        </div>
        @else
        <div class="bg-white rounded shadow p-6 text-center">
            <p class="text-gray-600">
                <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Connectez-vous</a>
                pour laisser un commentaire.
            </p>
        </div>
        @endauth

    </div>

</body>
</html>