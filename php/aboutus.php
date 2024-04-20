<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>About Us</title>
  <link rel="stylesheet" href="css/style.css" >
  <style>


* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: Arial, sans-serif;
}

.title {
  background-image: url('images/abt_us.jpg');
  height: 400px;
  display: flex;
  justify-content: center;
  align-items: center;
}

.title h1 {
  font-size: 48px;
  color: black;
  text-align: center;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}

.content {
  width: 100%;
  max-width: 960px;
  margin: 50px auto;  
  padding: 0 20px;
}

.content h2 {
  font-size: 32px;
  margin-bottom: 20px;
}

.content p {
  font-size: 18px;
  line-height: 1.5;
  margin-bottom: 20px;
}

.team {             
  display: flex;
  margin-top: 50px;
}

.member {
  width: 30%;
  margin-bottom: 30px;
  text-align: center;
}

.member img {
  width: 130px;
  height: auto;
  border-radius: 50%;
  margin-bottom: 10px;
  border: solid #ffc8dd;
  border-width: 3px;
}

.member h3 {
  font-size: 24px;
  margin-bottom: 5px;
}

.member p {
  font-size: 18px;
  color: #666;
}

.member img:hover {
  transition: transform 0.3s;
  transform: scale(1.1);
}
  </style>

</head>
<body>
  
 <?php include 'resources/header.php'; ?>

    <section class="title">
      <h1>About Us</h1>
    </section>

    <section class="content">
      <h2>Our Story</h2>
      <p>We indian people are just in love with different different food. As area changes the taste will also change. 
        So by vision of sharing recipe of different taste to all over world me and my friend will decided to go with this website idea.</p>
      
      <h2>Our Team</h2>

      <div class="team">
        <div class="member">
          <img src="images/aman.png" alt="Member 1">
          <h3>Aman Patel</h3>
          <p>21CP001</p>
        </div>

        <div class="member">
          <img src="logo1.png" alt="Member 2">
          <h3>Vraj Prajapati</h3>
          <p>21CP010</p>
        </div>

      </div>
    </section>

  <footer>
    <p>&copy; BVMite Project</p>
  </footer>
</body>
</html>
