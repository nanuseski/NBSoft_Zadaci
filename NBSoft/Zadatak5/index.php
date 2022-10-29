<?php

//ako zaboravim da promenim -> The name 'Order' is a MySQL reserved keyword. pa mi ne dozvoljlava da radim sa tim, a svakako radim ugl sa tabelama u mnozini
// vrednosti za datume su mi date
require "config/connection.php";
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
Zadatak 5: SQL

Data je relaciona šema:

User(id, firstname, lastname, phone, email, dateCreate, dateEdit)
Order(id, userId, value, dateCreate, dateEdit)
OrderItem(id, orderId, value, productId)
Product(id, name, price)

->
<div class="container pt-5">

    <div>
        <h1>Prva grupa zadataka:</h1>

        <div>
            <h2>a) Prikažite sve kororisnike koji su se prijavili u prethodna dva dana:</h2>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Datum kreiranja naloga</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $korisniciUPrethodnaDvaDana = korisniciUPrethodnaDvaDana();

                if (empty($korisniciUPrethodnaDvaDana)) { ?>
                    <tr><td>Nema takvog korisnika.</td></tr>
                    <?php
                }
                else
                    foreach($korisniciUPrethodnaDvaDana as $user){?>
                        <tr><?= "<td>".$user->firstname."</td><td>".$user->lastname."</td><td>".$user->datecreated."</td>"?></tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div>
            <h2> b) Prikažite ime I prezime korisnika, id porudžbine I ukupnu vrednost svih porudžbina</h2>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>ID porudzbine</th>
                    <th>Ukupna vrednost</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $vrednostPorudzbina = vrednostPorudzbina();

                if (empty($vrednostPorudzbina)) { ?>
                    <tr><td>Nema takvog korisnika.</td></tr>
                    <?php
                }
                else
                    foreach($vrednostPorudzbina as $user){ ?>
                        <tr><?= "<td>".$user->firstname."</td><td>".$user->lastname."</td><td>".$user->oid."</td><td>".$user->sum."</td>"?></tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>

    <div>
        <h1>Druga grupa zadataka:</h1>

        <div>
            <h2>c) Prikažite sve korisnike koji su imali najmanje dve porudžbine</h2>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Broj porudzbina</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $baremDvePorudzbine = baremDvePorudzbine();

                if (empty($baremDvePorudzbine)) { ?>
                    <tr><td>Nema takvog korisnika.</td></tr>
                    <?php
                }
                else
                    foreach($baremDvePorudzbine as $user){ ?>
                        <tr><?= "<td>".$user->firstname."</td><td>".$user->lastname."</td><td>".$user->brPorudzbina."</td>"?></tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div>
            <h2>d) Prikažite ime I prezime korisnika, id porudžbine I broj stavki za svaku porudžbinu</h2>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>ID porudzbina</th>
                    <th>Broj stavki</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $idPorudzbineIStavke = idPorudzbineIStavke();

                if (empty($idPorudzbineIStavke)) { ?>
                    <tr><td>Nema takvog korisnika.</td></tr>
                    <?php
                }
                else
                    foreach($idPorudzbineIStavke as $user){ ?>
                        <tr><?= "<td>".$user->firstname."</td><td>".$user->lastname."</td><td>".$user->brPorudzbine."</td><td>".$user->brStavki."</td>"?></tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div>
            <h2>e) Prikažite ime I prezime korisnika, id porudžbine koja ima najmanje dve stavke</h2>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>ID porudzbine</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $baremDveStavke = baremDveStavke();

                if (empty($baremDveStavke)) { ?>
                    <tr><td>Nema takvog korisnika.</td></tr>
                    <?php
                }
                else
                    foreach($baremDveStavke as $user){ ?>
                        <tr><?= "<td>".$user->firstname."</td><td>".$user->lastname."</td><td>".$user->brPorudzbine."</td>"?></tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div>

            <h2>f) Prikažite sve korisnike koji su kupili najmanje tri različita proizvoda u svim porudžbinama</h2>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Ime</th>
                    <th>Prezime</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $najmanjeTriUSvim = najmanjeTriUSvimParam();

                if (empty($najmanjeTriUSvim)) { ?>
                    <tr><td>Nema takvog korisnika.</td></tr>
                    <?php
                }
                else
                    foreach($najmanjeTriUSvim as $user){ ?>
                        <tr><?= "<td>".$user->firstname."</td><td>".$user->lastname."</td>"?></tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
</body>
</html>