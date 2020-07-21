<?php

namespace App\Http\Controllers;

use MongoDB;
use Illuminate\Http\Request;
use MongoDB\Operation\FindOne;

class ProductController extends Controller
{
    public function Index(){
        $collection = (new MongoDB\Client)->WiiGames->Games;
        $gameCount = $collection->count();
        $pagina = request("pag") == 0 ? 1 : request("pag");
        $games = $collection->find([],["limit" => 600, "skip" => ($pagina-1)*600]);
        return view('Admin.games.index', ['games' => $games, 'gameCount' => $gameCount]);
    }

    public function GameStore(){
        $collection = (new MongoDB\Client)->WiiGames->Games;
        $gameCount = $collection->count();
        $pagina = request("pag") == 0 ? 1 : request("pag");
        $games = $collection->find([],["limit" => 600, "skip" => ($pagina-1)*600]);
        return view('Games.Index', ['games' => $games, 'gameCount' => $gameCount]);
    }

    public function Show($id){
        $collection = (new MongoDB\Client)->WiiGames->Games;
        $game = $collection->findOne(["_id" => new MongoDB\BSON\ObjectID($id)]);
        return view('Admin.games.details', ['game' => $game]);
    }

    public function Delete($id){
        $collection = (new MongoDB\Client)->WiiGames->Games;
        $game = $collection->findOne(["_id" => new MongoDB\BSON\ObjectID($id)]);
        return view('Admin.games.delete', ['game' => $game]);
    }

    public function Remove(){
        $collection = (new MongoDB\Client)->WiiGames->Games;
        $deleteOneResult = $collection->deleteOne(
            ["_id" => new \MongoDB\BSON\ObjectId(request('gameid'))]
        );
        // if ($deleteOneResult->getDeletedCount() == 1)
        //     return redirect(route('GameRemoved'))->with('mssg', "Game deleted successfully")->with("alerttype", "danger");
        // else
        //     return redirect(route('GameRemoved'))->with('mssg', "Game was not deleted. Try again later.")->with("alerttype", "warning");
        return redirect('/admin/games');
    }

    public function Create(){
        $collection = (new MongoDB\Client)->WiiGames->Games;
        $game = $collection->find();
        $collectiondev = (new MongoDB\Client)->WiiGames->Developer;
        $developers = $collectiondev->find();
        $collectionpub = (new MongoDB\Client)->WiiGames->Publisher;
        $publishers = $collectionpub->find();
        $collectiongen = (new MongoDB\Client)->WiiGames->Genre;
        $genres = $collectiongen->find();
        $collectioncode = (new MongoDB\Client)->WiiGames->idCode;
        $Idcode = $collectioncode->find();
        return view('Admin.Games.create', ['game'=>$game,'idcode'=>$Idcode,'developers' => $developers, 'publishers' => $publishers, 'genres' => $genres]);
    }

        //to store/edit/delete
        // "name of column" => request("id in blade.php")

    public function Store(){
        $game = [
            "game_name" => request("game_name"),
            "idCode" => request("idCode"),
            "developer" => request("developer"),
            "publisher" => request("publisher"),
            "genre" => request("genre"),
            "rating_type" => request("rating_type"),
            "rating_value" => request("rating_value"),
            "synopsis" => request("synopsis"),
        ];
        $collection = (new MongoDB\Client)->WiiGames->Games;
        $insertOneResult = $collection->insertOne($game);
        return redirect("/admin/games");
    }

    public function Edit($id){
        $collection = (new MongoDB\Client)->WiiGames->Games;
        $game = $collection->findOne(["_id" => new MongoDB\BSON\ObjectID($id)]);
        $collectiondev = (new MongoDB\Client)->WiiGames->Developer;
        $developers = $collectiondev->find();
        $collectionpub = (new MongoDB\Client)->WiiGames->Publisher;
        $publishers = $collectionpub->find();
        $collectiongen = (new MongoDB\Client)->WiiGames->Genre;
        $genres = $collectiongen->find();
        $collectioncode = (new MongoDB\Client)->WiiGames->idCode;
        $Idcode = $collectioncode->find();
        return view('Admin.games.edit', ['game'=> $game,'idcode' => $Idcode,'developers' => $developers, 'publishers' => $publishers, 'genres' => $genres]);
    }

    public function Update(){
        $collection = (new MongoDB\Client)->WiiGames->Games;
        $game = [
            "game_name" => request("game_name"),
            "idCode" => request("idcode"),
            "developer" => request("developer"),
            "publisher" => request("publisher"),
            "rating_type" => request("rating_type"),
            "rating_value" => request("rating_value"),
            "synopsis" => request("synopsis"),
        ];
        $updateOneResult = $collection->updateOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("gameid"))
        ],[
            '$set' => $game
        ]);
        // if ($updateOneResult->getModifiedCount() == 1)
        //     return redirect(route('GameUpdated'))->with('mssg', "Game updated")->with("alerttype", "success");
        // else
        //     return redirect(route('GameUpdated'))->with('mssg', "Update unsuccesful. Try again later.")->with("alerttype", "warning");
        return redirect('/admin/games/'.request("gameid"));
    }

    public function Details($id){
        $collection = (new MongoDB\Client)->WiiGames->Games;
        $game = $collection->findOne(["_id" => new MongoDB\BSON\ObjectID($id)]);
        return view('Games.Details', ["game"=> $game]);
    }
}
