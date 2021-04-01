<?php
$conn = mysqli_connect('localhost' , 'root' , '', 'dms');
if(isset($_POST['register'])){
  $client_id = $_POST['client_id'];
  $treatment_type = $_POST['treatment_type'];
  $date_of_appointment = date('Y-m-d', strtotime($_POST['date_of_appointment']));
  $time_of_appointment = $_POST['time_of_appointment'];
  

  $query = "INSERT INTO appointment(client_id, treatment_type, date_of_appointment, time_of_appointment) 
  VALUES('$client_id','$treatment_type', '$date_of_appointment', '$time_of_appointment')";

  $result = mysqli_query($conn,$query);

if ($result) {
  echo "<script type=\"text/javascript\">". "alert('Save Success'); window.history.go(-1);" . "</script>";
}
else {
    echo "<script type=\"text/javascript\">". "alert('Failed Save'); window.history.go(-1);" . "</script>";
}
}             
?>  