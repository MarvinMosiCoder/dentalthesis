<?php
$conn = mysqli_connect('localhost' , 'root' , '', 'dms');
  //include("connection.php");
    $id = $_POST['id'];
    // $deactive = "UPDATE inf SET active=0 where n_id IN(".$ids.")";
    $deactive = "UPDATE appointment SET appointment_status=1 where client_id= ".$id." ";
    
    $result = mysqli_query($conn,$deactive);
    echo mysqli_error($conn);

?>