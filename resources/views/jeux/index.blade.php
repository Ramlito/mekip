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
@endif


<h2>La liste des jeux</h2>
<p>
<input type="button" value="Trier la liste" onClick="window.location.href='http://127.0.0.1:8000/tri'"/>

<form action="{{route('jeux.editeur')}}" method="post">
    {{ csrf_field() }}
    <select size="1" name="nomEditeur">
        <option value="Editeur">Editeur</option>
        @foreach($edits as $edit)
            <option value="{{$edit->nom}}">{{$edit->nom}}</option>
        @endforeach
    </select>
    <input type="submit" value="Trier par éditeur"/>
</form>

<form action="{{route('jeux.theme')}}" method="post">
    {{ csrf_field() }}
    <select size="1" name="nomTheme">
        <option value="Thème">Thème</option>
        @foreach($themes as $theme)
            <option value="{{$theme->nom}}">{{$theme->nom}}</option>
        @endforeach
    </select>
    <input type="submit" value="Trier par thème"/>
</form>

<form action="{{route('jeux.mecanique')}}" method="post">
    {{ csrf_field() }}
    <select size="1" name="nomMeca">
        <option value="Mécanique">Mécanique</option>
        @foreach($mecaniques as $meca)
            <option value="{{$meca->nom}}">{{$meca->nom}}</option>
        @endforeach
    </select>
    <input type="submit" value="Trier par Mécanique"/>
</form>
</p>
@if(!empty($jeux))
    <ul>
        @foreach($jeux as $jeu)
            <li>Nom du jeu : {{$jeu->nom}}, le thème : {{$jeu->theme->nom}}, la durée d'une partie : {{$jeu->duree}}, le nombre de joueurs : {{$jeu->nombre_joueurs}}
                <a href="{{route('jeux.show',['id'=>$jeu->id])}}">détails</a> <a href="{{route('user.ajouterAchat',['jid'=>$jeu->id])}}">Ajouter à ma collection</a></li>
        @endforeach
    </ul>
@else
    <h3>aucune jeu</h3>
@endif

</body>
</html>
