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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-heading">
                        <div class="container-fluid">

                            <form action="" method="post" name="frmExcelImport" id="frmExcelImport"
                                enctype="multipart/form-data" class="form-group">
                                <h4>Import File</h4>
                                <div>
                                    <label>Choose Excel
                                        File</label> <input type="file" name="file" id="file" accept=".xls,.xlsx">
                                </div>
                                <button type="submit" class="btn btn-primary" id="Import" name="Import"
                                    class="btn-submit">Import</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>



<!-- <div class="container">-->

<?php include('../includes/script.php'); ?>
<?php
if(isset($_POST["Import"])){
 
 
		echo $filename=$_FILES["file"]["tmp_name"];
 
 
		 if($_FILES["file"]["size"] > 0)
		 {
 
		  	$file = fopen($filename, "r");
	         while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {
            
            // $name_of_patient = $emapData[1];
            // $treatment_type = $emapData[2];
            // $date_of_treatment = $emapData[3];
            // $date_of_upload = $emapData[4];
            $uploaded_by = $login_admin_id;
            
            // print_r($uploaded_by);
            // exit();
	          //It wiil insert a row to our subject table from our csv file`
              $sql = "INSERT into report_tbl (`name_of_treatment`, `treatment_type`, `date_of_treatment`, `uploaded_by`, `date_of_upload`) 
              values('$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$uploaded_by')";
	         //we are using mysql_query function. it returns a resource on true else False on error
	          $result = mysqli_query( $conn, $sql );
				if(! $result )
				{
					echo "<script type=\"text/javascript\">
							alert(\"Invalid File:Please Upload CSV File.\");
							window.location = \"reports.php\"
						</script>";
 
				}
 
	         }
	         fclose($file);
	         //throws a message if data successfully imported to mysql database from excel file
	         echo "<script type=\"text/javascript\">
						alert(\"File has been successfully Imported.\");
						window.location = \"reports.php\"
					</script>";
            }
        }
?>