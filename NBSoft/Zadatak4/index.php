<?php

$path = __DIR__;
require_once "models/functions.php";

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>

        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>

<!-
Zadatak 4: PHP
Napisati php funkciju koja skenira zadati folder kao ulazni argument f-je i sve podfoldere i fajlove koji se nalaze u tom folderu, a potom i prikaze njihov sadrzaj na ekranu.

Primer foldera:

/folder1
/folder2
/folder2/folder21
/folder2/folder22
/folder2/slika.jpg
/folder3
/folder4
/file.txt

Opcije:
* potrebno je podesiti da klikom na file, da se otvari izabrani fajl u novom prozoru
* kada se klikne na folder, sistem treba da skenira sve sto ima u izabranom folderu

->
        <div class="container pt-5">

            <ol> <?php getMainDirectoryItems($path); ?> </ol>
        </div>

        <script src="assets/js/main.js"></script>
    </body>
</html>