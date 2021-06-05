<?php include('../connection/configuration.php'); 
      include('../includes/header.php');
if ((isset($_SESSION['username']) != '')) 
{
header('location:dashboard.php');
}
 ?>
   
   
          <section class="registration">
            <div class="container">
              <div class="__custom-row row justify-content-center">
                <div class="col-12 col-md-8 col-lg-8 col-xl-6">
                  <div class="row">
                  <form class="form-auth-small" action="index.php" method="post">
                    <div class="col text-center">
                      <h1>Register</h1>
                      <!--display validation errors here -->
                    <?php include('errors.php')  ?>
                      <p class="text-h3">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. </p>
                    </div>
                  </div>
                  <div class="row d-flex align-items-center mt-4">
                    <div class="col">
                      <input type="text" name="fname" class="form-control" placeholder="Name">
                    </div>
                    <div class="col">
                      <input type="text" name="mname" class="form-control" placeholder="Middlename">
                    </div>
                    <div class="col">
                      <input type="text" name="lname" class="form-control" placeholder="Lastname">
                    </div>
                  </div>
                  <div class="row align-items-center mt-4">
                  <div class="col">
                      <input type="text" name="username" class="form-control" placeholder="Username">
                  </div>
                    <div class="col">
                      <input type="text" name="contact" class="form-control" placeholder="Contact">
                    </div>
                  </div>
                  <div class="row align-items-center mt-4">
                    <div class="col">
                      <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                  </div>
                  <div class="row align-items-center mt-4">
                    <div class="col">
                      <input type="password" name="password_1" class="form-control" placeholder="Password">
                    </div>
                    <div class="col">
                      <input type="password" name="password_2" class="form-control" placeholder="Confirm Password">
                    </div>
                  </div>
                  <div class="row justify-content-start mt-4">
                    <div class="col">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input">
                          I Read and Accept <a href="https://www.froala.com">Terms and Conditions</a>
                        </label>
                      </div>
        
                      <button type="submit" name="register" class="__custom-btn btn btn-primary mt-4">Submit</button>
                    </div>
                  </div>
    </form>
                </div>
              </div>
            </div>
          </section>
            
      
       

          <?php include('../includes/script.php'); ?>