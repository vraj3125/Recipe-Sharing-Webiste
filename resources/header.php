<nav class="nav_bar h_nav">
        
        <ul id="navigation" class="visib">
           <a href="index.php" ><img src="images/logo.png" id="logo"></a>
            <li><a href="index.php">Home</a></li>
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href="addRecipe.php">Add Recipe</a></li>
            <?php 
                if(!isset($_SESSION['user_id'] )){
            ?>
            <li><a href="login.php">Login</a></li>
            <li><a href="signup.php">Signup</a></li>

             <?php } else{  ?>
            <li><a href="logout.php">logout</a></li>
            <?php } ?>
        </ul>

        <div class="search_nav visib" >
            
        </div>
        
        <div class="burger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </nav>

    <script src="resources/navbar.js"></script>