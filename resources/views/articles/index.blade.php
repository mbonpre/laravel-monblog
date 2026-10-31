<x-app-layout>
   <x-slot name="header">
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mes Articles
        </h2>
        <a href="{{ route('home') }}"
           class="bg-red-600 text-white px-4 py-2 rounded text-sm">
            ← Voir le blog
        </a>
    </div>
</x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ route('articles.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">
                + Nouvel article
            </a>

            <table class="w-full bg-white rounded shadow mt-4">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3 text-left">Titre</th>
                        <th class="p-3 text-left">Catégorie</th>
                        <th class="p-3 text-left">Statut</th>
                        <th class="p-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($articles as $article)
                    <tr class="border-t">
                        <td class="p-3">{{ $article->titre }}</td>
                        <td class="p-3">{{ $article->categorie->nom ?? '-' }}</td>
                        <td class="p-3">{{ $article->statut }}</td>
                        <td class="p-3 flex gap-2">
                            <a href="{{ route('articles.edit', $article) }}"
                               class="bg-yellow-400 text-white px-3 py-1 rounded">Modifier</a>
                            <form action="{{ route('articles.destroy', $article) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 text-white px-3 py-1 rounded">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="p-3 text-center text-gray-500">Aucun article pour l'instant.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</x-app-layout>