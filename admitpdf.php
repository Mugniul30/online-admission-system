<?php session_start();

if(empty($_SESSION['isLogged'])){

    header("location:applicant_login.php");
}
$id=$_GET['id'];
include 'database.php';
$result = "SELECT * FROM 03_applicant where applicant_id ='$id'";
$r1 = mysqli_query($link,$result);


while($row = mysqli_fetch_array($r1)){
    if ($row['status_03']==1) {
        header("location:admitcard.php?id=$id");
    }else {
        echo "Sorry! Your Payment Is not verified Yet";
    }
}