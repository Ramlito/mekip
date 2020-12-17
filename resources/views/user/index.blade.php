<html>
<head>
    <title>Liste des jeux</title>
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
        <p><a href="http://localhost:8000/dashboard">Retour au dashboard</a></p>
        <p><a href="{{Route('user.collection')}}">Retour au dashboard</a></p>
@endif


<h2>Information de l'utilisateur</h2>

<ul>
    <li>Nom : {{$users['last name']}}</li> {{--si nom colonne avec espace--}}
    <li>mail : {{$users->email}}</li>
</ul>


</body>
</html>
