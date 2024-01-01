<?php

if($_SERVER['REQUEST_METHOD']=='GET'){

    $id=$_GET['id'];

include('connection.php');

$connection = new Connection();
$connection->selectDatabase('project');

include('client.php');

Client::deleteClient('Clients',$connection->conn,$id);




}
?>
