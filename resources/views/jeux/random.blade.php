<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
</head>
<body>
@if (auth()->guest())
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                @endif
            @endauth
        </div>
    @endif
@else
    <p>Utilisateur déjà connecté</p>
@endif

<h3><b><a href="http://localhost:8000/">Accueil</a></b></h3>
<ul>
    <li><a href="http://localhost:8000/jeux">Jeux</a></li>
    <li><a href="http://localhost:8000/user">Information compte</a></li>
</ul>
<div><h1>5 jeux aléatoires</h1></div>
@if(!empty($jeux))
    <ul>
        @foreach($jeux as $jeu)
            <li>Nom du jeu : {{$jeu->nom}}, le thème : {{$jeu->theme->nom}}, la durée d'une partie : {{$jeu->duree}}, le nombre de joueurs : {{$jeu->nombre_joueurs}}</li>
        @endforeach
    </ul>
@else
    <h3>aucune jeu</h3>
@endif
</body>
</html>
