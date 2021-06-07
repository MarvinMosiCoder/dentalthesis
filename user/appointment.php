<?php include('includes/user_sidebar.php'); ?>

<!-- Main  Warpper -->
<main role="main" class="col-md-12">
    <?php $query= mysqli_query($conn,"select * from user where id = '$login_user_id'")or die(mysqli_error());
               $row = mysqli_fetch_array($query);     
               ?>



    <!-- start of main dashboard -->

    <section class="registration">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-8 col-xl-6">
                    <div class="row">
                        <form class="form-auth-small" action="action/save_appoinment.php" method="post">
                            <div class="col text-center">
                                <h1>add appointment</h1>

                                <p class="text-h3"> </p>
                            </div>
                    </div>
                    <div class="row d-flex align-items-center mt-4">

                        <input type="hidden" name="client_id" value="<?php echo $login_user_id;?>" class="form-control"
                            placeholder="Name">
                        <input type="hidden" name="client_name" value="<?php echo $client_name;?>" class="form-control"
                            placeholder="Name">

                        <div class="col">
                            <input type="text" name="treatment_type" class="form-control"
                                placeholder="type of treatment">
                        </div>
                        <div class="col">
                            <input type="date" name="date_of_appointment" class="form-control" placeholder="Lastname">
                        </div>
                    </div>
                    <div class="row align-items-center mt-4">
                        <div class="col">
                            <input type="time" name="time_of_appointment" class="form-control" placeholder="Username">
                        </div>
                    </div>
                    <br>
                    <label>Dentist</label>
                    <select name="dentist" class="form-control">
                        <option value="Dentist Name 1">Dentist Name 1</option>
                        <option value="Dentist Name 2">Dentist Name 2</option>
                    </select>
                    <button type="submit" name="register" class="btn btn-success mt-4">Submit</button>

                </div>
                </form>
            </div>
        </div>
        </div>
    </section>

    <!-- end of main dashboard -->
</main>
<!-- End Main Wrapper -->



<?php include('../includes/script.php'); ?>