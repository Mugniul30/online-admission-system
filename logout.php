<?php session_start();
unset($_SESSION['isLogged']);
header('location:index.php');