<?php session_start();

require_once'client.php';
require_once'voiture.php';
//include connection file
include('connection.php');

//create in instance of class Connection
$connection = new Connection();


//call the selectDatabase method
$connection->selectDatabase('project');
$user_id ="";
$car_id = "";
$reservation_date= "";
$reservation_period= "";
$errorMesage = "";
$successMesage = "";

    if (isset($_POST["submitt"])) {
       
    $user_id =$_SESSION["id"];
   // $user_id =14;
    $car_id = $_POST["car"];
    $reservation_date = $_POST["day"];
    $reservation_period = $_POST["Duration"];
        if(empty($car_id) || empty($reservation_date) || empty($reservation_period) ){
            $errorMesage = "all fileds must be filed out!";}
        else{
        include('resevation.php');
        $reservation = new reservation($user_id,$car_id,$reservation_date,$reservation_period);
        $reservation->insertreservation('reservation',$connection->conn);
        $successMesage = reservation::$successMsg;
        $errorMesage = reservation::$errorMsg;
        if($errorMesage == NULL){
        voiture::reservervoiture('voiture',$connection->conn,$car_id);
        $_SESSION['period'] =$reservation_period;
        $_SESSION['date'] =$reservation_date;
        $_SESSION['idcar'] =$car_id;
        header("Location: reservation doner.html");
                                }
            $car_id = "";
            $reservation_date= "";
            $reservation_period= "";
}
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <link href="/css/bootstrap.min.css" rel="stylesheet" >

    <style>
body::before{
content: '';
display: block;
height: 60px;
}
#myInput1{
           position: absolute;
           top: 10px; 
           right: 10px; 
        }
h2{
    text-align: center;
}

    </style>
  </head>
  <body>
  <div class="bg-dark">
  <h2 class="bg-dark text-light"><?php echo 'HI ' . $_SESSION["firstname"]; ?></h2>
<div class="navbar navbar-expand-md bg-dark navbar-dark text-white fixed-top">
    <div class="container">
        <a href="#" class="navbar-brand">BERRADI CARS AGENCY </a>



            <button 
            class="navbar-toggler" 
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#mainmenu"
            >
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="mainmenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a href="#hero" class="nav-link">about us</a></li>
                <li class="nav-item"><a href="#features" class="nav-link">cars</a></li>
                <li class="nav-item"><a href="#faq" class="nav-link">ask me</a></li>
                <li class="nav-item"dropdown >
                    <a href="#learn" class="nav-link dropdown-toggle"data-bs-toggle="dropdown">more</a>
                <ul class="dropdown-menu">
                    <li><a href="#learn" class="dropdown-item">make a reservation</a></li>
                    <li><a href="#next" class="dropdown-item">SERVICES</a></li>
                </ul>
            </li>
            </ul>
        </div>

    </div>





</div>

 


<section id="hero" class="bg-dark text-light text-center text-lg-start px-5">
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-center">
             <div>
                <h1 class="display-5">ABOUT <span class="text-warning">US</span></h1>
                <p class="py-2 lead ">Discover Marrakech with ease and convenience through our trusted lexuary car rental agency. At BERRADI Car Rentals, we offer a diverse selection of reliable vehicles to cater to your travel needs. Whether you're exploring the bustling streets of the Medina or embarking on a scenic adventure to the nearby desert or mountains, our well-maintained cars are equipped to handle any terrain. With a seamless online booking process and friendly customer service, we ensure a hassle-free experience from start to finish. Experience the freedom and flexibility to explore Marrakech at your own pace with Marrakech Car Rentals.




                </p>
                <button class="btn btn-warning" onclick="location.href='create.php'" >sign up</button>
                <button class="btn btn-warning" onclick="location.href='login.php'" >sign in</button>
             </div>   
             <img class="d-none d-sm-block img-fluid w-50 " src="new1.svg" alt="">
        </div>

    </div>
</section>
</div>

<section id="features"class="py-5">
<div class="container">
    <h2 class="text-center mb-3">
        CARS
        </h2>
<div class="row">

    
    <div class="col-sm py-1">
        <div class="card bg-dark text-light ">
            <img src="FordMustangV850-02.jpg" alt="" class="card-img-top">
            <div class="card-body text-center">
           <h4 class="card-title text-warning">MUNSTANG</h4>
           <p class="card-text"></div>
           </p>
           <a class="btn btn-info" onclick="location.href='https://www.motorlegend.com/fiche-technique/ford-mustang-vi-2015-2022-gt-421-ch/2253.html'"  >MORE</a>
        </div>
    </div>
    <div class="col-sm py-1">
        <div class="card bg-dark text-light ">
            <img src="FordMustangV850-02.jpg" alt="" class="card-img-top">
            <div class="card-body text-center">
           <h4 class="card-title text-warning">M4</h4>
           <p class="card-text"></div>
           </p>
           <a  class="btn btn-info" onclick="location.href='https://fr.wikipedia.org/wiki/BMW_M4'">MORE</a>
        </div>
    </div>
    <div class="col-sm py-1">
        <div class="card bg-dark text-light ">
            <img src="FordMustangV850-02.jpg" alt="" class="card-img-top">
            <div class="card-body text-center">
           <h4 class="card-title text-warning">A7</h4>
           <p class="card-text"></div>
           </p>
           <a  class="btn btn-info" onclick="location.href='https://www.motorlegend.com/fiche-technique/audi,a7-sportback.html'">MORE</a>
        </div>
    </div>
    
    
</div>
</div>
</section>


<section id="learn" class="py-5">
    <div class="container"> 
<div class="row align-items-center justify-content-center">
    <div class="col-md">
        <img src="FordMustangV850-02.jpg" alt="" class="img-fluid">
    </div>
    <div class="col-md py-4">
        <div class="container">
            <h2>Car Reservation</h2>
        
            <form  method="post">
            <div class="form-group-md">
            <select name='car' class="form-select">
                <option selected>Select a car</option>
                    <?php
                        $carss=voiture::selectAllvoiture('voiture',$connection->conn);
                        foreach($carss as $roww){
                                echo "<option value='$roww[id]' >$roww[model]</option>";

                        }
                    ?>
                </select>
            </div>
        
              <div class="form-group">
                <label for="day">Choose Day of Reservation:</label>
                <input type="date" id="day" name="day" class="form-control">
              </div>
              <div class="form-group" style="margin-bottom: 20px;">
                <label for="Duration">Choose The Duration:</label>
                <input type="number" id="Duration" name="Duration" class="form-control" min="1">
              </div>
              <div class="form-group">
              <button name="submitt" type="submit" class=" btn btn-primary">Send</button>
              </div>
            </form>
          </div>
    
    </div>
</div>
        
    </div>
</section>






<section id="next" class="py-5 bg-dark text-light">
    <div class="container"> 
<div class="row align-items-center justify-content-center flex-row-reverse">
    <div class="col-md">
        <img src="FordMustangV850-02.jpg" alt="" class="img-fluid ">
    </div>
    <div class="col-md py-4">
        <h2>SERVICES</h2>
        <p>Car Rental: The primary service offered by car rental agencies is the rental of vehicles to customers for a specific period, which can range from a few hours to several weeks or months</p>
        <p>Airport Pickup and Drop-off: Many car rental agencies provide the convenience of picking up customers from the airport upon their arrival and dropping them off at the airport when their rental period is complete</p>
    
    </div>
</div>
        
    </div>
</section>

<section id="faq" class="py-5">
    <div class="container">
        <h2 class="text-center mb-3">
            frequently asked questions
            </h2>
                <div class="accordion accordion-flush" id="bt-faq">
                    <div class="accordion item">
                        <h5 class="accordion-header" id="faq-one">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"data-bs-target="#answer-one">PHONE NUMBER</button>
                        </h5>
                            <div class="accordion-collapse collapse" id="answer-one" data-bs-parent="#bt-faq">
                          <p> 0669588505</p> 
                         </div>

                </div>


                    <div class="accordion item">
                        <h5 class="accordion-header" id="faq-two">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"data-bs-target="#answer-two">EMAIL</button>
                        </h5>
                            <div class="accordion-collapse collapse" id="answer-two"data-bs-parent="#bt-faq">
                            <p>beredi@gmail.com</p>
                         </div>

                </div>

                    <div class="accordion item">
                        <h5 class="accordion-header" id="faq-three">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"data-bs-target="#answer-three">LOCATION</button>
                        </h5>
                            <div class="accordion-collapse collapse" id="answer-three"data-bs-parent="#bt-faq">
                              <p>https://www.google.com/maps/@31.623036,-8.0703276,18.57z</p>  
                         </div>

                </div>

</div>
</div>
</section>


<footer class="py-4 bg-dark text-white texte-center position-relative">
    <div class="container">
        <p class="lead">copyright &copy;2023 3ntiz wldbrradi</p>
        <a href="#"class="position-absulute bottom 0 end-0 p-3">
            <i class="bi bi-arrow-up-circle h2"></i>

        </a>

    </div>
    <form action="logout.php" method="get" id="myInput1">
    <input class="btn btn-danger" type="submit" value="log_out">
</form>

</footer>



  
    
</body>
</html>

