@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Game Details</h1>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{$game->game_name}}</h5>
                        <p class="card-text"><b>Synopsis: </b>{{$game->synopsis}}</p>
                    </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Id Code: </b>{{$game->idCode}}</li>
                    <li class="list-group-item"><b>Publisher: </b>{{$game->publisher}}</li>
                    <li class="list-group-item"><b>Developer: </b>{{$game->developer}}</li>
                    <li class="list-group-item"><b>Rating: </b>{{$game->rating_type." => ".$game->rating_value}}</li>
                </ul>
                <div class="card-body">
                    <a href="/admin/games/edit/{{$game->_id}}" class="card-link">Edit</a>
                    <a href="/admin/games/delete/{{$game->_id}}" class="card-link">Delete</a>
                    <a href="/admin/games/" class="card-link">Back to Catalog</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
