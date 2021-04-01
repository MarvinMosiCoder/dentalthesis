<?php include('../includes/admin_sidebar.php'); ?>

<h2>Admin</h2>

<?php $query= mysqli_query($conn,"select * from admin where id = '$login_admin'")or die(mysqli_error());
               $row = mysqli_fetch_array($query);     
               ?>
<?php $query= mysqli_query($conn,"select * from admin where id = '$login_admin_id'")or die(mysqli_error());
               $row = mysqli_fetch_array($query);     
               ?>
               

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
   
 <?php 
       $user = mysqli_query($conn,"select * from user ")or die(mysqli_error());
     $users = mysqli_num_rows($user);
     ?>  
     <h1 class="h2">Dashboard</h1>
     <div class="containter">
        <div class="row">
           <div class="col-md-12">
            <div class="card">
               <div class="card-heading">
                  <div class="container-fluid">
                  <form id="form">
                    <div class="col text-center">
                      <h1>Register</h1>
                      <!--display validation errors here -->
                      <span id="msgdisplay"></span>
                      
                    </div>
                  </div>
                  <div class="row d-flex align-items-center mt-4">
                  <input type="hidden" name="id" id="fname" class="form-control" placeholder="Name">
                    <div class="col">
                      <input type="text" name="fname" id="fname" class="form-control" placeholder="Name">
                    </div>
                    <div class="col">
                      <input type="text" name="mname" id="mname" class="form-control" placeholder="Middlename">
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
        
                      <button type="submit" name="register" id="insertbtn" class="__custom-btn btn btn-primary mt-4">Submit</button>
                    </div>
                  </div>
    </form>
                  </div>
               </div>   
            </div>
          </div>
        </div>
      </div>
 
 </main>



        <!-- <div class="container">-->

<?php include('../includes/script.php'); ?> 

<script type="text/javascript">

  $(document).ready(function(){
    $('#insertbtn').click(function(e) {
      e.preventDefault();
      $.ajax({
        method: "post",
        url: "actions/insertClient.php",
        data: $('#form').serialize(),
        dataTypes: "text",
        success: function (response) {
          $('#msgdisplay').text(response);
        }
      })
    })
  });
</script>
 