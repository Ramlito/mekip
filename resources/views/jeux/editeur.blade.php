<html>
<head>
    <title>Liste des jeux</title>
</head>
<body>
<h2>La liste des jeux</h2>

<a href="http://127.0.0.1:8000/jeux">Retour à la normale</a>

@if(!empty($jeux))
    <ul>
        @foreach($jeux as $jeu)
            @if(($jeu->editeurs->nom)==$edit)
                <li>Nom du jeu : {{$jeu->nom}}, le thème : {{$jeu->theme->nom}}, la durée d'une partie : {{$jeu->duree}}, le nombre de joueurs : {{$jeu->nombre_joueurs}}
                    <a href="{{route('jeux.show',['id'=>$jeu->id])}}">détails</a></li>
            @endif
        @endforeach
    </ul>
@else
    <h3>aucune jeu</h3>
@endif

</body>
</html>
