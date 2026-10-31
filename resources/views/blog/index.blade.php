<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Blog</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=DM+Sans:wght@300;400;500&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --ink: #0a0a0a; --paper: #f5f0e8; --red: #c0152b; --muted: #6b6560;
            --serif: 'Playfair Display', Georgia, serif;
            --sans: 'DM Sans', sans-serif;
            --mono: 'DM Mono', monospace;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { background: var(--paper); color: var(--ink); font-family: var(--sans); }

        .site-header { background: var(--ink); color: white; padding: 0 40px; }
        .header-top { display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px solid #333; font-family: var(--mono); font-size: 11px; color: #888; }
        .header-top a { color: var(--red); text-decoration: none; margin-left: 16px; font-size: 11px; }
        .header-main { text-align: center; padding: 28px 0 20px; border-bottom: 3px solid var(--red); }
        .site-title { font-family: var(--serif); font-size: 64px; font-weight: 900; letter-spacing: -2px; line-height: 1; color: white; }
        .site-title span { color: var(--red); }
        .site-tagline { font-family: var(--mono); font-size: 11px; color: #888; letter-spacing: 0.2em; text-transform: uppercase; margin-top: 8px; }
        .header-nav { display: flex; justify-content: center; gap: 32px; padding: 14px 0; }
        .header-nav a { color: #ccc; text-decoration: none; font-size: 12px; font-family: var(--mono); text-transform: uppercase; letter-spacing: 0.1em; }
        .header-nav a:hover { color: var(--red); }

        .cat-bar { background: var(--red); padding: 0 40px; display: flex; flex-wrap: wrap; }
        .cat-bar a { color: white; text-decoration: none; font-family: var(--mono); font-size: 11px; text-transform: uppercase; letter-spacing: 0.1em; padding: 10px 20px; border-right: 1px solid rgba(255,255,255,0.2); }
        .cat-bar a.active, .cat-bar a:hover { background: rgba(0,0,0,0.25); }

        .main { max-width: 1100px; margin: 0 auto; padding: 40px 20px; }

        .featured { display: grid; grid-template-columns: 1fr 380px; border: 2px solid var(--ink); margin-bottom: 40px; overflow: hidden; }
        .featured-image { min-height: 380px; background-size: cover; background-position: center; position: relative; }
        .featured-image::after { content: ''; position: absolute; inset: 0; background: linear-gradient(to top, rgba(0,0,0,0.5) 0%, transparent 60%); }
        .featured-label { position: absolute; top: 24px; left: 24px; z-index: 2; background: var(--red); color: white; font-family: var(--mono); font-size: 10px; text-transform: uppercase; letter-spacing: 0.15em; padding: 4px 12px; }
        .featured-content { background: white; padding: 36px 32px; display: flex; flex-direction: column; justify-content: space-between; border-left: 2px solid var(--ink); }
        .featured-cat { font-family: var(--mono); font-size: 10px; text-transform: uppercase; letter-spacing: 0.15em; color: var(--red); margin-bottom: 12px; }
        .featured-title { font-family: var(--serif); font-size: 30px; font-weight: 700; line-height: 1.2; margin-bottom: 16px; }
        .featured-title a { color: var(--ink); text-decoration: none; }
        .featured-title a:hover { color: var(--red); }
        .featured-excerpt { font-size: 14px; color: var(--muted); line-height: 1.7; flex: 1; margin-bottom: 24px; }
        .featured-meta { font-family: var(--mono); font-size: 11px; color: #999; border-top: 1px solid #eee; padding-top: 16px; display: flex; justify-content: space-between; }
        .read-more { display: inline-block; background: var(--ink); color: white; text-decoration: none; font-family: var(--mono); font-size: 11px; text-transform: uppercase; letter-spacing: 0.1em; padding: 10px 20px; margin-bottom: 16px; }
        .read-more:hover { background: var(--red); }

        .section-divider { display: flex; align-items: center; gap: 16px; margin-bottom: 24px; }
        .section-divider h2 { font-family: var(--serif); font-size: 22px; font-weight: 700; white-space: nowrap; }
        .section-divider::after { content: ''; flex: 1; height: 2px; background: var(--ink); }

        .articles-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; margin-bottom: 40px; }
        .article-card { background: white; border: 1.5px solid #e0d8cc; overflow: hidden; transition: transform 0.2s, box-shadow 0.2s; }
        .article-card:hover { transform: translateY(-3px); box-shadow: 4px 4px 0 var(--ink); }
        .card-thumb { height: 180px; background-size: cover; background-position: center; position: relative; }
        .card-thumb::after { content: ''; position: absolute; inset: 0; background: linear-gradient(to top, rgba(0,0,0,0.5) 0%, transparent 60%); }
        .card-cat { position: absolute; bottom: 10px; left: 10px; z-index: 2; background: var(--red); color: white; font-family: var(--mono); font-size: 9px; text-transform: uppercase; letter-spacing: 0.1em; padding: 3px 8px; }
        .card-body { padding: 20px; }
        .card-title { font-family: var(--serif); font-size: 18px; font-weight: 700; line-height: 1.3; margin-bottom: 10px; }
        .card-title a { color: var(--ink); text-decoration: none; }
        .card-title a:hover { color: var(--red); }
        .card-excerpt { font-size: 13px; color: var(--muted); line-height: 1.6; margin-bottom: 16px; }
        .card-meta { font-family: var(--mono); font-size: 10px; color: #aaa; display: flex; justify-content: space-between; border-top: 1px solid #f0ebe0; padding-top: 12px; }
        .card-link { color: var(--red); text-decoration: none; font-family: var(--mono); font-size: 10px; text-transform: uppercase; }

        .pagination { display: flex; justify-content: center; gap: 8px; margin-top: 40px; }
        .pagination a, .pagination span { display: inline-flex; align-items: center; justify-content: center; width: 36px; height: 36px; border: 1.5px solid var(--ink); font-family: var(--mono); font-size: 12px; text-decoration: none; color: var(--ink); }
        .pagination span.active { background: var(--ink); color: white; }
        .pagination a:hover { background: var(--red); border-color: var(--red); color: white; }

        footer { background: var(--ink); color: #888; text-align: center; padding: 24px; font-family: var(--mono); font-size: 11px; margin-top: 40px; border-top: 3px solid var(--red); }
        footer span { color: var(--red); }

        @media(max-width: 768px) {
            .featured { grid-template-columns: 1fr; }
            .articles-grid { grid-template-columns: 1fr; }
            .site-title { font-size: 40px; }
        }
    </style>
</head>
<body>

<header class="site-header">
    <div class="header-top">
        <span>{{ now()->isoFormat('dddd D MMMM YYYY') }}</span>
        <span>Votre source d'information quotidienne</span>
        <div>
            @auth
                <a href="{{ route('articles.index') }}">Mes articles</a>
            @else
                <a href="{{ route('login') }}">Connexion</a>
                <a href="{{ route('register') }}">Inscription</a>
            @endauth
        </div>
    </div>
    <div class="header-main">
        <div class="site-title">Mon<span>Blog</span></div>
        <div class="site-tagline">Articles · Actualités · Réflexions</div>
    </div>
    <nav class="header-nav">
        <a href="{{ route('home') }}">Accueil</a>
        @auth
            <a href="{{ route('articles.index') }}">Mes Articles</a>
            <a href="{{ route('profile.edit') }}">Profil</a>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" style="background:none;border:none;color:#ccc;cursor:pointer;font-family:var(--mono);font-size:12px;text-transform:uppercase;letter-spacing:0.1em;">Déconnexion</button>
            </form>
        @else
            <a href="{{ route('login') }}">Connexion</a>
            <a href="{{ route('register') }}">Inscription</a>
        @endauth
    </nav>
</header>

<div class="cat-bar">
    <a href="{{ route('home') }}" class="{{ !request('categorie') ? 'active' : '' }}">✦ Tous</a>
    @foreach($categories as $categorie)
        <a href="{{ route('home', ['categorie' => $categorie->id]) }}"
           class="{{ request('categorie') == $categorie->id ? 'active' : '' }}">
            {{ $categorie->nom }}
        </a>
    @endforeach
</div>

<main class="main">

    @php
        $images = [
            'Technologie' => 'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?w=800&q=80',
            'Science'     => 'https://images.unsplash.com/photo-1462331940025-496dfbfc7564?w=800&q=80',
            'Sport'       => 'https://images.unsplash.com/photo-1517649763962-0c623066013b?w=800&q=80',
            'default'     => 'https://images.unsplash.com/photo-1518770660439-4636190af475?w=800&q=80',
        ];
    @endphp

    @if($articles->count() > 0)
        @php $featured = $articles->first(); @endphp
        @php $catName = $featured->categorie->nom ?? 'default'; @endphp
        @php $imgUrl = $images[$catName] ?? $images['default']; @endphp

        <!-- ARTICLE À LA UNE -->
        <div class="featured">
            <div class="featured-image" style="background-image: url('{{ $imgUrl }}');">
                <div class="featured-label">À la une</div>
            </div>
            <div class="featured-content">
                <div>
                    <div class="featured-cat">{{ $featured->categorie->nom ?? '-' }}</div>
                    <h1 class="featured-title">
                        <a href="{{ route('blog.show', $featured) }}">{{ $featured->titre }}</a>
                    </h1>
                    <p class="featured-excerpt">{{ Str::limit($featured->contenu, 200) }}</p>
                </div>
                <div>
                    <a href="{{ route('blog.show', $featured) }}" class="read-more">Lire l'article →</a>
                    <div class="featured-meta">
                        <span>Par {{ $featured->user->name }}</span>
                        <span>{{ $featured->created_at->format('d/m/Y') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- AUTRES ARTICLES -->
        @if($articles->count() > 1)
            <div class="section-divider"><h2>Derniers articles</h2></div>
            <div class="articles-grid">
                @foreach($articles->skip(1) as $article)
                    @php $cat = $article->categorie->nom ?? 'default'; @endphp
                    @php $img = $images[$cat] ?? $images['default']; @endphp
                    <div class="article-card">
                        <div class="card-thumb" style="background-image: url('{{ $img }}');">
                            <span class="card-cat">{{ $article->categorie->nom ?? '-' }}</span>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">
                                <a href="{{ route('blog.show', $article) }}">{{ $article->titre }}</a>
                            </h3>
                            <p class="card-excerpt">{{ Str::limit($article->contenu, 100) }}</p>
                            <div class="card-meta">
                                <span>{{ $article->user->name }} · {{ $article->created_at->format('d/m/Y') }}</span>
                                <a href="{{ route('blog.show', $article) }}" class="card-link">Lire →</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    @else
        <p style="text-align:center; color:var(--muted); padding: 60px 0; font-family: var(--serif); font-size: 20px;">
            Aucun article publié pour l'instant.
        </p>
    @endif

    <!-- PAGINATION -->
    <div class="pagination">
        {{ $articles->links() }}
    </div>

</main>

<footer>
    <p>© {{ date('Y') }} <span>MonBlog</span> — Génie Logiciel · TP Laravel · Dr. ZOHOU Pierre Jérôme</p>
</footer>

</body>
</html>