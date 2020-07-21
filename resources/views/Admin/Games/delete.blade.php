@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Delete Game</h1>
            <form action="/admin/games/delete" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="gameid" id="gameid" value="{{$game ->_id}}">
                <div class="form-group">
                    <label for="game_name">Game Name</label>
                    <input class="form-control" type="text" name="game_name" id="game_name" value="{{$game ->game_name}}" disabled>
                </div>
                <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="developer">Developer</label>
                    <select name="developer" id="developer" class="form-control" disabled>
                        <option value="{{$game->developer}}">{{$game->developer}}</option>
                    </select>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="publisher">Publisher</label>
                        <select name="publisher" id="publisher" class="form-control" disabled>
                            <option value="{{$game->publisher}}" >{{$game->publisher}}</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="idCode">Id Code</label>
                        <input class="form-control" type="text" name="idCode" id="idCode" value="{{$game ->idCode}}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="synopsis">Synopsis</label>
                    <textarea name="description" id="synopsis" cols="30" rows="10" class="form-control" disabled>{{$game->synopsis}}</textarea>
                </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                        <label for="rating_type">Genre</label>
                        <select name="genre" id="genre" class="form-control" disabled>
                        <option value="{{$game->genre}}" >{{$game->genre}}</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="rating_type">Rating Type</label>
                        <select class="form-control" name="rating_type" id="rating_type" disabled>
                            <option value="{{$game->rating_type}}" class="value">{{$game->rating_type}}</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="rating_type">Rating Value</label>
                        <select class="form-control" name="rating_value" id="rating_value" disabled>
                            <option value="{{$game->rating_value}}" class="value">{{$game->rating_value}}</option>
                        </select>
                    </div>
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection


