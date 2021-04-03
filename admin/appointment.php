<?php include('../includes/admin_sidebar.php'); ?>
<?php   
  if (isset($_GET['sched'])) {
    $user_id = $_GET['sched'];
    $rec = mysqli_query($conn, "SELECT user.id, CONCAT(user.fname, ' ' ,user.mname, ' ' ,user.lname) AS client_name
      FROM user
      WHERE id = $user_id");
    $record = mysqli_fetch_array($rec);
    $user_id = $record ['id'];
    $client_name = $record ['client_name'];
  }
?>
<!-- Main  Warpper -->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <!-- start of main dashboard -->
    <section class="registration">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-8 col-xl-6">
              <div class="row">
              
              <form class="form-auth-small" id="frm_data">
                <div class="col text-center">
                  <h1>add appointment</h1>
                
                  <p class="text-h3">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. </p>
                </div>
              </div>
              <div class="row d-flex align-items-center mt-4">
                
                  <input type="hidden" name="client_id" id="client_id" value = "<?php echo $user_id;?>" class="form-control" placeholder="Name">
                  <input type="hidden" name="client_name" id="client_name" value = "<?php echo $client_name;?>" class="form-control" placeholder="Name">
               
                <div class="col">
                  <input type="text" name="treatment_type" id="treatment_type" class="form-control" placeholder="type of treatment">
                </div>
                <div class="col">
                  <input type="date" name="date_of_appointment" id="date_of_appointment" class="form-control" placeholder="Lastname">
                </div>
              </div>
              <div class="row align-items-center mt-4">
              <div class="col">
                  <input type="time" name="time_of_appointment" id="time_of_appointment" class="form-control" placeholder="Username">
              </div>
               
              </div>
              <input type="submit" id="submit" name="submit" class="btn btn-danger" value="SUBMIT"/>
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
<script>
$(document).ready(function(){
    var ids = new Array();
    $('#over').on('click',function(){
           $('#list').toggle();  
       });

   //Message with Ellipsis
   $('div.msg').each(function(){
       var len =$(this).text().trim(" ").split(" ");
      if(len.length > 12){
         var add_elip =  $(this).text().trim().substring(0, 65) + "…";
         $(this).text(add_elip);
      }
     
}); 


   $("#bell-count").on('click',function(e){
        e.preventDefault();

        let belvalue = $('#bell-count').attr('data-value');
        
        if(belvalue == ''){
         
          console.log("inactive");
        }else{
          $(".round").css('display','none');
          $("#list").css('display','block');
          
          // $('.message').each(function(){
          // var i = $(this).attr("data-id");
          // ids.push(i);
          
          // });
          //Ajax
          $('.message').click(function(e){
            e.preventDefault();
              $.ajax({
                url:'actions/deactive.php',
                type:'POST',
                data:{"id":$(this).attr('data-id')},
                success:function(data){
                 
                    console.log(data);
                    location.reload();
                }
            });
        });
     }
   });

   $('#submit').on('click',function(e){
        e.preventDefault();
        var client_id = $('#client_id').val();
        var client_name = $('#client_name').val();
        var treatment_type = $('#treatment_type').val();
        var date_of_appointment = $('#date_of_appointment').val();
        var time_of_appoinment = $('#time_of_appointment').val();
        if($.trim(treatment_type).length > 0 && $.trim(date_of_appointment).length > 0 && $.trim(time_of_appoinment).length > 0){
          var form_data = $('#frm_data').serialize();
        $.ajax({
          url:'actions/insert.php',
                type:'POST',
                data:form_data,
                success:function(data){ 
                    location.reload();
                    alert("save Success!");
                }
        });
        }else{
          alert("Please Fill All the fields");
        }
      
       
   });
});
</script>

