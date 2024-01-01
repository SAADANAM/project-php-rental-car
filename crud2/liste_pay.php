<?php
include('voiture.php');
include('client.php');
//include connection file
include('connection.php');
include('employe.php');
include('paiement.php');



   

//create in instance of class Connection
$connection = new Connection();


//call the selectDatabase method
$connection->selectDatabase('project'); 

 //include the client file
// include('reservation.php');

 
  //call the static selectAllClients method and store the result of the method in $clients
  $paiement= paiement::selectAllpaiement('paiement',$connection->conn);



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
    <h2>List of payements</h2>
    

    <br>
    <br>

    <table class="table">
       <thead>
        <tr>
            <th>ID payement</th>
            <th>client</th>
          
            <th>date of payement</th>
            <th>montant</th>
           
        </tr>
        </thead>
        <tbody>

        <?php

       
       
       
     
        foreach($paiement as $row) {
            
           // $voiture = voiture::selectvoitureById('voiture',$connection->conn,$row['idvoiture']);
            $client = Client::selectClientById('clients',$connection->conn,$row['idclient']);
           echo " <tr>
            <td>$row[idp]</td>
          
            <td>$client[firstname]</td>
            <td>$row[date_p]</td>
           
            <td>$row[montant]</td>
           
       
        </tr>";
        }
        
        ?>
        </tbody>
        
    </table>
    </div>
</body>
</html>
