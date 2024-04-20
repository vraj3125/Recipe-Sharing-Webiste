<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="css/style.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
table
{
  width:50%;
  margin:auto;
  margin-top:50px;
}
td,th{
  padding:10px;
}
</style>

<?php
session_start();
 include 'resources/header.php'; 
 include "My_sql.php";

 $usr = "select  * from user_master";
 $run = mysqli_query($conn,$usr);
 ?>
<table border='1px' style='border-collapse: collapse; text-align:center; '>
<th>No</th>
<th>User Name</th>
<th>delete</th>
<?php
$i=0;
 while($data = mysqli_fetch_assoc($run))
 {
    ?>
    <tr>
    <td><?= ++$i ?></td>
    <td><?= $data['user_name'] ?></td>
   <td><a style="color:black" href="remove_usr.php?id=<?=$data['id']?>"><i  class="fa fa-trash"></i></a></td>

   <?php
 }
 
 echo "</table>";
?>
</html>