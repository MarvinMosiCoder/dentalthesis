<?php include('../includes/admin_sidebar.php'); ?>

<h2>Admin</h2>

<?php $query= mysqli_query($conn,"select * from admin where id = '$login_admin'")or die(mysqli_error());
               $row = mysqli_fetch_array($query);     
               ?>
<?php $query= mysqli_query($conn,"select * from admin where id = '$login_admin_id'")or die(mysqli_error());
               $row = mysqli_fetch_array($query);     
               ?>
               

               <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
   
 <?php 
       $user = mysqli_query($conn,"select * from user ")or die(mysqli_error());
     $users = mysqli_num_rows($user);
     ?>  
     <h1 class="h2">Dashboard</h1>
     <div class="containter">
     <div class="row">
           <div class="col-md-4">
            <div class="card">
               <div class="card-heading">
                  <div class="container-fluid">
                   <div class="row-fluid">
                           <div class="span3"></br>
                              <i class="fa fa-users fa-5x"></i><br/>
                           </div>
                           <div class="span8 text-right">
                                 <div class="huge"><h3><strong><?php echo $users; ?></strong></h3></div>
                                 <div><h3>All Registered Patients</h3></div>
                           </div>
                   </div>
                  </div> 
              </div>
            </div>

                         <a href="view_studs.php">                
                             <div class="modal-footer">
                                 <span class="pull-left">View Details</span>
                                 <span class="pull-right"><i class="icon-chevron-right"></i></span>
                                 <div class="clearfix"></div>
                             </div>                
                         </a>
         </div>
     

    <?php 
     $appoint = mysqli_query($conn,"select * from appointment ")or die(mysqli_error());
     $appointment = mysqli_num_rows($appoint);
     ?>
     <div class="col-lg-4">
            <div class="card">
               <div class="card-heading">
                  <div class="container-fluid">
                   <div class="row-fluid">
                           <div class="span3"></br>
                              <i class="fa fa-users fa-5x"></i><br/>
                           </div>
                           <div class="span8 text-right">
                           <div class="huge"><h3><strong><?php echo $appointment; ?></strong></h3></div>
                                 <div><h3>All Registered Appointments</h3></div>
                           </div>
                   </div>
                  </div> 
              </div>
            </div>

                         <a href="view_studs.php">                
                             <div class="modal-footer">
                                 <span class="pull-left">View Details</span>
                                 <span class="pull-right"><i class="icon-chevron-right"></i></span>
                                 <div class="clearfix"></div>
                             </div>                
                         </a>
         </div>

         <div class="col-lg-4">
            <div class="card">
               <div class="card-heading">
                  <div class="container-fluid">
                   <div class="row-fluid">
                           <div class="span3"></br>
                              <i class="fa fa-users fa-5x"></i><br/>
                           </div>
                           <div class="span8 text-right">
                           <div class="huge"><h3><strong></strong></h3></div>
                                 <div><h3>All Dissmiss Case</h3></div>
                           </div>
                   </div>
                  </div> 
              </div>
            </div>

                         <a href="view_studs.php">                
                             <div class="modal-footer">
                                 <span class="pull-left">View Details</span>
                                 <span class="pull-right"><i class="icon-chevron-right"></i></span>
                                 <div class="clearfix"></div>
                             </div>                
                         </a>
         </div>


   <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

 
 </main>

 </div>
 </div>


        <!-- <div class="container">

<?php include('../includes/script.php'); ?> 