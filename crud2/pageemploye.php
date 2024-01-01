<?php
session_start();
include('voiture.php');
include('client.php');
//include connection file
include('connection.php');
include('employe.php');
   

//create in instance of class Connection
$connection = new Connection();


//call the selectDatabase method
$connection->selectDatabase('project'); 

 //include the client file
 include('resevation.php');

 
  //call the static selectAllClients method and store the result of the method in $clients
  $reservations= reservation::selectAllreservation('reservation',$connection->conn);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
      body {
        background-image: url('https://static.pexels.com/photos/414171/pexels-photo-414171.jpeg');
        background-size: cover;
      }
      <style>
body {
  height: 100vh;
   background: linear-gradient(90deg,#e52e71,#ff8a00);

}


    </style>

</head>
<body>

<div class="container my-5">
    <h2>List of reservations</h2>
    

    <br>
    <br>

    <table class="table">
       <thead>
        <tr>
            <th>ID</th>
            <th>client</th>
            <th>voiture</th>
            <th>date_res</th>
            <th>duree</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        <?php

       

       
     
        foreach($reservations as $row) {
            
            $voiture = voiture::selectvoitureById('voiture',$connection->conn,$row['idvoiture']);
            $client = Client::selectClientById('clients',$connection->conn,$row['idclient']);
           echo " <tr>
            <td>$row[id]</td>
            <td>$client[firstname]</td>
            <td>$voiture[model]</td>
            <td>$row[date_res]</td>
            <td>$row[duree]</td>
            <td>
           
            
            <a class ='btn btn-success btn-sm' href='disponible.php?id=$row[idvoiture]?id2=$row[id]'>disponible</a>
            <a class ='btn btn-danger btn-sm' href='disponible.php?id2=$row[id]'>delete</a>
            
            
            </td>
            
        </tr>";

        }
        
        ?>
        </tbody>
        
    </table>
    </div>

</body>
</html>
