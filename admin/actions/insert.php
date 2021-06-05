<?php
    include("connection.php");
    $client_id =  $_POST["client_id"];
    $client_name =  $_POST["client_name"];
    $treatment_type  =  $_POST["treatment_type"];
    $date_of_appointment  =  $_POST["date_of_appointment"];
    $time_of_appointment  =  $_POST["time_of_appointment"];

    $insert_query = "INSERT INTO appointment(client_id,client_name,treatment_type,date_of_appointment,time_of_appointment,users_status)
    VALUES('".$client_id."','".$client_name."','".$treatment_type."','".$date_of_appointment."','".$time_of_appointment."','1')";
    
    $result = mysqli_query($conn,$insert_query);
    
?>