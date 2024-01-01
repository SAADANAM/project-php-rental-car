<?php
//include connection file
include('connection.php');
   

//create in instance of class Connection
$connection = new Connection();


//call the selectDatabase method
$connection->selectDatabase('project');
$brandValue = "";
$nbrofcarsValue = "";
$errorMesage = "";
$successMesage = "";
if(isset($_POST["submite"])){

    $brandValue = $_POST["brand"];
    $nbrofcarsValue = $_POST["nbrofcars"];
  

    if(empty($brandValue) || empty($nbrofcarsValue)){

            $errorMesage = "all fileds must be filed out!";}

      else{ 
    
    //include the client file
    include('stock.php');

    //create new instance of client class with the values of the inputs
    $stock = new stock($brandValue,$nbrofcarsValue);

//call the insertClient method
$stock->insertstock('stock',$connection->conn);

//give the $successMesage the value of the static $successMsg of the class
$successMesage = stock::$successMsg;

//give the $errorMesage the value of the static $errorMsg of the class
$errorMesage = stock::$errorMsg;
if($errorMesage == NULL){
header("Location: firstpage.php");
}
$brandValue = "";
$nbrofxarsValue = "";
   
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

        <h2>ajout on stock</h2>

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
                    <label class="col-form-label col-sm-1" for="brand">Brand Name:</label>
                    <div class="col-sm-6">
                        <input  class="form-control" type="text" id="brand" name="brand">
                    </div>
            </div>
            <div class="row mb-3">
                    <label class="col-form-label col-sm-1" for="nbrofcars">Number of cars:</label>
                    <div class="col-sm-6">
                        <input   class="form-control" type="number" id="nbrofcars" name="nbrofcars">
                    </div>
            </div>
          
                
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
                        <button name="submite" type="submit" class=" btn btn-primary">Confirm stock</button>
                    </div>
                    
            </div>
        </form>

    </div>

</body>
</html>
