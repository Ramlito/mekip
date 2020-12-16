<div class="card" style="width: 18rem;">
    @if(isset($jeu->url_media))
    <img src="{{url($jeu->url_media)}}" class="card-img-top" alt="avatar">
    @endif
    <div class="card-body">
        <img src={{$jeu->photo}}>
        <h5 class="card-title">{{$jeu->nom}}</h5>
        <p>Éditeur : {{$jeu->editeur->nom}}</p>
        <p>Thème : {{$jeu->theme->nom}}</p>
        <ul>
            @foreach($jeu->mecaniques as $mecanique)
                <li>{{$mecanique->nom}}</li>
            @endforeach
        </ul>
    </div>
</div>
