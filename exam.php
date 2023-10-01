<?php
include 'database.php';
$r4 = mysqli_query($link,"SELECT * FROM 03_applicant WHERE applicant_id=$id");
$e1 = mysqli_fetch_assoc($r4);
$exam = $r4['applicant_exam'];

$id=$_GET['id'];


$q= "UPDATE 03_applicant SET applicant_exam=$exam WHERE applicant_id=$id";
mysqli_query($link,$q);

?>