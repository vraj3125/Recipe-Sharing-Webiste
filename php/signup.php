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
    padding-bottom:20px;
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
    border: 2px solid rgba(0, 0, 0, 0.18);   
}

.email {
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


.un:focus, .email:focus {
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
    <p class="sign" align="center">Sign up</p>

    <form name="signup" action="" method="post" enctype="multipart/form-data">
      <input class="un" type="text" align="center" placeholder="Username" name="username" id="user_name">
      <input class="pass" type="password" align="center" placeholder="Password" name="pass" id="pass1">
      <input class="email" type="email" align="center" placeholder="Email Id" name="email" id="em1">
      <input type="submit" onclick="validate()" name="submit" class="submit"> 
      <form>    
    </div>
     <?php

      $servername='localhost';
      $username='root';
      $password='';
      $conn=mysqli_connect($servername,$username,$password,'RECIPE');
      //include "My_sql.php";

		if(isset($_POST['submit']))
		{
    
    	$username=$_POST['username'];
    	$pass=$_POST['pass'];
   		$email=$_POST['email'];

    $cquery="SELECT * FROM `user_master` WHERE user_name='$username'";
    $run=mysqli_query($conn,$cquery);
    $data = mysqli_num_rows($run);
    
    if($data!=0)
    {
        echo "<script>alert('User Exists');</script>";
    }
		else{
      $query="INSERT INTO `user_master`(`user_name`,`email`,`password`)  VALUES 
		    ('$username','$email','$pass')";
	  
		$run1=mysqli_query($conn,$query);
		if(!$run1){
			echo "error";
		}
    }
		echo"<script>location.href='index.php'</script>";
		}
	 ?>
</body>
<script>
  function validate()
  {
    var uname = user_name.value;
    var password = pass1.value;
    var email = em1.value;

    var error="";

   reg_email=/^[a-zA-Z0-9_-]{1,}@[a-zA-Z]{2,}[.]{1}[a-zA-Z]{2,6}$/;
   if(!reg_email.test(email) || email=="")
   {
   error+="IMPROPER EMAIL\n";
   }

   reg_uname=/^[a-zA-Z_]{4,}[0-9]{0,}$/;
   if(!reg_uname.test(uname) || uname=="")
   {
    error+="IMPROPER USERNAME\n";
   }

   if(password=="")
   {
    error+="IMPROPER PASSWORD\n";
   }

   if(error!="")
   {
    alert(error);
    event.preventDefault();
   }
   
  }
  </script>

</html>