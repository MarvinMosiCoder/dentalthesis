<?php include('check.php'); ?>
<?php include('header.php'); ?>
<?php include('navbar.php'); ?>

        <!-- Sidebar -->
<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="dashboard.php">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="appointment.php">
              <span data-feather="file"></span>
             Appointment
            </a>
          </li>

          
          <li class="nav-item">
            <a class="nav-link" href="view_sched.php">
              <span data-feather="eye"></span>
              View Schedule
            </a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2"></span>
              Reports
            </a>
          </li>
        
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Saved reports</span>
          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Year-end sale
            </a>
          </li>
          <li class="nav-item">
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle">
                <span data-feather="settings"></span>
                settings</a>
                
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li class="nav-item">
                        <a class="nav-link" href="update_user.php">Update Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="update_password.php">Change Password</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="./logout.php">
                    <span data-feather="log-out"></span>Sign out</a>
                    </li>
                </ul>
            </li>

        </ul>
      </div>
    </nav>

 
        
        <!-- End Sidebar -->

<?php include('script.php'); ?>