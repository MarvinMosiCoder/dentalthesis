<?php include('includes/user_sidebar.php'); ?>
<?php $query= mysqli_query($conn,"select * from user where id = '$login_user'")or die(mysqli_error());
                $row = mysqli_fetch_array($query);     
                ?>
<?php $query= mysqli_query($conn,"select * from user where id = '$login_user_id'")or die(mysqli_error());
        $row = mysqli_fetch_array($query); ?>
<?php   
    
        
        $query = "SELECT user.id, CONCAT(user.fname,'&nbsp',  user.mname,'&nbsp' , user.lname) AS userName, user.gender, user.email, user.address,
        user.contact, user.date_of_birth, appointment.treatment_type, appointment.date_of_appointment, appointment.time_of_appointment, appointment.dentist 
         FROM user 
         LEFT JOIN appointment ON user.id = appointment.client_id 
         WHERE client_id = $login_user_id AND appointment.appointment_status = 0 
         ";

        $query_run = mysqli_query($conn, $query);

        while ($row =mysqli_fetch_array($query_run)) { ?>


<main role="main" class="col-md-10 ml-sm-auto col-lg-10 ">
    <h1 class="h2">Schedule</h1>
    <div class="container">
        <div class="card bg-white">
            <div class="card-title">

                <div class="container">
                    <h2>Information</h2>
                    <table class="table table-responsive">
                        <tr>
                            <td class="text-muted">ID</td>
                            <td>:</td>
                            <td style="font-weight: bold;"><?php echo $row['id']; ?></td>
                        </tr>
                        <tr>
                            <td class="text-muted">FULLNAME</td>
                            <td>:</td>
                            <td style="font-weight: bold;"><?php echo $row['userName']; ?>

                            </td>
                        </tr>
                        <tr>
                            <td class="text-muted">Birth Day</td>
                            <td>:</td>
                            <td style="font-weight: bold;"><?php echo $row['gender'] ?></td>
                        </tr>
                        <td class="text-muted">Age</td>
                        <td>:</td>
                        <td style="font-weight: bold;">
                            <?php echo intval(date("Y"))-intval(substr($row['date_of_birth'], 0,4)); ?></td>
                        </tr>
                        <tr>
                            <td class="text-muted">Birth Day</td>
                            <td>:</td>
                            <td style="font-weight: bold;"><?php echo $row['date_of_birth'] ?></td>
                        </tr>
                        <tr>
                            <td class="text-muted">Address</td>
                            <td>:</td>
                            <td style="font-weight: bold;"><?php echo $row['address'] ?></td>
                        </tr>
                        <tr>
                            <td class="text-muted">Contact</td>
                            <td>:</td>
                            <td style="font-weight: bold;"><?php echo $row['contact'] ?></td>
                        </tr>

                    </table>

                    <!--2nd-col-end-->

                    <h2>Appointment Schedule Date</h2>
                    <table class="table table-responsive">
                        <tr>
                            <td class="text-muted">Treatment</td>
                            <td>:</td>
                            <td style="font-weight: bold;"><?php echo $row['treatment_type'] ?></td>
                        </tr>
                        <tr>
                            <td class="text-muted">Date</td>
                            <td>:</td>
                            <td style="font-weight: bold;"><?php echo $row['date_of_appointment'] ?></td>
                        </tr>
                        <tr>
                            <td class="text-muted">Time</td>
                            <td>:</td>
                            <td style="font-weight: bold;"><?php echo $row['time_of_appointment'] ?></td>
                        </tr>
                        <tr>
                            <td class="text-muted">Dentist</td>
                            <td>:</td>
                            <td style="font-weight: bold;"><?php echo $row['dentist'] ?></td>
                        </tr>


                    </table>
                    <form method="post" action="">
                        <input type="hidden" name="id" id="id" value="<?php echo $row['id'];?>" class="form-control"
                            placeholder="Name">
                        <input type="hidden" name="tname" id="tname" value="<?php echo $row['treatment_type'];?>"
                            class="form-control" placeholder="Name">
                        <input type='submit' id='submit' name='submit' class="btn btn-danger"
                            value='Cancel Appointment'>
                    </form>
                </div>
                <!--3rd-col-end-->
            </div>
            <!--row-end-->
            <hr>
        </div>
    </div>
    <!--end-card -->
    </div>
    <?php } ?>
    <hr>







    </div>
</main>
<!-- end-of-main -->

<?php include('../includes/script.php'); ?>

<?php

      if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $tname = $_POST['tname'];
        $query = "UPDATE appointment SET appointment_status= 1
                      WHERE client_id = '$id' AND treatment_type = '$tname'";
                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                    ?>
<script type="text/javascript">
alert("Cancel Successfull.");
window.location = "view_sched.php";
</script>
<?php
             }               
?>