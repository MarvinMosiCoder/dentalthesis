<?php
  include("connection.php");
  
  if (isset($_POST['dismiss'])) {
    $client_id = $_POST['client_id'];
    $sql = "UPDATE user SET status = 0 
    WHERE id = '$client_id'";
    $sql2 = "UPDATE appointment SET appointment_status = 1 
    WHERE client_id = '$client_id'";
    $result = mysqli_query($conn,$sql);
    $result2 = mysqli_query($conn,$sql2);
   if ($result) {
          $client_id = $_POST['client_id'];
          $name_client = $_POST['name_client'];
          $type_of_treatment = $_POST['type_of_treatment'];
          $name_of_dentist = $_POST['name_of_dentist'];
          $date_of = date('Y-m-d', strtotime($_POST['date_of']));
          $time_of = $_POST['time_of'];
          $appointment_settle = "INSERT INTO appointment_history(client_id, name_client, type_of_treatment, name_of_dentist, date_of,time_of) VALUES ('$client_id', '$name_client', '$type_of_treatment', '$name_of_dentist' ,'$date_of','$time_of')";
          $apppointment_result = mysqli_query($conn, $appointment_settle);

           echo "<script type=\"text/javascript\">". "alert('Dismiss'); window.history.go(-2);" . "</script>";
         } else{
           echo "<script type=\"text/javascript\">". "alert('Failed to Dismiss'); window.history.go(-2);" . "</script>";
         }
  
 }

?>