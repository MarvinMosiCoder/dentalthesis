<?php include('../includes/admin_sidebar.php'); ?>


<?php $query= mysqli_query($conn,"select * from admin where id = '$login_admin'")or die(mysqli_error());
               $row = mysqli_fetch_array($query);     
               ?>
<?php $query= mysqli_query($conn,"select * from admin where id = '$login_admin_id'")or die(mysqli_error());
               $row = mysqli_fetch_array($query);     
               ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <div class="card" style="overflow-x: auto;">
            <h2>Registered Client</h2>
            <table class="table table-bordered" id="users" width="100%" cellspacing="1">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Fullname</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Age</th>
                        <th scope="col">Birthday</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Contact</th>
                        <th scope="col">TreatMent</th>
                        <th scope="col">Appointment Date Schedule</th>
                        <th scope="col">Appointment Time Schedule</th>
                        <th scope="col">User Status</th>
                        <th scope="col">Appointment Status</th>
                        <th scope="col">Add Schedule</th>
                        <th scope="col">View</th>
                        <th scope="col">Dismiss</th>

                    </tr>
                </thead>

                <tbody>
                    <?php   
            $query = "SELECT user.id, CONCAT(user.fname,'&nbsp',  user.mname,'&nbsp' , user.lname) AS userName, user.gender, user.email, user.address,
            user.contact, user.date_of_birth, user.status, appointment.treatment_type, appointment.date_of_appointment, appointment.time_of_appointment, appointment.appointment_status 
             FROM user 
             LEFT JOIN appointment ON user.id = appointment.client_id
             WHERE user.status = 1";

            $query_run = mysqli_query($conn, $query);

            while ($row =mysqli_fetch_array($query_run)) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['userName'];; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo intval(date("Y"))-intval(substr($row['date_of_birth'], 0,4)); ?></td>
                        <td><?php echo $row['date_of_birth']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['contact']; ?></td>
                        <td><?php echo $row['treatment_type']; ?></td>
                        <td><?php echo $row['date_of_appointment']; ?></td>
                        <td><?php echo $row['time_of_appointment']; ?></td>
                        <td style="display: none;"><?php echo $row['status']; ?></td>
                        <td style="display: none;"><?php echo $row['appointment_status']; ?></td>
                        <?php if ($row['status'] == 0): ?>
                        <td style="background-color: #f44336;">Dissmiss</td>
                        <?php elseif ($row['status'] == 1): ?>
                        <td style="background-color: #00FF7F; color: #000;">Active</td>
                        <?php endif ?>
                        <?php if ($row['appointment_status'] == 0): ?>
                        <td style="background-color: #00FF7F;">For Schedule</td>
                        <?php elseif ($row['appointment_status'] == 1): ?>
                        <td style="background-color: #f44336; color: #000;">Cancel Appointment</td>
                        <?php elseif ($row['appointment_status'] == ''): ?>
                        <td style="background-color: #f44336; color: #000;">No Schedule</td>
                        <?php endif ?>

                        <td>
                            <a class="btn btn-info" href="appointment.php?sched=<?php echo $row ['id'];?>"><i
                                    class="fa fa-clipboard-list"></i></a>
                        </td>
                        <td>
                            <a class="btn btn-info" href="view_residence.php?edit=<?php echo $row ['id'];?>"><i
                                    class="fa fa-eye"></i></a>
                        </td>
                        <td>
                            <!-- send sms -->
                            <a class="btn btn-success" href="dismiss_appointment.php?edit=<?php echo $row['id'];?>"><i
                                    class="fa fa-edit"></i></a>
                            <!--send sms Modal Blotter-->

                            <div class="modal fade" id="dismissModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="close"><span aria-hidden="true">&times;</span></button>
                                            <h3 class="text-center">New Settlement Report</h3>
                                        </div>
                                        <div class="modal-body">
                                            <?php include('dismiss_appointment.php'); ?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!--Modal-end-->
                            <!--Modal-end-->
                        </td>
                        <td>

                            <!-- <a class="btn btn-success" href="dismiss_appointment.php?edit=<?php echo $row['id'];?>"><i
                                    class="fa fa-edit"></i></a> -->
                            <!-- <form action="residence_edit.php" method="POST">
                    <input type="hidden" name="edit_id" value="<?php echo $row['id']?>">
                    <button type="submit" name="edit_data_btn" class="btn btn-warning" ><i class="fa fa-edit"></i></button> 
                    </form>  -->
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
</main>
<!-- <div class="container">-->

<?php include('../includes/script.php'); ?>
<script>
$(document).ready(function() {
    var table = $('#users').DataTable({

        /* "RowCallback":function(nrow, adata, iDisplayIndex,iDisplayIndexFull ){
           if (aData[10] == "NO") {
            $('td' , nRow).css('background-color','Red');
           }
           else if (aData[10] == "YES") {
             $('td' , nRow).css('background-color','Green');
           }
         }*/
    });
});
</script>