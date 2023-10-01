<?php include 'database.php';
/**
 * Created by PhpStorm.
 * User: techy
 * Date: 8/20/2022
 * Time: 12:55 AM
 */
$id = $_GET['id'];
mysqli_query($link, "DELETE FROM 02_auth_admin WHERE auth_id=$id");
header("location: adminDisplay.php");