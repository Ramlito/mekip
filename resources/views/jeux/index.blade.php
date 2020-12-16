<html>
<head>
    <title>Liste des jeux</title>
</head>
<body>
<h2>La liste des jeux</h2>

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
