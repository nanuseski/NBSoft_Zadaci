<?php

require_once "config.php";


try {
    $connection = new PDO("mysql:host=".SERVER.";dbname=".DBNAME.";charset=utf8", USERNAME, PASSWORD);
    $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //date_default_timezone_set('Europe/Belgrade');
}
catch(PDOException $ex){
    echo $ex->getMessage();
}

function executeQuery($query){
    global $connection;
    return $connection->query($query)->fetchAll();
}

