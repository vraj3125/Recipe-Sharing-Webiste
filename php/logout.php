<?php
 
session_start();
$servername="localhost";
$username="root";
$password="";

$conn=mysqli_connect($servername,$username,$password,"RECIPE");

unset($_SESSION["user_id"]);

header("location: index.php");
?>