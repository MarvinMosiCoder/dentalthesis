<?php
$conn = mysqli_connect('localhost' , 'root' , '', 'dms');
if(isset($_POST['register'])){
  $client_id = $_POST['client_id'];
  $client_name = $_POST['client_name'];
  $treatment_type = $_POST['treatment_type'];
  $dentist = $_POST['dentist'];
  $date_of_appointment = date('Y-m-d', strtotime($_POST['date_of_appointment']));
  $time_of_appointment = date('h:i:s', strtotime($_POST['time_of_appointment']));
  
  //$checkrows = array();
  $checkResult = array();
  //$checkFinalResult = array();
  //check time in appointment
  $checkTime = mysqli_query($conn, "SELECT time_of_appointment as ta FROM appointment where appointment_status = 0");
  while($checkrows = mysqli_fetch_assoc( $checkTime ) ) {
    array_push( $checkResult, $checkrows );
  }
  // var_dump($checkResult);
  // exit(1);
  if (in_array($time_of_appointment,array_column($checkResult,'ta'))) {
     echo "<script type=\"text/javascript\">". "alert('Time Already Exist'); window.history.go(-1);" . "</script>";
     exit();
  } else {
    $query = "INSERT INTO appointment(client_id,client_name, treatment_type, date_of_appointment, time_of_appointment,users_status, appointment_status,dentist) 
    VALUES('$client_id','$client_name','$treatment_type', '$date_of_appointment', '$time_of_appointment',1,0,'$dentist')";
  
    $result = mysqli_query($conn,$query);
  
  if ($result) {
    echo "<script type=\"text/javascript\">". "alert('Save Success'); window.history.go(-2);" . "</script>";
  }
  else {
      echo "<script type=\"text/javascript\">". "alert('Failed Save'); window.history.go(-2);" . "</script>";
  }
  }
}       
?>