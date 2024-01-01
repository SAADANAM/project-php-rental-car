<?php
include('connection.php');
include('city.php');
include('couleur.php');
include('voiture.php');
include('employe.php');

//create in instance of class Connection
$connection = new Connection();


//call the selectDatabase method
$connection->selectDatabase('project');


$couleurValue = "";

if(isset($_POST["submit"])){
    

    $couleurValue = $_POST["name"];


    if(empty($couleurValue) ){

            $errorMesage = "all fileds must be filed out!";


    }else{
       
    

    //create new instance of city class with the values of the inputs
    $coolor = new Color($couleurValue);

//call the insertClient method
$coolor->insertColor('couleurs',$connection->conn);

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

        <h2>creation couleur</h2>

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
                    <label class="col-form-label col-sm-1" for="name"> Name of couleur:</label>
                    <div class="col-sm-6">
                        <input value="<?php echo $couleurValue ?>" class="form-control" type="text" id="name" name="name">
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
                        <button name="submit" type="submit" class=" btn btn-primary">ajouter</button>
                    </div>
                    
            </div>
        </form>

    </div>

</body>
</html>