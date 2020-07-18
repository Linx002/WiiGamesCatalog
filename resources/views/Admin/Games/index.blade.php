@extends('layouts.app')

@section ('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Games - Administrator Resources</h1>
            <a href="/admin/games/create" class="text-right">Add New Game</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Game Title</th>
                        <th scope="col">Synopsis</th>
                        <th scope="col">Rating Type</th>
                        <th scope="col">Rating Value</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($games as $game)
                    <tr>
                       <th scope="row">{{$loop->index+1}}</th>
                        <td>{{$game->game_name}}</td>
                        <td>{{$game->synopsis}}</td>
                        <td>{{$game->rating_type."=>".$game->rating_value}}</td>
                        <td>
                            <a href="/admin/games/{{$game->_id}}">Details</a> |
                            <a href="/admin/games/edit/{{$game->_id}}">Edit</a> |
                            <a href="/admin/games/delete/{{$game->_id}}">Delete</a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

            <div class="col-md-12 text-center">
                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="mx-auto btn-group mr-2" role="group" aria-label="First group">
                        @php
                        $pagactual = request('pag') == 0 ? 1 : request('pag');
                        @endphp
                        <a href="/admin/games?pag={{$pagactual-1}}" class="btn btn-secondary {{ $pagactual == 1 ? 'disabled' : ''}}">&lt</a>
                        @for ($i = 1; $i <= ceil($gameCount/600);$i++)
                        <a href="/admin/games?pag={{$i}}"class="btn btn-secondary {{ $pagactual == $i ? 'disabled' : ''}}">{{$i}}</a>
                        @endfor
                        <a href="/admin/games?pag={{$pagactual+1}}" class="btn btn-secondary {{ $pagactual == ceil($gameCount/600) ? 'disabled' : ''}}">&gt</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
