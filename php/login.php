<?php 
session_start();
?>
<html>

<head>
  <link rel="stylesheet" href="css/style.css">
   
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <title>Sign in</title>
  <style>
    body {
    background-color: #F3EBF6;
    font-family: 'Ubuntu', sans-serif;
}

.main {
    background-color: #FFFFFF;
    width: 400px;
    height: 400px;
    margin: 7em auto;
    border-radius: 1.5em;
    box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
}

.sign {
    padding-top: 40px;
    color: #8C55AA;
    font-family: 'Ubuntu', sans-serif;
    font-weight: bold;
    font-size: 23px;
}

.un {
width: 76%;
color: rgb(38, 50, 56);
font-weight: 700;
font-size: 14px;
letter-spacing: 1px;
background: rgba(136, 126, 126, 0.04);
padding: 10px 20px;
border: none;
border-radius: 20px;
outline: none;
box-sizing: border-box;
border: 2px solid rgba(0, 0, 0, 0.02);
margin-bottom: 50px;
margin-left: 46px;
text-align: center;
margin-bottom: 27px;
font-family: 'Ubuntu', sans-serif;
}

form.form1 {
    padding-top: 40px;
}

.pass {
        width: 76%;
color: rgb(38, 50, 56);
font-weight: 700;
font-size: 14px;
letter-spacing: 1px;
background: rgba(136, 126, 126, 0.04);
padding: 10px 20px;
border: none;
border-radius: 20px;
outline: none;
box-sizing: border-box;
border: 2px solid rgba(0, 0, 0, 0.02);
margin-bottom: 50px;
margin-left: 46px;
text-align: center;
margin-bottom: 27px;
font-family: 'Ubuntu', sans-serif;
}


.un:focus, .pass:focus {
    border: 2px solid rgba(0, 0, 0, 0.18) !important;
    
}

.submit {
  font-weight:bold;
  cursor: pointer;
    border-radius: 5em;
    color: black;
    background: linear-gradient(to right, #ffc8dd, #d7e3fc);
    border: 0;
    padding-left: 40px;
    padding-right: 40px;
    padding-bottom: 10px;
    padding-top: 10px;
    font-family: 'Ubuntu', sans-serif;
    margin-left: 35%;
    font-size: 13px;
    box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
}


    
  </style>
</head>

<body>
  <div class="main">
    <p class="sign" align="center">Log In</p>
    <form class="form1" method="post" action="">
      <input class="un " type="text" align="center" placeholder="Username" name="username">
      <input class="pass" type="password" align="center" placeholder="Password" name="pass">
      <input type="submit" name="submit" class="submit">        
    </div>
     
	<?php

		$servername='localhost';
		$username='root';
		$password='';
		$conn=mysqli_connect($servername,$username,$password,'RECIPE');

		if(isset($_POST['submit'])) 
		{

    	$uname=$_POST['username'];
    	$pass=$_POST['pass'];
    	
      $uname= mysqli_real_escape_string($conn,$uname);
      $pass= mysqli_real_escape_string($conn,$pass); 

      $q="SELECT * FROM `admin` WHERE user_name='$uname' AND `password`='$pass'";
      $run1=mysqli_query($conn,$q);
      $data1 = mysqli_num_rows($run1);

      if($data1 != NULL){                              
      $_SESSION['user_id'] = $uname;
      echo "<script>window.location.href='dashboard.php'</script>";
      }

      else 
      {
        $query="SELECT * FROM `user_master` WHERE user_name='$uname' AND `password`='$pass'";
	 	    $run=mysqli_query($conn,$query);
		    $data = mysqli_num_rows($run);

		if($data != NULL){                              
			$_SESSION['user_id'] = $uname;
			echo "<script>window.location.href='index.php'</script>";
		}
		else{
			echo "<script>alert('Incorrect Username Or Password');</script>";
		}
      }
		 
		}
	 ?>
</body>

</html>