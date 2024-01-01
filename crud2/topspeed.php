<?php
//include connection file
include('connection.php');
   

//create in instance of class Connection
$connection = new Connection();


//call the selectDatabase method
$connection->selectDatabase('project');
$idc = "";
$idres = "";
$errorMesage = "";
$successMesage = "";
$montant="";
$ldate="";

if(isset($_POST["submit"])){

    $idc = $_POST["client"];
    $idres = $_POST["reserve"];
    $ldate = $_POST["date1"];
    $montant=$_POST["montant"];

    if(empty($idc) || empty($idres) || empty($ldate) || empty($montant)){

            $errorMesage = "all fileds must be filed out!";}

    
       
    else{
    //include the client file
    include('paiement.php');

    //create new instance of client class with the values of the inputs
    $paiement= new paiement($idc,$ldate,$idres,$montant);

//call the insertClient method
   $paiement->insertpaiement('paiement',$connection->conn);

//give the $successMesage the value of the static $successMsg of the class
// $successMesage = paiement::$successMsg;

// //give the $errorMesage the value of the static $errorMsg of the class
// $errorMesage = paiement::$errorMsg ;
if($errorMesage == NULL){
    header("Location: topspeed.php");
}
$idc = "";
$idres = "";
$ldate = "";   
$montant = "";  
      
    }
}


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
  height: 100vh;
   background: linear-gradient(90deg,#e52e71,#ff8a00);

}

.slider-thumb::before {
  position: absolute;
  content: "";
  left: 30%;
  top: 20%;
  width: 450px;
  height: 450px;
  background: #17141d;
  border-radius: 62% 47% 82% 35% / 45% 45% 80% 66%;
  will-change: border-radius, transform, opacity;
  animation: sliderShape 5s linear infinite;
  display: block;
  z-index: -1;
  -webkit-animation: sliderShape 5s linear infinite;
}
@keyframes sliderShape{
  0%,100%{
  border-radius: 42% 58% 70% 30% / 45% 45% 55% 55%;
    transform: translate3d(0,0,0) rotateZ(0.01deg);
  }
  34%{
      border-radius: 70% 30% 46% 54% / 30% 29% 71% 70%;
    transform:  translate3d(0,5px,0) rotateZ(0.01deg);
  }
  50%{
    transform: translate3d(0,0,0) rotateZ(0.01deg);
  }
  67%{
    border-radius: 100% 60% 60% 100% / 100% 100% 60% 60% ;
    transform: translate3d(0,-3px,0) rotateZ(0.01deg);
  }
}
    </style>
</head>
<body>
<div class="slider-thumb"></div>
    <div class="container my-5 ">

        <h2>SIGN UP</h2>

    <?php

    if(!empty($errorMesage)){
  echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong>$errorMesage</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
  </button>
  </div>";
    }
       ?>

        <br>
        <form method="post">
      
            <div class="row mb-3">
                    <label class="col-form-label col-sm-1" for="lname">Montant:</label>
                    <div class="col-sm-6">
                        <input  value="<?php echo $montant ?>" class="form-control" type="text" id="montant" name="montant">
                    </div>
            </div>
            <div class="row mb-3">
                    <label class="col-form-label col-sm-1" for="lname">ID RESERVATION::</label>
                    <div class="col-sm-6">
                        <input  value="<?php echo $idres ?>" class="form-control" type="text" id="reserve" name="reserve">
                    </div>
            </div>
            <div class="row mb-3 ">
                    <label class="col-form-label col-sm-1" for="email">DATE:</label>
                    <div class="col-sm-6">
                        <input value=" <?php echo $ldate ?>" class="form-control" type="date" id="date1" name="date1">
                    </div>
                    
            </div>
            <div class="row mb-3">
            <label class="col-form-label col-sm-1" for="client">client:</label>
            <div class="col-sm-6">
                <select name="client" class="form-select">
                <option selected>Select id </option>
                    <?php
                        include('client.php');
                        $clients=Client::selectAllclients('clients',$connection->conn);
                        foreach ($clients as $c) {
                            echo "<option value='$c[id]'>$c[firstname]</option>";
                        }
                    ?>
                </select>
                </div>
   </div>
           

            <?php
            if(!empty($successMesage)){
echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
<strong>$successMesage</strong>
<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
</button>
</div>";
            }
  ?>  
      

            <div class="row mb-3">
                    <div class="offset-sm-1 col-sm-3 d-grid">
                        <button name="submit" type="submit" class=" btn btn-primary">Payer</button>
                    </div>
                   
            </div>
        </form>

    </div>

</body>
</html>
