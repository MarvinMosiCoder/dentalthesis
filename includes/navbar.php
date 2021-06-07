<style>
.round {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    position: relative;
    background: red;
    display: inline-block;
    /* padding:0.2rem !important; */
    margin: 0.3rem 0.2rem !important;
    left: -0;
    top: -44px;
    z-index: 99 !important;
}

.round>span {
    color: white;
    display: block;
    text-align: center;
    font-size: 1rem !important;
    padding: 0 !important;
}

#list {

    display: none;
    top: 33px;
    position: absolute;
    right: 2%;
    background: #ffffff;
    z-index: 100 !important;
    width: 25vw;
    margin-left: -37px;

    padding: 0 !important;
    margin: 0 auto !important;


}

.message>span {
    width: 100%;
    display: block;
    color: red;
    text-align: justify;
    margin: 0.2rem 0.3rem !important;
    padding: 0.3rem !important;
    line-height: 1rem !important;
    font-weight: bold;
    border-bottom: 1px solid white;
    font-size: 1.8rem !important;

}

.message {
    /* background:#ff7f50;
            margin:0.3rem 0.2rem !important;
            padding:0.2rem 0 !important;
            width:100%;
            display:block; */

}

.message>.msg {
    width: 90%;
    margin: 0.2rem 0.3rem !important;
    padding: 0.2rem 0.2rem !important;
    text-align: justify;
    font-weight: bold;
    display: block;
    word-wrap: break-word;


}
</style>

<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap pl-3 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">RTN Dental Clinic</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
        data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <?php $query= mysqli_query($conn,"select * from admin where id = '$login_admin'")or die(mysqli_error());
               $row = mysqli_fetch_array($query);     
  ?>
    <?php
       $find_notifications = "Select * from appointment where users_status = 1";
       $result = mysqli_query($conn,$find_notifications);
       $count_active = '';
       $notifications_data = array(); 
       $deactive_notifications_dump = array();
        while($rows = mysqli_fetch_assoc($result)){
                $count_active = mysqli_num_rows($result);
                $notifications_data[] = array(
                            "client_id" => $rows['client_id'],
                            "client_name"=>$rows['client_name'],
                            "treatment_type"=>$rows['treatment_type'],
                            "date_of_appointment"=>$rows['date_of_appointment'],
                            "time_of_appointment"=>$rows['time_of_appointment']
                );
        }
        //only five specific posts
        $deactive_notifications = "Select * from appointment where users_status = 0 ORDER BY date_of_appointment DESC LIMIT 0,5";
        $result = mysqli_query($conn,$deactive_notifications);
        while($rows = mysqli_fetch_assoc($result)){
          $deactive_notifications_dump[] = array(
                            "client_id" => $rows['client_id'],
                            "client_name"=>$rows['client_name'],
                            "treatment_type"=>$rows['treatment_type'],
                            "date_of_appointment"=>$rows['date_of_appointment'],
                            "time_of_appointment"=>$rows['time_of_appointment']                                                                                                                  
          );
        }

     ?>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <h4 class="text-white text-center">Welcome! <strong style="color: #00FF7F">
                    <?php echo $login_admin;?></strong></h4>
        </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><i class="fa fa-bell" id="over" data-value="<?php echo $count_active;?>"
                style="z-index:-99 !important;font-size:32px;color:white;margin:0.5rem 0.4rem !important;"></i></li>
        <?php if(!empty($count_active)){?>
        <div class="round" id="bell-count" data-value="<?php echo $count_active;?>">
            <span><?php echo $count_active; ?></span></div>
        <?php }?>

        <?php if(!empty($count_active)){?>
        <div id="list">
            <?php
                          foreach($notifications_data as $list_rows){?>
            <li id="message_items">
                <div class="message alert alert-danger" data-id=<?php echo $list_rows['client_id'];?>>
                    <span><?php echo $list_rows['client_name']; ?></span>
                    <p> appoint medication of</p>
                    <div class="msg">
                        <p><?php 
                                  echo $list_rows['treatment_type'];
                                ?></p>
                    </div>
                    <p> has set appointment on
                    <p><?php 
                                  echo $list_rows['date_of_appointment'];
                                ?>
                    <h5>Time of <?php 
                                echo $list_rows['time_of_appointment'];
                              ?></h5>
                </div>
            </li>
            <?php }
                       ?>
        </div>
        <?php }else{?>
        <!--old Messages-->
        <div id="list">
            <?php
                          foreach($deactive_notifications_dump as $list_rows){?>
            <li id="message_items">
                <div class="message alert alert-danger" data-id=<?php echo $list_rows['client_id'];?>>
                    <span><?php echo $list_rows['client_name']; ?></span>
                    <p> appoint medication of</p>
                    <div class="msg">
                        <p><?php 
                                  echo $list_rows['treatment_type'];
                                ?></p>
                        <p> has set appointment on
                        <p><?php 
                                  echo $list_rows['date_of_appointment'];
                                ?>
                        <h5>Time of <?php 
                                echo $list_rows['time_of_appointment'];
                              ?></h5>
                    </div>
                </div>
            </li>
            <?php }
                       ?>
            <!--old Messages-->

            <?php } ?>

        </div>
    </ul>


</nav>
<?php include('script.php'); ?>
<script>
$(document).ready(function() {
    var ids = new Array();
    $('#over').on('click', function() {
        $('#list').toggle();
    });

    //Message with Ellipsis
    $('div.msg').each(function() {
        var len = $(this).text().trim(" ").split(" ");
        if (len.length > 12) {
            var add_elip = $(this).text().trim().substring(0, 65) + "…";
            $(this).text(add_elip);
        }

    });


    $("#bell-count").on('click', function(e) {
        e.preventDefault();

        let belvalue = $('#bell-count').attr('data-value');

        if (belvalue == '') {

            console.log("inactive");
        } else {
            $(".round").css('display', 'none');
            $("#list").css('display', 'block');

            // $('.message').each(function(){
            // var i = $(this).attr("data-id");
            // ids.push(i);

            // });
            //Ajax
            $('.message').click(function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'actions/deactive.php',
                    type: 'POST',
                    data: {
                        "id": $(this).attr('data-id')
                    },
                    success: function(data) {

                        console.log(data);
                        location.reload();
                    }
                });
            });
        }
    });

    //  $('#submit').on('click',function(e){
    //       e.preventDefault();
    //       var client_id = $('#client_id').val();
    //       var client_name = $('#client_name').val();
    //       var treatment_type = $('#treatment_type').val();
    //       var date_of_appointment = $('#date_of_appointment').val();
    //       var time_of_appoinment = $('#time_of_appointment').val();
    //       if($.trim(treatment_type).length > 0 && $.trim(date_of_appointment).length > 0 && $.trim(time_of_appoinment).length > 0){
    //         var form_data = $('#frm_data').serialize();
    //       $.ajax({
    //         url:'actions/insert.php',
    //               type:'POST',
    //               data:form_data,
    //               success:function(data){ 
    //                   location.reload();
    //                   alert("save Success!");
    //               }
    //       });
    //       }else{
    //         alert("Please Fill All the fields");
    //       }


    //  });
});
</script>