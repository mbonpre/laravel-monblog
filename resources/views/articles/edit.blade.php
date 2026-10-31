<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modifier l'article
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">

                <form action="{{ route('articles.update', $article) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Titre</label>
                        <input type="text" name="titre" value="{{ old('titre', $article->titre) }}"
                               class="w-full border rounded p-2" required>
                        @error('titre') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Contenu</label>
                        <textarea name="contenu" rows="6"
                                  class="w-full border rounded p-2" required>{{ old('contenu', $article->contenu) }}</textarea>
                        @error('contenu') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Catégorie</label>
                        <select name="categorie_id" class="w-full border rounded p-2" required>
                            <option value="">-- Choisir une catégorie --</option>
                            @foreach($categories as $categorie)
                                <option value="{{ $categorie->id }}"
                                    {{ $article->categorie_id == $categorie->id ? 'selected' : '' }}>
                                    {{ $categorie->nom }}
                                </option>
                            @endforeach
                        </select>
                        @error('categorie_id') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Statut</label>
                        <select name="statut" class="w-full border rounded p-2" required>
                            <option value="brouillon" {{ $article->statut == 'brouillon' ? 'selected' : '' }}>Brouillon</option>
                            <option value="publié" {{ $article->statut == 'publié' ? 'selected' : '' }}>Publié</option>
                        </select>
                        @error('statut') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex gap-3">
                        <button type="submit"
                                class="bg-blue-600 text-white px-6 py-2 rounded">
                            Mettre à jour
                        </button>
                        <a href="{{ route('articles.index') }}"
                           class="bg-gray-300 text-gray-800 px-6 py-2 rounded">
                            Annuler
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>