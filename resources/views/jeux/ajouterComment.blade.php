<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
</head>
<body>
<div><h1>Ajout d'un jeu</h1></div>
<form action="{{route('jeux.storeComment',$jid)}}" method="post">
    {{ csrf_field() }}
    <label>Note <input type="range" name="note" min="0" max="5" step="0.5"/></label>
    <label>Commentaire <input type="text" name="commentaire" placeholder="commentaire"/></label>
    <input type="submit" value="Ajouter"/>
</form>
</body>
</html>
