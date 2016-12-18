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

    $sql = "INSERT INTO test (name, email) VALUE(?, ?)";

    $stmt = $pdo->prepare($sql);

    $name = 'Trinity';
    $email = 'c@c.com';

    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $email);

    $stmt->execute();
    /*$stmt->execute([
        'Tank',
        'b@b.com'
    ]);*/

    /*$stmt = $pdo->prepare($sql);
    $name = 'Trinity';
    $email = 'c@c.com';

    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();*/

    /*$stmt->execute([
        'name' => 'Morpheus',
        'email' => 'b@b.com'
    ]);*/

}catch(PDOException $e){
    echo $e->getMessage();
}