@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Products</h1>
            <form action="/admin/games/edit" method="POST">
            @csrf
                <input type="hidden" name="gameid" id="gameid" value="{{$game ->_id}}">
                <div class="form-group">
                    <label for="game_name">Game Name</label>
                    <input class="form-control" type="text" name="game_name" id="game_name" value="{{$game ->game_name}}">
                </div>
                <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="developer">Developer</label>
                    <select name="developer" id="developer" class="form-control">
                        <option value="0" class="value" disabled>Select a developer...</option>
                        @foreach($developers as $developer)
                        <option value="{{$developer->developer}}" {{$developer->developer == $game->developer ? 'selected' : '' }}>{{$developer->developer}}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="publisher">Publisher</label>
                        <select name="publisher" id="publisher" class="form-control">
                            <option value="0" class="value" disabled>Select a publisher...</option>
                            @foreach($publishers as $publisher)
                            <option value="{{$publisher->publisher}}" {{$publisher->publisher == $game->publisher ? 'selected' : '' }}>{{$publisher->publisher}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="idCode">Id Code</label>
                        <input class="form-control" type="text" name="idCode" id="idCode" value="{{$game ->idCode}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="synopsis">Synopsis</label>
                    <textarea name="synopsis" id="synopsis" cols="30" rows="10" class="form-control">{{$game ->synopsis}}</textarea>
                </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                        <label for="rating_type">Genre</label>
                        <select name="genre" id="genre" class="form-control">
                        <option value="0" class="value" disabled>Select a genre...</option>
                        @foreach($genres as $genre)
                        <option value="{{$genre->genre}}">{{$genre->genre}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="rating_type">Rating Type</label>
                        <select class="form-control" name="rating_type" id="rating_type">
                            <option value="0" class="value" disabled>Select a rating type</option>
                            <option value="ESRB" {{$game->rating_type == "ESRB" ? 'selected' : '' }}>ESRB</option>
                            <option value="CERO" {{$game->rating_type == "CERO" ? 'selected' : '' }}>CERO</option>
                            <option value="PEGI" {{$game->rating_type == "PEGI" ? 'selected' : '' }}>PEGI</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="rating_value">Rating Value</label>
                        <select class="form-control" name="rating_value" id="rating_value" value="{{$game ->rating_value}}">
                            <option value="0" class="value">Select a rating value</option>
                             <!-- ESRB -->
                            <option value="0" class="value" disabled>ESRB</option>
                            <option value="EC" {{$game->rating_value == "EC" ? 'selected' : '' }}>EC</option>
                            <option value="E" {{$game->rating_value == "E" ? 'selected' : '' }}>E</option>
                            <option value="E10+" {{$game->rating_value == "E10+" ? 'selected' : '' }}>E10+</option>
                            <option value="T" {{$game->rating_value == "T" ? 'selected' : '' }}>T</option>
                            <option value="M" {{$game->rating_value == "M" ? 'selected' : '' }}>M</option>
                            <option value="R" {{$game->rating_value == "R" ? 'selected' : '' }}>R</option>
                            <!-- CERO -->
                            <option value="0" class="value" disabled>CERO</option>
                            <option value="A" {{$game->rating_value == "A" ? 'selected' : '' }}>A</option>
                            <option value="B" {{$game->rating_value == "B" ? 'selected' : '' }}>B</option>
                            <option value="C" {{$game->rating_value == "C" ? 'selected' : '' }}>C</option>
                            <option value="D" {{$game->rating_value == "D" ? 'selected' : '' }}>D</option>
                            <option value="Z" {{$game->rating_value == "Z" ? 'selected' : '' }}>Z</option>
                            <!-- PEGI -->
                            <option value="0" class="value" disabled>PEGI</option>
                            <option value="3" {{$game->rating_value == "3" ? 'selected' : '' }}>3</option>
                            <option value="7" {{$game->rating_value == "7" ? 'selected' : '' }}>7</option>
                            <option value="12" {{$game->rating_value == "12" ? 'selected' : '' }}>12</option>
                            <option value="16" {{$game->rating_value == "16" ? 'selected' : '' }}>16</option>
                            <option value="18" {{$game->rating_value == "18" ? 'selected' : '' }}>18</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
                <button type="submit" class="btn btn-default">Go to Details</button>
            </form>
        </div>
    </div>
</div>
@endsection
