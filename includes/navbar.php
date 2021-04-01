<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap pl-3 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">RTN Dental Clinic</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <?php $query= mysqli_query($conn,"select * from admin where id = '$login_admin'")or die(mysqli_error());
               $row = mysqli_fetch_array($query);     
               ?>   
    <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
    <h4 class="text-white text-center">Welcome! <strong style="color: #00FF7F"> <?php echo $login_admin;?></strong></h4>
    </li>
  </ul>
              
    <ul class="nav navbar-nav navbar-right" style="padding-left: 20px">
      <li class="dropdown">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span><i class="fa fa-bell" style="color: white; font-size:20px"></i></a>
       <ul class="dropdown-menu"></ul>
      </li>
     </ul>                         
 
</nav>