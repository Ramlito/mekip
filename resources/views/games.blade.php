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
            <label><br/><br/>Description <input type="text" name="description" placeholder="Description du jeu"/></label>
            <label><br/><br/>Thème <input type="text" name="theme" placeholder="Thème"/></label>
            <label><br/><br/>Editeur <input type="text" name="editeur" placeholder="Editeur"/></label>
            <label><br/><br/>Mécanique <input type="text" name="mecanique" placeholder="Mécanique"></label>
            <label><br/><br/>Univers <input type="text" name="univers" placeholder="Univers"></label>
            <label><br/><br/>Photo <input type="file" name="img"></label>
            <label><br/><br/>Règles <input type="text" name="regles" placeholder="Règles"></label>
            <label><br/><br/>Langue <input type="text" name="langue" placeholder="Langue"></label>
            <label><br/><br/>Nombre de joueurs <input type="number" name="nbjoueurs"></label>
            <label><br/><br/>Durée <input type="time" name="duree" placeholder="HHH:MM"></label>
            <br/><br/><input type="submit" value="Ajouter"/>
        </form>
    </body>
</html>
