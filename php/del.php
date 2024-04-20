<?php 
session_start();
$servername="localhost";
$username="root";
$password="";

$conn=mysqli_connect($servername,$username,$password,"RECIPE");

$id = $_GET['id'];

   $query="DELETE FROM `rec_info` WHERE id=$id";
 
   $conn=mysqli_query($conn,$query);
   if(!$conn){
       echo "error";
   }
    else{
        echo "
        <script>
        window.location.href='index.php';
        </script>";
    }   
?>