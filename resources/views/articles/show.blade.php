<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $article->titre }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">

                <div class="mb-4 text-sm text-gray-500">
                    Par {{ $article->user->name }} &nbsp;·&nbsp;
                    Catégorie : {{ $article->categorie->nom ?? '-' }} &nbsp;·&nbsp;
                    Statut : {{ $article->statut }}
                </div>

                <div class="text-gray-800 leading-relaxed">
                    {{ $article->contenu }}
                </div>

                <div class="mt-6">
                    <a href="{{ route('articles.index') }}"
                       class="bg-gray-300 text-gray-800 px-4 py-2 rounded">
                        ← Retour
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>