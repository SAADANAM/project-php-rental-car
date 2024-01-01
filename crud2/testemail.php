<?php 
require_once'mail.php';
$mail->setFrom('saadanam2004@gmail.com', 'beredi_agency');

$mail->addAddress($emailValue);


$mail->Subject = 'Welcome to Beredi Cars Agency';
    $mail->Body    = ' <p> HI '.$fnameValue.' At Beredi Cars Agency, we are thrilled to have you on board! Whether you are embarking on a business trip, planning a weekend getaway, or just need a reliable vehicle for your daily commute, we have got you covered. Our diverse fleet of quality cars is ready to hit the road, providing you with comfort, style, and peace of mind. Explore our range of vehicles and discover the convenience of hassle-free car rentals. Thank you for choosing Beredi Cars Agency — where your journey begins! </p>
        </main>';

    $mail->send();


?>