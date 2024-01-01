<?php
session_start();
require_once'voiture.php';
include('connection.php');
$connection = new Connection();
$connection->selectDatabase('project'); 
require_once __DIR__ . '/pdf/autoload.php';
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
//$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [190, 236]]);

$voiture = voiture::selectvoitureById('voiture',$connection->conn,$_SESSION['idcar']);
$prix= 50 * $_SESSION["period"];

$stylesheet = file_get_contents('style.css');
$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML('<header>
<h1> BRERADI CARS AGENCY INVOICE</h1>
</header>

<section>
<h2>Customer Information</h2>
<p><strong>Customer Name:</strong>'.$_SESSION['firstname'].'</p>
<p><strong>Address:</strong> MARRAKECH</p>
<p><strong>Email:</strong>'.$_SESSION["email"].'</p>
</section>

<section>
<h2>Rental Details</h2>
<table>
  <thead>
    <tr>
      <th>Car Model</th>
      <th>Start Date</th>
      
      <th>Days Rented</th>
      <th>Cost per Day</th>
      <th>Total Cost</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>'.$voiture[model].'</td>
      <td>'.$_SESSION["date"].'</td>
      
      <td>'.$_SESSION["period"].'</td>
      <td>50.00 DH</td>
      <td>'.$prix.' DH</td>
    </tr>
  </tbody>
</table>

<p class="total">Total Amount: '.$prix.'  DH</p>
</section>

<footer>
<p>Thank you for choosing our rental car services. For any inquiries, please contact us at breradi@gmail.com.</p>
</footer>

</body>');
$mpdf->Output("BRERADI_CARS_AGENCY.pdf","I");
//}