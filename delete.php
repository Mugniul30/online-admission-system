<?php
/**
 * Created by PhpStorm.
 * User: techy
 * Date: 8/20/2022
 * Time: 12:55 AM
 */
$id = $_GET['id'];
$link = mysqli_connect('localhost', 'root', '', 'oas');
mysqli_query($link, "DELETE FROM 03_applicant WHERE applicant_id=$id");
header("location: applicant_list.php");