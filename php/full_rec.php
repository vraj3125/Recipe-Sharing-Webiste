<?php session_start(); ?>
<html>
<head>
  <style>
    h3{
      margin-bottom:3px;
    }
    *{
      font-size:20px;
      white-space: nowrap;
    }

.recipe-photo {
  height: 160px;
  border-radius: 5px;
}

.recipe-container {
  max-width: 1000px;
  margin: 0 auto;
  font-family: Arial, sans-serif;
  background-color: #f9f9f9;
  border: 1px solid #ddd;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); 
}

.recipe-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  background-color: #e8f0fe;
  padding: 20px;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;

}
.recipe-title {
  font-size: 45px;
  font-weight: bold;
  color: #555;
  text-transform: capitalize;
}
.space
{
  padding: 20px;
}

input{
  border: 1px solid black;
  border-radius:5px;
}
a
{
  text-decoration:none;
  background:pink;
  color:black;
  width:170px;
  display:block;
  text-align:center;
  border:1px solid black; 
  border-radius:4px;
}
</style>

</head>
<body>

<?php
$servername='localhost';
$username='root';
$password='';
$conn=mysqli_connect($servername,$username,$password,"RECIPE");


$id = $_GET['id'];

$select_query = "SELECT * FROM rec_info WHERE id = " . $id;
$run = mysqli_query($conn, $select_query);
$data = mysqli_fetch_assoc($run);


$query = "SELECT * from user_master where id = " . $data['user_id'];
$run1 = mysqli_query($conn, $query);
$data1 = mysqli_fetch_assoc($run1);

?>

<div class="recipe-container">
  <div class="recipe-header">
    <img class="recipe-photo" src="images/user_img/<?= $data['image'] ?>">
    <?php  echo "<p class=recipe-title >".$data['name']."</p>" ?>
  </div>


<div class="space">
<?php


echo "<br><br><h3 style=display:inline>Uploaded By: </h3>".$data1['user_name'];

echo "<br><h3>Steps</h3>";
$steps=$data['steps'];
$s =explode(",",$steps);

foreach($s as $x => $x_value) {
    echo  $x+1 .". ".$x_value;
    echo "<br>";
  }
  
  echo "<br><h3 style=display:inline>Main Ingredients: </h3>".$data['main_ing'];
  
  echo "<br><br><h3 style=display:inline>Ingredients: </h3>";

  $ing=$data['ingredient'];
  $i=explode(",",$ing);

echo "<ul>";
foreach($i as $x => $x_value) {
    echo "<li>".$x_value."</li>";
  }
  echo "</ul>";

  $type=$data['category_id'];
  if($type=="veg" || $type=="vegan" )
    echo "<h3 style=display:inline;>Type:</h3> <h2 style=display:inline;color:green>$type</h2>";
  else 
   echo "<br><br><h3 style=display:inline;>Type:</h3> <h2 style=display:inline;color:red>$type</h2>";
  
   echo "<br><br><h3 style=display:inline >Time: </h3>".$data['time']." minutes";

   echo "<br><br><h3 style=display:inline >Serves: </h3>".$data['serves'];

  $yl=$data['yt_link'];

  if($yl){
    echo "<br><br>";
   echo "<iframe width='560' height='315' src='".$yl."'title='YouTube video player' frameborder='0' allow='accelerometer; 
          autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' allowfullscreen></iframe>";
  } 
?>
<br><br>
<form action="" method="post" enctype="multipart/form-data">
Rate it: <input type="text" placeholder="0-5" name="rate">
         <input type="submit" name="submit">
</form>

<?php
if(isset($_POST['submit']) != null)
{
$rat=$_POST['rate'];

$que1 = "INSERT INTO `ratings`(`rec_id`,`rating`) VALUES ('$id','$rat')"; 
$run1 = mysqli_query($conn,$que1);
}
?>

<?php 

if(isset($_SESSION['user_id'])){
$que = "SELECT id from user_master where user_name = '".$_SESSION['user_id']."'";
$run = mysqli_query($conn,$que);
$data = mysqli_fetch_assoc($run);

$id1 = $data['id'];
$que2 = "SELECT * from rec_info where user_id = $id1 AND id = $id";
$run1 = mysqli_query($conn,$que2);
$data1 = mysqli_fetch_assoc($run1);
if($data1['id'] != NULL){
?>

<a href="del.php?id=<?=$id ?>">delete own recipe</a>

<?php 
}
}
?>
</div>
</div>

</body>
</html>