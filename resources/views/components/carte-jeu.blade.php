<div class="card" style="width: 18rem;">
    $meca = {{mecaniques}}
    <img src="https://i.pravatar.cc/150?u=fake@pravatar.com" class="card-img-top" alt="avatar">
    <div class="card-body">
        <img src={{photo}}>
        <h5 class="card-title">{{name}}</h5>
        <p>Éditeur : {{editeur}}</p>
        <p>Thème : {{theme}}</p>
        <ul>
            @foreach($meca as $mecanique){
                <li>{{$mecanique}}</li>
            }
        </ul>
    </div>
</div>
