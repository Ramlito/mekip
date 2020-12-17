<html>
<head>
    <title>Liste des jeux</title>
</head>
<body>
<h2>La liste des jeux</h2>

<a href="http://127.0.0.1:8000/tri">Trier la liste</a>

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
