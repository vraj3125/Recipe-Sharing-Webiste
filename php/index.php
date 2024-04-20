<?php session_start() ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="css/style.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
      
    *{
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    }

    .recipe-card {
  display: inline-block;
  margin: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  border-radius: 5px;
  overflow: hidden;
  position: relative;
  transition: transform 0.2s ease-in-out;
}

.recipe-card:hover {
  transform: translateY(-5px);
}

.recipe-card-image img {
  width: 100%;
  height: 200px;
  object-fit: cover;
}

.recipe-card-content {
  padding: 20px;
}

.recipe-card-title {
  margin-top: 0;
  margin-bottom: 10px;

  font-weight:bold;
  text-transform: capitalize;
  font-size: 25px;
}

.recipe-card-description {
  margin-bottom: 10px;

}

.recipe-card-rating {
  margin-bottom: 10px;
}

.recipe-card-rating i {
  color: #ffc107;
}

.recipe-card-button {
  display: inline-block;
  padding: 8px 12px;
  background-color: #28a745;
  color: #fff;
  text-decoration: none;
  border-radius: 5px;
  transition: background-color 0.2s ease-in-out;
}

.recipe-card-button:hover {
  background-color: #218838;
}

.recipe-cards-container {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 20px;
}

.img_choice{
  height: 150px;
  border:none;
  border-radius: 50%;
}
.img3{
  display: inline-block;
  margin-left:30%;
}
.checked {
  color: orange;
}
.search_nav_visib
{
    position:absolute;
    right:30px;
    top:30px;
    z-index: 7;
    position: fixed;

}

</style>
</head>
<body>

    <?php include 'resources/header.php'; ?>
    <?php
$servername="localhost";
$username="root";
$password="";

$conn=mysqli_connect($servername,$username,$password,"RECIPE");
?>
    <div class="search_nav_visib" >
      <form action="" method="post">
            <input type="text" name="search" id="search">
            <input type="submit" name="submit"></input>  
      </form>       
        </div>

        <?php
          if(isset($_POST['submit']))
          {
            $val=$_POST['search'];
            echo "<script>window.location.href='?name=$val'</script>";
          }
        ?>


  <div class="img3">
    <a href="index.php?id=1"><img src="images/veg.png" class="img_choice" id="veg"></a>
    <a href="index.php?id=2"><img src="images/non_veg.png" class="img_choice" id="nonveg"></a>
    <a href="index.php?id=3"><img src="images/vegan.png" class="img_choice" id="vegan"></a>
</div>

    <div class="recipe-cards-container">
        <?php 
          
              include "My_sql.php";

              if(isset($_GET['name'])){       //for searching res
                    $rn=$_GET['name'];
                    $all_post = "SELECT * from rec_info where name='$rn' or main_ing='$rn' ";
                  }
                  
              else{
                $all_post = "SELECT * from rec_info order by id asc";  //for all rec
              }
              $run = mysqli_query($conn,$all_post);
              if(isset($_GET['id'])){
              $id = $_GET['id'];
              if($id==1)                //for catagory
              {
                $all_post = "SELECT * from rec_info where category_id='veg'";
                $run = mysqli_query($conn,$all_post);
              }
              elseif($id==2)
              {
                $all_post = "SELECT * from rec_info where category_id='non-veg'";
                $run = mysqli_query($conn,$all_post);
              }
              elseif($id==3)
              {
                $all_post = "SELECT * FROM rec_info WHERE category_id='vegan'";
                $run = mysqli_query($conn,$all_post);
              }
            }
              while($data = mysqli_fetch_assoc($run)){
        ?>

          <div class="recipe-card">
            <div class="recipe-card-image">
            <img src="images/user_img/<?= $data['image'] ?>">
            </div>
            <div class="recipe-card-content">
               <p class="recipe-card-title"><?= $data['name'] ?></p>
               <p class="recipe-card-description"><?= $data['category_id'] ?></p>
              <div class="recipe-card-rating">
                <?php

              $post = "SELECT * from ratings where rec_id=".$data['id'];
              $run1 = mysqli_query($conn,$post);
              $data1 = mysqli_fetch_assoc($run1);
              $tot_row= mysqli_num_rows($run1);

              $rats="SELECT SUM(`rating`) FROM ratings WHERE rec_id=".$data['id'];
              $run2 = mysqli_query($conn,$rats);
              $data2 = mysqli_fetch_array($run2);
            
              if($data2[0] != NULL){
                $rating =ceil($data2[0]/$tot_row);

               if($rating>5) $rating=5;                 
              
                for($i=0 ; $i< ($rating) ;$i++)
                {
                echo "<span class='fa fa-star checked'></span>";
                }

               for($i=0 ;$i<5-$rating;$i++)
               {
                 echo "<span class='fa fa-star '></span>";
               }
              }

               else
               {
                for($i=0 ;$i<5;$i++)
                {
                 echo "<span class='fa fa-star '></span>";
                }
               }
              ?>

              </div>

             <a href="full_rec.php?id=<?= $data['id']?>" class="recipe-card-button">View Full Recipe</a> 
              </div>
              </div>
             <?php } ?> 
        </div>


</body>

</html>