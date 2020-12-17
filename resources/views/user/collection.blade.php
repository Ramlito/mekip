<html>
<head>
    <title>Collection</title>
</head>
<body>
<h2>Collection</h2>

@if(!empty($collection))
    <ul>
        @foreach($collection as $jeu)
            <li>Nom du jeu : {{$jeu->nom}}, le thème : {{$jeu->theme->nom}}, la durée d'une partie : {{$jeu->duree}}, le nombre de joueurs : {{$jeu->nombre_joueurs}}
                <a href="{{route('jeux.show',['id'=>$jeu->id])}}">détails</a></li>
        @endforeach
    </ul>
    @if(auth()->check())
        <a href="{{route('user.suppression',$jeu->id)}}">supprimer</a>
    @endif
@else
    <h3>aucun jeu</h3>
@endif

</body>
</html>
