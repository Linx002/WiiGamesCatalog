@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Games Catalog</h1>
                <div class="row">
                @foreach ($games as $game)
                    <div class="card col-md-3">
                            <th scope="row">{{$loop->index+1}}</th>
                            <div class="card-body">
                            <h5 class="card-title">{{$game -> game_name}}</h5>
                            <p class="card-text">{{$game -> rating_type." => ".$game -> rating_value}}</p>
                            <a href="/games/{{$game->_id}}" class="btn btn-primary">View Game Details</a>
                        </div>
                    </div>
                @endforeach
                <div class="col-md-12 text-center">
                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="mx-auto btn-group mr-2" role="group" aria-label="First group">
                        @php
                           $pagactual = request('pag') == 0 ? 1 : request('pag');
                        @endphp
                          <a href="/games?pag={{$pagactual-1}}" class="btn btn-secondary {{ $pagactual == 1 ? 'disabled' : ''}}">&lt</a>
                          @for ($i = 1; $i <= ceil($gameCount/600);$i++)
                          <a href="/games?pag={{$i}}" class="btn btn-secondary {{ $pagactual == $i ? 'disabled' : ''}}">{{$i}}</a>
                          @endfor
                          <a href="/games?pag={{$pagactual+1}}" class="btn btn-secondary {{ $pagactual == ceil($gameCount/600) ? 'disabled' : ''}}">&gt</a>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
