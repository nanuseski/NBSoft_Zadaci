<?php

function korisniciUPrethodnaDvaDana(){

    global $connection;

    $today = date('Y-m-d');
    $yesterday = date('Y-m-d',strtotime("-1 days"));

    $query = "SELECT * FROM user WHERE dateCreated BETWEEN '$yesterday' AND '$today'";
    $result = $connection->query($query);
    return $result->fetchAll();
}


function vrednostPorudzbina(){

    global $connection;

    //ukupna vrednost svih porudzbina po korisniku
    //$query =  $query = "SELECT firstname, lastname, o.id as oid, SUM(oi.value) as sum from user u INNER JOIN orders o on u.id = o.userId INNER JOIN orderitem oi on o.id=oi.orderId group by u.id ";

    $query =  $query = "SELECT firstname, lastname, o.id as oid, SUM(oi.value) as sum from user u INNER JOIN orders o on u.id = o.userId INNER JOIN orderitem oi on o.id=oi.orderId group by o.id ";
    $result = $connection->query($query);
    return $result->fetchAll();
}

function baremDvePorudzbine(){
    global $connection;

    $query =  $query = "SELECT firstname, lastname, COUNT(o.id) as brPorudzbina FROM user u INNER JOIN orders o on u.id = o.userId GROUP BY u.id HAVING COUNT(o.id) >=2";
    $result = $connection->query($query);
    return $result->fetchAll();

}

function idPorudzbineIStavke(){
    global $connection;

    $query =  $query = "SELECT firstname, lastname, o.id as brPorudzbine, count(oi.productId) as brStavki FROM user u INNER JOIN orders o ON u.id = o.userId INNER JOIN orderitem oi ON o.id = oi.orderId GROUP BY o.id";
    $result = $connection->query($query);
    return $result->fetchAll();

}

function baremDveStavke(){
    global $connection;

    //$query =  $query = "SELECT firstname, lastname, o.id as brPorudzbine FROM user u INNER JOIN orders o on u.id = o.userId INNER JOIN orderitem oi ON o.id = oi.orderId GROUP BY o.id HAVING COUNT(DISTINCT oi.productId) >=2 ";
    $query =  $query = "SELECT firstname, lastname, o.id as brPorudzbine FROM user u INNER JOIN orders o on u.id = o.userId INNER JOIN orderitem oi ON o.id = oi.orderId GROUP BY o.id HAVING COUNT(oi.productId) >=2 ";
    $result = $connection->query($query);
    return $result->fetchAll();

}

function najmanjeTriUSvim(){
    global $connection;

    $query =  $query = "SELECT DISTINCT firstname, lastname FROM user u INNER JOIN orders o on u.id = o.userId WHERE u.id NOT IN (SELECT u.id FROM orderitem oi INNER JOIN orders o on oi.orderId = o.id RIGHT JOIN user u ON o.userId = u.id GROUP BY orderId HAVING (COUNT(productId) NOT LIKE COUNT(DISTINCT productId)) OR COUNT(DISTINCT productId)<3) ";
    $result = $connection->query($query);
    return $result->fetchAll();

}

//kao i najmanjeTriUSvim samo sa izdvojenim subquery-em da bi se smanjilo ponavljanje subquery-a
function najmanjeTriUSvimParam(){
    global $connection;

    $subquery = "SELECT u.id as uid FROM orderitem oi INNER JOIN orders o on oi.orderId = o.id RIGHT JOIN user u ON o.userId = u.id GROUP BY orderId HAVING (COUNT(productId) NOT LIKE COUNT(DISTINCT productId)) OR COUNT(DISTINCT productId)<3";
    $result = $connection->query($subquery);
    $subqueryData = $result->fetchAll(PDO::FETCH_COLUMN, 0);
    //var_dump($subqueryData); - ko sve ima razlicite
    $query =  $query = "SELECT DISTINCT firstname, lastname FROM user u INNER JOIN orders o on u.id = o.userId WHERE u.id NOT IN (".implode(",", $subqueryData).")";
    $result = $connection->query($query);
    return $result->fetchAll();

}
//SELECT DISTINCT firstname, lastname FROM user u INNER JOIN orders o on u.id = o.userId WHERE u.id NOT IN (SELECT orderId FROM orderitem  GROUP BY orderId HAVING (COUNT(productId) NOT LIKE COUNT(DISTINCT productId)) OR COUNT(DISTINCT productId)<3)