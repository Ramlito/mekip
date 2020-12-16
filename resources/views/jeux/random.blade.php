<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
</head>
<body>
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
