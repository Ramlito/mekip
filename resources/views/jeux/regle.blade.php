<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
</head>
<body>
<div><h1>{{$jeu->nom}}</h1></div>
<p>{{$jeu->regles}}</p>
<ul>
    <a href="{{route('jeux.show',['id'=>$jeu->id])}}"><li>Retour à la page du jeu</li></a>
    <a href="http://127.0.0.1:8000/jeux"><li>Retour à la page avec tous les jeux</li></a>
</ul>
</body>
</html>
