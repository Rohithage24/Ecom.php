
<?php
session_start();

if (!isset($_SESSION["admin_id"])) {
	header("location:../login.php");
}



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style >
		body{
                background-color: #bcb0e8;
            }
	</style>
	
	<?php include("..\include\boostrapcdn.php"); ?>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Admin Profile</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
		    <!-- Nav tabs -->
		<ul class="nav nav-tabs">
		  <li class="nav-item">
		    <a class="nav-link active" data-toggle="tab" href="#addproduct">Add product</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" data-toggle="tab" href="#manageuser">Manage User</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" data-toggle="tab" href="#userlist">User List</a>
		  </li>
		</ul>
  </div>
  <span class="navbar-text">
    
    <a href="../log_out.php" >log out</a>
    </span>
</nav>

<!-- Tab panes -->

<div class="tab-content">
  <div class="tab-pane container active" id="addproduct">
      <?php include("addproduct.php")  ?>
  </div>
  <div class="tab-pane container fade" id="manageuser">
      <?php include("manageuser.php")  ?>
  	  
  </div>
  <div class="tab-pane container fade" id="userlist">
        <?php include("userlist.php")  ?>
  	   
  </div>
</div>

	<?php include("..\include\script.php"); ?>


</body>
</html>