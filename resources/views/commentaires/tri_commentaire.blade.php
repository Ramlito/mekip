html>
<head>
    <title>Commentaires triés</title>
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

<h2>La liste des commentaoires</h2>

@if(!empty($commentaires))
    @foreach($commentaires as $com)
        <p><li>date du commentaire : {{$com["date_com"]}}</li>
        commentaire : {{$com["commentaire"]}}</br>
        note : {{$com["note"]}}
        <br>
    @endforeach
@else
    <h3>aucune jeu</h3>
@endif

</body>
</html>
