<html>
<head>
    <title>Prix du jeu</title>
</head>
<body>
<h1>Nom du Jeu : {{$jeu->nom}}</h1>
@foreach($jeu->acheteurs as $element)
<h2>{{$element -> achat -> prix}}</h2>
@endforeach
<h3>Prix minimum : {{$min}}</h3>
<h3>Prix maximum : {{$max}}</h3>
<h3>Prix moyen : {{$moyenne}}</h3>
<h2>Nombre Joueurs connectés :{{$jeu -> nombre_joueurs}}</h2>
<h2>Nombre d'achats :{{$nbJoueurs}}</h2>
</body>
</html>

