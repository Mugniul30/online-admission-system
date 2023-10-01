<?php
include 'database.php';

$id=$_GET['id'];
$status = $_GET['status'];

$q= "UPDATE 03_applicant SET status_03=$status WHERE applicant_id=$id";

mysqli_query($link,$q);

?>