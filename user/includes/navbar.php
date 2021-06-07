<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">RTN Dental Clinic</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
        data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <?php $query= mysqli_query($conn,"select * from user where id = '$login_user'")or die(mysqli_error());
               $row = mysqli_fetch_array($query);              
    ?>
    <?php $query= mysqli_query($conn,"select * from user where id = '$login_user_id'")or die(mysqli_error());
        $row = mysqli_fetch_array($query); ?>

    <?php
       $find_notifications = "SELECT user.id, CONCAT(user.fname,'&nbsp',  user.mname,'&nbsp' , user.lname) AS userName, user.gender, user.email, user.address,
       user.contact, user.date_of_birth, appointment.treatment_type, appointment.date_of_appointment as check_date, appointment.time_of_appointment, appointment.dentist 
        FROM user 
        LEFT JOIN appointment ON user.id = appointment.client_id 
        WHERE client_id = $login_user_id AND appointment.appointment_status = 0 
        ";
       $result = mysqli_query($conn,$find_notifications);
       $count_active = '';
       $notifications_data = array(); 
        while($rows = mysqli_fetch_assoc($result)){
                $count_active = mysqli_num_rows($result);
                $notifications_data[] = array(
                            "check_date" => $rows['check_date'],
                );
        }
        // print_r($notifications_data);
        // exit();     
        ?>
    <?php 
    $Date = date("Y-m-d");
    if($notifications_data[0]['check_date'] == date('Y-m-d', strtotime($Date. ' + 3 days'))){?>
    <li class="nav-item text-nowrap">
        <h5 class="text-white text-center"><strong style="color: #F94552">Your Appointment Schedule date is
                near!!!</strong></h5>
    </li>
    <?php }else if($notifications_data[0]['check_date'] == date('Y-m-d', strtotime($Date. ' + 1 days'))){?>
    <li class="nav-item text-nowrap">
        <h4 class="text-white text-center"><strong style="color: #00FF7F">Your Appointment is Tomorrow!!!</strong></h4>
    </li>
    <?php }else if($notifications_data[0]['check_date'] == date('Y-m-d', strtotime($Date))){?>
    <li class="nav-item text-nowrap">
        <h4 class="text-white text-center"><strong style="color: #00FF7F">Your Appointment is Today!!!</strong></h4>
    </li>
    <?php }else{ ?>
    <?php } ?>

    <li class="nav-item text-nowrap">
        <h4 class="text-white text-center">Welcome! <strong style="color: #00FF7F"> <?php echo $login_user;?></strong>
        </h4>
    </li>


</nav>