<?php include('../includes/admin_sidebar.php'); ?>


<?php $query= mysqli_query($conn,"select * from admin where id = '$login_admin'")or die(mysqli_error());
               $row = mysqli_fetch_array($query);     
               ?>
<?php $query= mysqli_query($conn,"select * from admin where id = '$login_admin_id'")or die(mysqli_error());
               $row = mysqli_fetch_array($query);     
               ?>
               
    <main role="main" class="col-md-12">
     <br>
     <br>
      <div class="container">
        <div class="card">
        <h2>Registered Client</h2>
        <table class="table table-bordered">
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
                <th scope="col">Status</th>

                <th scope="col">View</th>
                <th scope="col">Dismiss</th>
                
                </tr>
            </thead>

            <tbody>
            <?php   
            $query = "SELECT user.id, CONCAT(user.fname,'&nbsp',  user.mname,'&nbsp' , user.lname) AS userName, user.gender, user.email, user.address,
            user.contact, user.date_of_birth, user.status, appointment.treatment_type, appointment.date_of_appointment, appointment.time_of_appointment 
             FROM user 
             LEFT JOIN appointment ON user.id = appointment.client_id";

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
                <?php if ($row['status'] == 0): ?>
                <td style="background-color: #00FF7F;">Dissmiss</td>
                <?php elseif ($row['status'] == 1): ?>
                <td style="background-color: #f44336; color: #000;">Pending</td>
                <?php endif ?>


                 
                <td>
                    <a class="btn btn-info"  href="view_residence.php?edit=<?php echo $row ['residenceID'];?>"><i class="fa fa-eye"></i></a> 
                </td>
                <td class="edit">
                    <!--ModalUpdateStart-->
                    <a class="btn btn-success" href="residence_edit.php?edit=<?php echo $row['residenceID'];?>"><i class="fa fa-edit"></i></a>
                    <!-- <form action="residence_edit.php" method="POST">
                    <input type="hidden" name="edit_id" value="<?php echo $row['residenceID']?>">
                    <button type="submit" name="edit_data_btn" class="btn btn-warning" ><i class="fa fa-edit"></i></button> 
                    </form>  -->
                </td>
                </tr>
                <?php } ?> 
            </tbody>
            </table>
       </div>
    </main>

 
  
                
                
                
                
                
 


        <!-- <div class="container">

<?php include('../includes/script.php'); ?> 