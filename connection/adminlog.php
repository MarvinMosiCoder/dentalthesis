<?php session_start();
//connect to the database
$conn = mysqli_connect('localhost' , 'root' , '', 'dms');

//errors validation
   $username = "";
   $password = "";
   $errors = array();

//user registration
//   $username = "";
// 	$fname = "";
// 	$mname = "";
// 	$lname = "";
// 	$contact = "";
//   $email = "";
//   $password = "";
//   $id = "";
//   $edit_state = false;
  
//   //if the register button is clicked
//   if (isset($_POST['register'])) {
//       $username =mysqli_real_escape_string  ($conn,$_POST ['username']);
// 			$fname =mysqli_real_escape_string($conn,$_POST ['fname']);
// 			$mname =mysqli_real_escape_string($conn,$_POST ['mname']);
// 			$lname =mysqli_real_escape_string($conn,$_POST ['lname']);
//       $contact =mysqli_real_escape_string($conn,$_POST ['contact']);
//       $email =mysqli_real_escape_string($conn,$_POST ['email']);
//   	  $password_1 = mysqli_real_escape_string($conn,$_POST['password_1']);
//   	  $password_2 = mysqli_real_escape_string($conn,$_POST['password_2']);

//       //Check if there are duplicate data
//       $check = mysqli_query($conn, "SELECT * FROM user where  username = '$username' AND email = '$email'");
//       $checkrows = mysqli_num_rows($check);

//   	  //ensure that form fields are filled properly

//   	 if (empty($username)) {
//   	 	array_push($errors,"Username is required");
//   	 }
//      if (empty($fname)) {
//       array_push($errors,"Fullname is required");
// 		 }
// 		 if (empty($lname)) {
//       array_push($errors,"Fullname is required");
//      }
//      if (empty($contact)) {
//       array_push($errors,"Contact is required");
//      }
//   	 if (empty($email)) {
//   	 	array_push($errors,"Email is required");
//   	 }
//   	 if (empty($password_1)) {
//   	 	array_push($errors,"password is required");
//   	 }
//   	 if ($password_1 !=$password_2) {
//   	 	array_push($errors, "the two password do not match");
//   	 }
//      if ($checkrows > 0) {
//        array_push($errors, "Already Exist");
//      }

//   	 //if there are no errors, save to database
//   	 if (count($errors) == 0) {
//   	 	$password = md5($password_1); //encrypt password before storing in database(security)
//   	 	$sql = "INSERT IGNORE INTO user(id, fname, mname, lname, contact, email, username, password) VALUES ('$id', '$fname',  '$mname', '$lname', '$contact','$email','$username','$password')";
//   	 	mysqli_query($conn,$sql);
//     	echo "<script type=\"text/javascript\">". "alert('Save Success');". "</script>";
//   	 }


// 	}
	
     // log user in from login page
      if (isset($_POST['login'])) {
      	  $username = mysqli_real_escape_string($conn, $_POST['username']);
  	      $password = mysqli_real_escape_string($conn, $_POST['password']);

  	  //ensure that form fields are filled properly

  	      if (empty($username)) {
  	 	      array_push($errors,"<p class = 'alert alert-danger text-center'>Admin account is required</p>");
  	        }
  	      if (empty($password)) {
  	 	      array_push($errors,"<p class = 'alert alert-danger text-center'>Password is required</p>");
  	        }
            

  	        if (count($errors) == 0) {
  	        	// $password = md5($password); //encrypt password before comparing wiht that from database 
  	        	$query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
  	        	$result = mysqli_query($conn,$query);
  	        	if (mysqli_num_rows($result) == 1) {
  	        		// log in user
  	        		$_SESSION['username'] = $username;
                //storing history login
                $sql = "INSERT INTO history_log(username)VALUES('$username')";
                $query_sql = mysqli_query($conn, $sql);
                header('location:dashboard.php'); // Redirecting To Other Page
                
  	        	} else {
  	        		array_push($errors, "<p class = 'alert alert-danger'>Incorrect Username and Password</p>");
  	        		
  	        	}
  	        }
      

					}
	
 ?>