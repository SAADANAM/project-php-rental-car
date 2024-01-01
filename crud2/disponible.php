<?php

if($_SERVER['REQUEST_METHOD']=='GET'){

    $id=$_GET['id'];
    $id2=$_GET['id2'];
include('connection.php');

$connection = new Connection();
$connection->selectDatabase('project');

include('voiture.php');

voiture::liberervoiture('voiture',$connection->conn,$id);
include('resevation.php');
reservation::deletereservation(reservation,$connection->conn,$id2);




}
?>