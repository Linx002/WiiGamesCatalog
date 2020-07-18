<?php


$collection = (new MongoDB\Client)->WiiGames->Games;

// $cursor = $collection->find([], ['limit'=>10]);

// foreach ($cursor as $document) {
//    echo '<br />';
//    print_r($document);
//    echo '<br />';
// }

//Create Function
//(new MongoDB\Client).FiveDStore.Categories;

// use PhpParser\Node\Expr\Cast\Object_;

// $collection = (new MongoDB\Client)->FiveDStore->Categories;

// $insertResult = $collection->insertOne([
//     'category' => 'Cellphones',
//     'description' => 'Smartphones for on the go use',
// ]);

// printf('Inserted %d document(s) \n', $insertResult->getInsertedCount());
// var_dump($insertResult->getInsertedId());


// //read Function

echo '<br />';
$table = $collection->find();

foreach($table as $record){
    //var_dump($record),
    //printf($record);
    echo 'ID:'.$record["_id"].'<br />';
    echo "game_name:".$record['game_name'].'<br />';
  //  echo "rating_value:".$record["rating/@_value"].'<br />';
    echo '<br />';
    echo '<br />';
}
