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
        <div class="card-title"><h1>User Profile</h1></div>
<div class="profile-input-field">
        <h3>Please Fill-out All Fields</h3>
        <form method="post" action="#" >
          <div class="form-group">
            <label>Fullname</label>
            <input type="text" class="form-control" name="fname" style="width:20em;" placeholder="Enter your Fullname" value="<?php echo $row['fname']; ?>" required />
          </div>
          <div class="form-group">
            <label>Fullname</label>
            <input type="text" class="form-control" name="mname" style="width:20em;" placeholder="Enter your Fullname" value="<?php echo $row['mname']; ?>" required />
          </div>
          <div class="form-group">
            <label>Fullname</label>
            <input type="text" class="form-control" name="lname" style="width:20em;" placeholder="Enter your Fullname" value="<?php echo $row['lname']; ?>" required />
          </div>
          <div class="form-group">
            <label>Gender</label>
            <input type="text" class="form-control" name="gender" style="width:20em;" placeholder="Enter your Gender" required value="<?php echo $row['gender']; ?>" />
          </div>
          <div class="form-group">
            <label>Date_of_birth</label>
            <input type="date" class="form-control" name="date_of_birth" style="width:20em;" placeholder="Enter your Age" value="<?php echo $row['date_of_birth']; ?>">
          </div>
          <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" name="address" style="width:20em;" required placeholder="Enter your Address" value="<?php echo $row['address']; ?>"></textarea>
          </div>
          <div class="form-group">
            <label>Contact</label>
            <input type="text" class="form-control" name="contact" style="width:20em;" required placeholder="Enter your Address" value="<?php echo $row['contact']; ?>"></textarea>
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
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];
        $date_of_birth = date('Y-m-d', strtotime($_POST['date_of_birth']));
        $address = $_POST['address'];
        $contact = $_POST['contact'];
      $query = "UPDATE user SET fname = '$fname', mname = '$mname', lname = '$lname',
                      gender = '$gender', date_of_birth = '$date_of_birth', address = '$address', contact = '$contact'
                      WHERE id = '$login_user_id'";
                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                    ?>
                     <script type="text/javascript">
            alert("Update Successfull.");
            window.location = "dashboard.php";
        </script>
        <?php
             }               
?>  
           

      


                   
              
               
          
     
        <!-- End Main Wrapper -->


<?php include('../includes/script.php'); ?>