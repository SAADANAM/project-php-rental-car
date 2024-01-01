<?php ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Clickable Photos</title>
  <style>
    @import url('https://fonts.googleapis.com/css?family=Source+Code+Pro:200');

body  {
    background-image: url('https://static.pexels.com/photos/414171/pexels-photo-414171.jpeg');
  background-size:cover;
        -webkit-animation: slidein 100s;
        animation: slidein 100s;

        -webkit-animation-fill-mode: forwards;
        animation-fill-mode: forwards;

        -webkit-animation-iteration-count: infinite;
        animation-iteration-count: infinite;

        -webkit-animation-direction: alternate;
        animation-direction: alternate;              
}

@-webkit-keyframes slidein {
from {background-position: top; background-size:3000px; }
to {background-position: -100px 0px;background-size:2750px;}
}

@keyframes slidein {
from {background-position: top;background-size:3000px; }
to {background-position: -100px 0px;background-size:2750px;}

}



.center
{
  display: flex;
  align-items: center;
  justify-content: center;
  position: absolute;
  margin: auto;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background: rgba(75, 75, 250, 0.3);
  border-radius: 3px;
}
#example-id{
  text-align:center;
  color:rgb(37, 33, 33);
  font-family: 'Source Code Pro', monospace;
  text-transform:uppercase;
  
}




  </style>
</head>
<body>
    <div class="center">
        
       </div>
       <div class="container mt-5 text-center">
        <h1 id="example-id"> WELCOME IN BERRADI CARS AGENCY</h1>
       </div>
    <div class="container mt-5 text-center" >
        <h1 id="example-id">Are you a client or employe</h1>
<div class="container mt-5">
  <div class="row">
    <div class="col-md-6">
      <a href="create.php" class="thumbnail">
        <img src="client.png" alt="Photo 1" class="img-fluid">
      </a>
    </div>
    <div class="col-md-6">
      <a href="loginemp.php" class="thumbnail">
        <img src="employe.png" alt="Photo 2" class="img-fluid">
      </a>
    </div>
  </div>
</div>

<!-- Bootstrap JS and Popper.js (Optional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
