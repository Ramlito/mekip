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
@if($noteMin < 1.5)
    <h2 style="color: darkred">Note minimum : {{$noteMin}}</h2>
@elseif($noteMin < 3.5)
    <h2 style="color: gold">Note minimum : {{$noteMin}}</h2>
@else
    <h2 style="color: limegreen">Note minimum : {{$noteMin}}</h2>
@endif
@if($noteMax < 1.5)
    <h2 style="color: darkred">Note maximum : {{$noteMax}}</h2>
@elseif($noteMax < 3.5)
    <h2 style="color: gold">Note maximum : {{$noteMax}}</h2>
@else
    <h2 style="color: limegreen">Note maximum : {{$noteMax}}</h2>
@endif
@if($noteMoyenne < 1.5)
    <h2 style="color: darkred">Note moyen : {{$noteMoyenne }}</h2>
@elseif($noteMoyenne  < 3.5)
    <h2 style="color: gold">Note moyen : {{$noteMoyenne }}</h2>
@else
    <h2 style="color: limegreen">Note moyen : {{$noteMoyenne }}</h2>
@endif
<h2>Nombre de commentaires : {{$nbCommentaires}}</h2>
<h2>Nombre total de commentaires : {{$nbCommentairesTotal}}</h2>
</body>
</html>

