<?php include('includes/user_sidebar.php'); ?>

<!-- Main  Warpper -->

            <?php $query= mysqli_query($conn,"select * from user where id = '$login_user'")or die(mysqli_error());
               $row = mysqli_fetch_array($query);     
               ?>
            <?php $query= mysqli_query($conn,"select * from user where id = '$login_user_id'")or die(mysqli_error());
               $row = mysqli_fetch_array($query);     
               ?>
              
             

   <main role="main" class="col-md-12">
        <h1 class="h2">Dashboard</h1>
      <div class="container d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
      <div class="card">
        <div class="card-body">
        <div class="card-title"><h1>Change Password</h1></div>
<div class="profile-input-field">
        <h3>Please Fill-out All Fields</h3>
        <form method="post" action="#" >
          <div class="form-group">
            <label>Fullname</label>
            <input type="password" class="form-control" name="old_password" style="width:20em;" placeholder="Enter your Old Password"  required />
          </div>
          <div class="form-group">
            <label>Fullname</label>
            <input type="password" class="form-control" name="new_password" style="width:20em;" placeholder="Enter your New Password"  required />
          </div>
          <div class="form-group">
            <label>Fullname</label>
            <input type="password" class="form-control" name="again_password" style="width:20em;" placeholder="Confirm Password"  required />
          </div>
         
          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" style="width:20em; margin:0;"><br><br>
           
          </div>
        </form>
        </div>
      </div>
      
      </div>  
          
    </main>

    </div>
    </div>


    <?php

      if(isset($_POST['submit'])){
        $OldPassword = md5($_POST['old_password']);
        $NewPassword = md5($_POST['new_password']);
        $AgainPassword = md5($_POST['again_password']);
        
      $query = "UPDATE user SET password = '$AgainPassword'
                      WHERE password = '$OldPassword' AND id = $login_user_id  ";
                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                    ?>
                     <script type="text/javascript">
            alert("Update Successfull.");
            window.location = "update_user.php";
        </script>
        <?php
             }               
?>  
           

      


                   
              
               
          
     
        <!-- End Main Wrapper -->


<?php include('../includes/script.php'); ?>