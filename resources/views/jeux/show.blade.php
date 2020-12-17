<h1>Détails :</h1>
<p>Nom : {{$jeu->nom}}</p>
@if(isset($jeu->url_media))
    <img src="{{url($jeu->url_media)}}" class="card-img-top" alt="avatar">
@endif
<p>Univers : {{$jeu->univers}}</p>
<a href="{{route('jeux.regle',['id'=>$jeu->id])}}"><p><h1>Règles : </h1></p></a>
<p>{{$jeu->regles}}</p>
<p>Langue : {{$jeu->langue}}</p>
<p>Nombre de joueurs : {{$jeu->nombre_joueurs}}</p>
<p>Durée : {{$jeu->duree}}</p>
<p>Mécaniques : </p>
<ul>
@foreach($jeu->mecaniques as $mecanique)
    <li>{{$mecanique->nom}}</li>
@endforeach
</ul>
<h1>Commentaires :</h1>
<br>
@foreach($coms as $com)
        <p><li> {{$com->user['last name']}}, date du commentaire : {{$com->date_com}}</li>
        commentaire : {{$com->commentaire}}</br>
        note : {{$com->note}}
            <br>
@endforeach
</ul>
{{--<x-carte-jeu :jeu="$jeu"></x-carte-jeu>--}}

