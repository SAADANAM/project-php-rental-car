
<?php
include ("templogin.php");
include("methode.php");
include('connection.php');
$connection = new Connection();
$connection->selectDatabase('project');
$login  = new Login1();

if(isset($_POST["submitL"])){
 
    $result = $login->login($_POST["email"],$_POST["password"],$connection->conn,'employe');
    
    if($result == 1){
        $_SESSION["login"] = true;
        $_SESSION["id"] = $login->idclient();
        $_SESSION["name"] ="saad";
        header("Location: pageemploye.php");
    }
    elseif($result == 10){
        echo "<script> alert('Wrong Password'); </script>";

    }
    elseif($result == 100){

        echo "<script> alert('employe Not found'); </script>";
        
    }
}
?>
