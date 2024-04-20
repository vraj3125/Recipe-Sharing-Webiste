<?php 
session_start();
if(!isset($_SESSION['user_id'])){
    echo "<script>window.location.href='login.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css" >
    <link rel="stylesheet" href="css/addRecipe.css" >

</head>
<body background="images/abt_us.jpg">
    
    <?php include 'resources/header.php'; ?>

    <img src="images/strawberry-grain copy1.png" id="img_left">
    <img src="images/img-fruit-bowl.webp" id="img_right">
    <img src="images/Image 2.png" id="img_bottom">

    <h1 align="center">UPLOAD RECIPE</h1>

    <form name="upload" action="" method="post" enctype="multipart/form-data"> 
    <table id="add">
       <tr>
        <td> Recipe Name: </td>
        <td><input type="text" name="rname"></td>
       </tr>

       <tr style="height: 60px;">
        <td> Recipe Type: </td>
        <td><select name="rec_type">
            <option value="veg">Veg.</option>
            <option value="non-veg">Non Veg.</option>
            <option value="vegan">Vegan</option>
           </select>
        </td>
       </tr>

       <tr>
        <td valign="top"> Ingredients:  </td>
        <td><textarea placeholder="Enter Ingradients" name="ingre"></textarea></td>
       </tr>

       <tr>
        <td valign="top"> Steps:  </td>
        <td><textarea rows="5" placeholder="List Steps" name="step"></textarea></td>
       </tr>

       <tr>
        <td> Main Ingredient: </td>
        <td><input type="text" name="main_ing"></td>
       </tr>
       
       <tr>
        <td> Cooking Time: </td>
        <td><input type="text" name="time"></td>
       </tr>

       <tr>
        <td> Serves: </td>
        <td><input type="text" name="serves"></td>
       </tr>

       <tr>
        <td> Upload Picture: </td>
        <td><input type="file" name="pic"></td>
       </tr>

       <tr>
        <td> YouTube Link: </td>
        <td><input type="text" name="ytlink" placeholder="if available"></td>
       </tr>

       <tr>
        <td colspan="2" align="center"><input type="submit" name="submit"></td>
       </tr>

    </table>
    </form>

   <p>we are not only sharing Recepie we also share trust</p>


</body>
</html>

<?php

$servername='localhost';
$username='root';
$password='';
$conn=mysqli_connect($servername,$username,$password,'RECIPE');


if(isset($_POST['submit']) != null)
{
    
    $recname=$_POST['rname'];
    $rectype=$_POST['rec_type'];
    $ingre=$_POST['ingre'];
    $step=$_POST['step'];
    $main_ing=$_POST['main_ing'];
    $time=$_POST['time'];
    $serves=$_POST['serves'];
    $yt_lnk=$_POST['ytlink'];
    
$que = "SELECT `id` from `user_master` where `user_name`= '".$_SESSION['user_id']."'";

$run1 = mysqli_query($conn,$que);
$data1 = mysqli_fetch_assoc($run1);
$uid = $data1['id'];

        $filename = $_FILES['pic']['name'];
        $tempname = $_FILES['pic']['tmp_name'];
        
        $t = time();
        $ar = explode(".",$filename);   
        $img = $ar[0].$t.".".$ar[1];
        
        if (move_uploaded_file($_FILES['pic']['tmp_name'], "images/user_img/".$img) ){

       $query="INSERT INTO `rec_info`(`user_id`,`name`,`category_id`,`ingredient`,`steps`,`main_ing`,`image`,`yt_link`,`time`,`serves`)  VALUES 
        ('$uid','$recname','$rectype','$ingre','$step','$main_ing','$img','$yt_lnk','$time','$serves')";
   
        $conn=mysqli_query($conn,$query);
        if(!$conn){
            echo "error";
        }
        
    }
}

?>