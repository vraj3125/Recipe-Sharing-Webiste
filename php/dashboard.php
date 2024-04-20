<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible"
		content="IE=edge">
	<meta name="viewport"
		content="width=device-width,initial-scale=1.0">

        <script src="admin.js"></script>


		<style>
			* {
margin: 0;
padding: 0;
box-sizing: border-box;
font-family: "Poppins", sans-serif;
}

body {
max-width: 100%;
overflow-x: hidden;
}


.main-container {
display: flex;
width: 100vw;
position: relative;
top: 70px;
z-index: 1;
}


.main {
height: calc(100vh - 70px);
width: 100%;
overflow-y: scroll;
overflow-x: hidden;
padding: 40px 30px 30px 30px;
}

.box-container {
display: flex;
justify-content: space-evenly;
align-items: center;
flex-wrap: wrap;
gap: 50px;
}
.nav {
min-height: 91vh;
width: 250px;
position: absolute;
top: 0px;
left: 00;
box-shadow: 1px 1px 10px rgba(198, 189, 248, 0.825);
display: flex;
flex-direction: column;
justify-content: space-between;
overflow: hidden;
padding: 30px 0 20px 10px;
}
.navcontainer {
height: calc(100vh - 70px);
width: 250px;
position: relative;
overflow-y: scroll;
overflow-x: hidden;
transition: all 0.5s ease-in-out;
background-color:#d7e3fc;
}

.nav-option {
width: 250px;
height: 60px;
display: flex;
align-items: center;
padding: 0 30px 0 20px;
gap: 20px;
transition: all 0.1s ease-in-out;
}
.nav-option:hover {
border-left: 5px solid #a2a2a2;
background-color: #dadada;
cursor: pointer;
}

.box {
height: 130px;
width: 230px;
border-radius: 20px;
box-shadow: 3px 3px 10px rgba(0, 30, 87, 0.751);
padding: 20px;
display: flex;
align-items: center;
justify-content: space-around;
cursor: pointer;

}

.box:nth-child(1) {
background-color: #ffc8dd;
}
.box:nth-child(2) {
background-color: #ffc8dd;
}

.box .text {
color: black;
} 
a
{
    text-decoration:none;
    color:black;
}

		</style>
        <link rel="stylesheet" href="css/style.css" >
</head>

<body>
<?php session_start(); ?>
<?php include 'resources/header.php'; ?>

<div class="main">

<div class="box-container">
<?php

$servername="localhost";
$username="root";
$password="";

$conn=mysqli_connect($servername,$username,$password,"RECIPE");

    $usr = "select  * from user_master";
    $run = mysqli_query($conn,$usr);
    $data = mysqli_fetch_assoc($run);
    $tot_usr= mysqli_num_rows($run);

    $rec = "select  * from rec_info";
    $run1 = mysqli_query($conn,$rec);
    $data1 = mysqli_fetch_assoc($run1);
    $tot_rec= mysqli_num_rows($run1);
    ?>
				<div class="box box1" style="width: 400px; height: 200px;"> 
					<div class="text">
						<a href="display_usr.php"><h2 class="topic" style="font-size: 25px;"> <pre><?php echo $tot_usr; ?> Users</pre> </h2></a>
					</div>
				</div>

				<div class="box box2" style="width: 400px; height: 200px; ">
					<div class="text">
					    <a href="display_rec.php"><h2 class="topic" style="font-size: 25px;"> <pre><?php echo $tot_rec; ?> Recipe</pre> </h2></a>
					</div>

					
				</div>
		</div>
	</div>
	<script src="admin.js"></script>
</body>
</html>