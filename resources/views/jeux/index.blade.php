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
        <form method="GET" action="{{ route('logout') }}">
            @csrf
            <button type="submit">
                    Déconnexion
            </button>
        </form>
@endif

<p style="text-align: right">
    <a href="http://localhost:8000/">Accueil</a>
</p>

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

<div><h2>Ajout d'un jeu</h2></div>
<form action="{{route('jeux.storeGame')}}" method="post">
    {{ csrf_field() }}
    <label>Nom du jeu <input type="text" name="nom" placeholder="Nom du jeu"/></label>
    <label><br/><br/>Description <input type="text" name="description" placeholder="Description du jeu"/></label>

    <br/><br/>
    <select size="1" name="nomTheme">
        <option value="Thème">Thème</option>
        @foreach($themes as $theme)
            <option value="{{$theme->id}}">{{$theme->nom}}</option>
        @endforeach
    </select>

    <br/><br/>
    <select size="1" name="nomEditeur">
        <option value="Editeur">Editeur</option>
        @foreach($edits as $edit)
            <option value="{{$edit->id}}">{{$edit->nom}}</option>
        @endforeach
    </select>

    <br/><br/>
    <select size="1" name="nomMeca">
        <option value="Mécanique">Mécanique</option>
        @foreach($mecaniques as $meca)
            <option value="{{$meca->id}}">{{$meca->nom}}</option>
        @endforeach
    </select>

    <label><br/><br/>Univers <input type="text" name="univers" placeholder="Univers"></label>
    <label><br/><br/>URL média <input type="text" name="img"></label>
    <label><br/><br/>Règles <input type="text" name="regles" placeholder="Règles"></label>
    <label><br/><br/>Langue <input type="text" name="langue" placeholder="Langue"></label>
    <label><br/><br/>Nombre de joueurs <input type="number" name="nbjoueurs"></label>
    <label><br/><br/>Durée <input type="time" name="duree" placeholder="HHH:MM"></label>
    <br/><br/><input type="submit" value="Ajouter"/>
</form>

</body>
</html>
