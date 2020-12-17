<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet"
    <title>Page d'accueil</title>
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
    <input method="POST" type="button" value="Logout" onClick="window.location.href='{{route('logout')}}'"/>
@endif

<h3><b><a href="http://localhost:8000/">Accueil</a></b></h3>
<ul>
    <li><a href="http://localhost:8000/jeux">Jeux</a></li>
    <li><a href="http://localhost:8000/user">Information compte</a></li>
    <li><a href="http://localhost:8000/random">Choix de 5 jeux aléatoires</a></li>
</ul>
</body>
</html>
