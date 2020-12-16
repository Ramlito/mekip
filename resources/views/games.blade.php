<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <div><h1>Ajout d'un jeu</h1></div>
        <form action="{{route('games.store')}}" method="post">
            {{ csrf_field() }}
            <label>Nom du jeu <input type="text" name="nom" placeholder="Nom du jeu"/></label>
            <label>Description <input type="text" name="description" placeholder="Description du jeu"/></label>
            <label>Thème <input type="text" name="theme" placeholder="Thème"/></label>
            <label>Editeur <input type="text" name="editeur" placeholder="Editeur"/></label>
            <input type="submit" value="Ajouter"/>
        </form>
    </body>
</html>
