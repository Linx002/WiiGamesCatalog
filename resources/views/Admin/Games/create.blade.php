@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Add New Game</h1>
            <form action="/admin/games/create" method="POST">
                @csrf
                <div class="form-group">
                    <label for="game_name">Game Name</label>
                    <input class="form-control" type="text" name="game_name" id="game_name">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="developer">Developer</label>
                        <select name="developer" id="developer" class="form-control">
                            <option value="0" class="value" disabled>Select a developer...</option>
                            @foreach($developers as $developer)
                            <option value="{{$developer->developer}}">{{$developer->developer}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="publisher">Publisher</label>
                        <select name="publisher" id="publisher" class="form-control">
                            <option value="0" class="value" disabled>Select a publisher...</option>
                            @foreach($publishers as $publisher)
                            <option value="{{$publisher->publisher}}">{{$publisher->publisher}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="idcode">Id Code</label>
                        <input class="form-control" type="text" name="idcode" id="idcode">
                    </div>
                </div>
                <div class="form-group">
                    <label for="synopsis">Synopsis</label>
                    <textarea name="synopsis" id="synopsis" cols="30" rows="10" class="form-control"></textarea>
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
                            <option value="ESRB">ESRB</option>
                            <option value="CERO">CERO</option>
                            <option value="PEGI">PEGI</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="rating_type">Rating Value</label>
                        <select class="form-control" name="rating_value" id="rating_value">
                            <option value="0" class="value">Select a rating value</option>
                            <!-- ESRB -->
                            <option value="0" class="value" disabled>ESRB</option>
                            <option value="EC">EC</option>
                            <option value="E">E</option>
                            <option value="E10+">E10+</option>
                            <option value="T">T</option>
                            <option value="M">M</option>
                            <option value="R">R</option>
                            <!-- CERO -->
                            <option value="0" class="value" disabled>CERO</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="Z">Z</option>
                            <!-- PEGI -->
                            <option value="0" class="value" disabled>PEGI</option>
                            <option value="3">3</option>
                            <option value="7">7</option>
                            <option value="12">12</option>
                            <option value="16">16</option>
                            <option value="18">18</option>
                        </select>
                    </div>
                </div>
                <script>
                function goBack() {
                    window.history.back();
                }
                </script>
                <button onClick="goBack()" class="btn btn-default">Back to Catalog</a>
                    <button type="submit" class="btn btn-success">Create</button>
            </form>
        </div>
    </div>
</div>
@endsection
