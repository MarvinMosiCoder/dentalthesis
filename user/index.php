<?php include('../connection/configuration.php'); 
   
if ((isset($_SESSION['username']) != '')) 
{
header('location:dashboard.php');
}
 ?>
   <!-- Icons -->
   <link rel="stylesheet" href="../bootstrap-4.5.3/dist/css/bootstrap.min.css">
   <link href="../fontawesome/font-awesome.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
   <link rel="stylesheet" href="../css/login.css"> 
   
    <div class="container">
        <div class="forms-container">
            <form action="index.php" class="sign-in-form" method="post">
              <h2 class="title">Sign in</h2>
               <!--display validation errors here -->
               <?php include('errors.php')  ?>
              <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" name="username" placeholder="Username" />
              </div>
              <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password" />
              </div>
              <input type="submit" name="login" value="Login" class="btn solid" />
              <p class="social-text">Or Sign in with social platforms</p>
              <div class="social-media">
                <a href="#" class="social-icon">
                  <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="social-icon">
                  <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="social-icon">
                  <i class="fab fa-google"></i>
                </a>
                
              </div>
            <a href="signup.php
            ">Create an Account Here!</a>
         
        </div>
  
       

      
      