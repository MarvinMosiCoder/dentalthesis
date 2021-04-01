<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">RTN Dental Clinic</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <?php $query= mysqli_query($conn,"select * from user where id = '$login_user'")or die(mysqli_error());
               $row = mysqli_fetch_array($query);     
               ?>   
               
              
    <li class="nav-item text-nowrap">
    <h4 class="text-white text-center">Welcome! <strong style="color: #00FF7F"> <?php echo $login_user;?></strong></h4>
    </li>
 
</nav>