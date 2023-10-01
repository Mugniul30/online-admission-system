<?php
include 'database.php';
//$id= $_GET['id'];
//$query =mysqli_query($link, "SELECT * FROM 03_applicant WHERE applicant_id=$id");
//$data =  mysqli_fetch_all($query,MYSQLI_ASSOC) or die('error');
//$email = $data['applicant_email'];
//$name = $data['applicant_name'];
//$username=$data['applicant_user_name'];
//$password= $data ['applicant_phone'];

$to_email = "afif.mugniul56@gmail.com";
$subject = "Admission Payment Verification";
$body = "Hi, Congratulations for applying in State University Of Bangladesh.</br>Your payment is verified and you can now login to your account using the</br> User ID:> and Password: ";
$headers = "From:youronepause@gmail.com";

if (mail($to_email, $subject, $body, $headers)) {
    return "Email successfully sent to $to_email...";
} else {
    return "Email sending failed...";
}