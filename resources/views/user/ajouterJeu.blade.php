<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
</head>
<body>
<div><h1>Ajout d'un jeu</h1></div>
<form action="{{route('user.storeAchat',$jid)}}" method="post">
    {{ csrf_field() }}
    <label>Prix <input type="text" name="prix" placeholder="prix"/></label>
    <label>Date d'achat <input type="text" name="dateAchat" placeholder="date d'achat"/></label>
    <label>Lieu <input type="text" name="lieu" placeholder="lieu"/></label>
    <input type="submit" value="Ajouter"/>
</form>
</body>
</html>
