<?php include('includes/user_sidebar.php'); ?>

<!-- Main  Warpper -->

<?php $query= mysqli_query($conn,"select * from user where id = '$login_user'")or die(mysqli_error());
               $row = mysqli_fetch_array($query);     
               ?>
<?php $query= mysqli_query($conn,"select * from user where id = '$login_user_id'")or die(mysqli_error());
               $row = mysqli_fetch_array($query);     
               ?>

<!-- Appoint Schedule Count -->
<?php   
     $query = "SELECT user.id, CONCAT(user.fname,'&nbsp',  user.mname,'&nbsp' , user.lname) AS userName, user.gender, user.email, user.address,
        user.contact, user.date_of_birth, appointment.treatment_type, appointment.date_of_appointment, appointment.time_of_appointment 
         FROM user 
         LEFT JOIN appointment ON user.id = appointment.client_id 
         WHERE client_id = $login_user_id AND appointment.appointment_status = 0 
         ";

        $query_run = mysqli_query($conn, $query);
        $schedule = mysqli_num_rows($query_run) 
        
?>
<!-- Appoint History Count -->
<?php   
     $query_history = "SELECT * FROM user 
         LEFT JOIN appointment_history ON user.id = appointment_history.client_id 
         WHERE client_id = $login_user_id";

        $query_run_history = mysqli_query($conn, $query_history);
        $history = mysqli_num_rows($query_run_history) 
        
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

    <h1 class="h2">Dashboard</h1>
    <div class="containter">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-heading">
                        <div class="container-fluid">
                            <div class="row-fluid">
                                <div class="span3"></br>
                                    <i class="fa fa-users fa-5x"></i><br />
                                </div>
                                <div class="span8 text-right">
                                    <div class="huge"><?php echo $schedule; ?></div>
                                    <div>
                                        <h3>Schedule</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="view_studs.php">
                    <div class="modal-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="icon-chevron-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>


            <div class="col-lg-4">
                <div class="card">
                    <div class="card-heading">
                        <div class="container-fluid">
                            <div class="row-fluid">
                                <div class="span3"></br>
                                    <i class="fa fa-users fa-5x"></i><br />
                                </div>
                                <div class="span8 text-right">
                                    <div class="huge"><?php echo $history; ?></div>
                                    <div>
                                        <h3>History of Schedule</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="view_studs.php">
                    <div class="modal-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="icon-chevron-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
            <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>


</main>

</div>
</div>


<!-- <div class="container">
           

           


                      
      </div> 
      </div> -->
<!-- end row -->










<!-- End Main Wrapper -->


<?php include('../includes/script.php'); ?>