 <?php


$id = $_GET['id']; // Missing semicolon
include("../include/dbconnect.php"); // Corrected include path

  $connect = mysqli_connect("localhost", "root", "", "sample");

 $qry3 ="DELETE FROM `user` WHERE id ='$id' ";
 $result3 = mysqli_query($connect,$qry3);

 if($result3){
 	header("location:admindashdord.php#manageuser");
 }else{
 	echo " user informetion are not delete	";
 }

 


?> 