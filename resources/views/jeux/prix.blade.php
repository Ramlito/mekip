<html>
<head>
    <title>Statistiques du jeu {{$jeu->nom}}</title>
</head>
<body>
<h1>Nom du Jeu : {{$jeu->nom}}</h1>
<h2>Prix minimum : {{$min}}</h2>
<h2>Prix maximum : {{$max}}</h2>
<h2>Prix moyen : {{$moyenne}}</h2>
<h2>Nombre Joueurs connectés :{{$jeu -> nombre_joueurs}}</h2>
<h2>Nombre d'achats :{{$nbJoueurs}}</h2>
<br>
<h2>Note Moyenne : {{$noteMoyenne}}</h2>
<h2>Note maximale : {{$noteMax}}</h2>
<h2>Note minimale : {{$noteMin}}</h2>
<h2>Nombre de commentaires : {{$nbCommentaires}}</h2>
<h2>Nombre total de commentaires : {{$nbCommentairesTotal}}</h2>
</body>
</html>

