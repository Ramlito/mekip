<h1>{{$jeu->nom}}</h1>
@if(isset($jeu->url_media))
    <img src="{{url($jeu->url_media)}}" class="card-img-top" alt="avatar">
@endif
<p>Univers : {{$jeu->univers}}</p>
<a href="{{route('jeux.regle',['id'=>$jeu->id])}}"><p>Règles : </p></a>
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
{{--<x-carte-jeu :jeu="$jeu"></x-carte-jeu>--}}

