<?php
$conn = mysqli_connect('localhost' , 'root' , '', 'dms');

//if the register button is clicked
    $username =mysqli_real_escape_string  ($conn,$_POST ['username']);
    $id =mysqli_real_escape_string($conn,$_POST ['id']);
    $fname =mysqli_real_escape_string($conn,$_POST ['fname']);
		$mname =mysqli_real_escape_string($conn,$_POST ['mname']);
		$lname =mysqli_real_escape_string($conn,$_POST ['lname']);
		$contact =mysqli_real_escape_string($conn,$_POST ['contact']);
		$email =mysqli_real_escape_string($conn,$_POST ['email']);
		$password_1 = mysqli_real_escape_string($conn,$_POST['password_1']);
		$password_2 = mysqli_real_escape_string($conn,$_POST['password_2']);

      //Check if there are duplicate data
      $check = mysqli_query($conn, "SELECT * FROM user where  username = '$username' AND email = '$email'");
      $checkrows = mysqli_num_rows($check);
      if($checkrows > 0){
        echo "Already Exist";
      }else {
  	 	$password = md5($password_1); //encrypt password before storing in database(security)
  	 	$sql = "INSERT IGNORE INTO user(id, fname, mname, lname, contact, email, username, password, status) VALUES ('$id', '$fname',  '$mname', '$lname', '$contact','$email','$username','$password', 0)";
       $query =	mysqli_query($conn,$sql);

        echo "Save Successful";
      }
     
     ?>