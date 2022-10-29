<?php
//path
//define("ABSOLUTE_PATH", $_SERVER["DOCUMENT_ROOT"]."");
define("ENV_FILE", "C:\\xampp\htdocs\NBSoft\Zadatak5/config/.env");
//files
//u njemu cuvam podatke za bazu

//database data
define("SERVER", env("SERVER"));
define("DBNAME", env("DBNAME"));
define("USERNAME", env("USERNAME"));
define("PASSWORD", env("PASSWORD"));

//functions
function env($naziv){

    $data = file(ENV_FILE);
    $value = "";

    foreach($data as $row){
        $configuration = explode("=", $row);

        if($configuration[0]==$naziv){
            $value = trim($configuration[1]);
        }
    }
    return $value;
}