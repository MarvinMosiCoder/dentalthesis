<?php include('includes/user_sidebar.php'); ?>

<!-- Main  Warpper -->

            <?php $query= mysqli_query($conn,"select * from user where id = '$login_user'")or die(mysqli_error());
               $row = mysqli_fetch_array($query);     
               ?>
            <?php $query= mysqli_query($conn,"select * from user where id = '$login_user_id'")or die(mysqli_error());
               $row = mysqli_fetch_array($query);     
               ?>
              
             

   <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
     
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
                                    <div class="huge"><?php echo $users; ?></div>
                                    <div><h3>All Registered</h3></div>
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
                                    <div class="huge"><?php echo $users; ?></div>
                                    <div><h3>All Registered</h3></div>
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
                                    <div class="huge"><?php echo $users; ?></div>
                                    <div><h3>All Registered</h3></div>
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
           

           


                      
      </div> 
      </div> -->
      <!-- end row -->


      


                   
              
               
          
     
        <!-- End Main Wrapper -->


<?php include('../includes/script.php'); ?>