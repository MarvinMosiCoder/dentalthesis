<?php include('../includes/admin_sidebar.php'); ?>
<?php   
  require_once 'actions/connection.php';
  if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit_state = true;
    $rec = mysqli_query($conn, "SELECT user.id as client_id, CONCAT(user.fname,' ',  user.mname, ' ' , user.lname) AS userName, user.gender, user.email, user.address,
    user.contact, user.date_of_birth, user.status, appointment.treatment_type as treatment, appointment.date_of_appointment as date_of, appointment.time_of_appointment as time_of, appointment.appointment_status 
     FROM user 
     LEFT JOIN appointment ON client_id = appointment.client_id
     WHERE  user.id = $id");
    $record = mysqli_fetch_array($rec);    
    $client_id = $record ['client_id'];
    $name_of_client = $record ['userName'];
    $type_of_treatment = $record ['treatment'];
    $date = $record ['date_of'];
    $time = $record ['time_of'];
  }
?>


<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <h2>Dismiss Apointment Client</h2>
        <br>
        <form action="actions/dismiss.php" method="POST">
            <label>Name of Patient</label>
            <input type="text" name="client_id" value="<?php echo $client_id; ?>" class="form-control"
                style="display:none">
            <br>

            <input type="text" name="name_client" value="<?php echo $name_of_client; ?>" class="form-control">
            <br>
            <label>Type Of Treatment</label>

            <input type="text" name="type_of_treatment" value="<?php echo $type_of_treatment; ?>" class="form-control">
            <br>

            <label>Dentist</label>
            <select name="name_of_dentist" class="form-control">
                <option>Doctor Name 1</option>
                <option>Doctor Name 2</option>
            </select>
            <br>
            <label>Date</label>
            <input type="date" name="date_of" class="form-control">
            <br>
            <label>Time</label>
            <input type="time" name="time_of" class="form-control">
            <br>
            <input type="submit" name="dismiss" value="Dismiss" class="btn btn-primary">
        </form>

    </div>
    </div>
    </div>
</main>
<!-- jQeury datepicker -->

<script>
$(function() {
    $("#datehearing").datepicker();
})
</script>