<?php
include('../connection/adminlog.php');

$user_check=$_SESSION['username'];

$ses_sql = mysqli_query($conn,"SELECT * FROM admin WHERE username='$user_check' ");

$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_admin=$row['username'];
$login_admin_id=$row['id'];

if(!isset($user_check))
{
header("Location: index.php");
}
?>	