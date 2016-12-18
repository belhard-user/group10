<?php

require "vendor/autoload.php";


class Peoples
{

    public function getEmail()
    {
        return strtoupper($this->email);
    }
}


try {
     $pdo = new PDO('mysql:dbname=smart;host=localhost', 'root', '', [
         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
         PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
     ]);

     // $sql = "DELETE FROM test WHERE id IN (1, 3, 5)";
     // $result = $pdo->exec($sql);

    $result = $pdo->query('SELECT * FROM test');

    foreach ($result->fetchAll() as $item){
        echo $item->email . '<hr>';
    }

     /*while($item = $result->fetch(PDO::FETCH_OBJ)){
         dump($item);
     }*/

}catch(PDOException $e){
    echo $e->getMessage();
}