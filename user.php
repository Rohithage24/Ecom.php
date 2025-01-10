<?php
session_start();
if (!isset($_SESSION["sid"])) {

	header("Location:login.php");
	// code...
}
    
    // include("..\include\dbconnect.php");
    $connect = mysqli_connect("dpg-ctvvigtds78s73estnjg-a", "ecomdb_18i9", "aRPOobpd4r0w8oXWmXc9oeJ6684W0k1T", "ecomdb_18i9");
   $id = $_SESSION["sid"];	

$qur = "SELECT * FROM user WHERE id = '$id'";
 $result = mysqli_query($connect, $qur);
    $row = mysqli_num_rows($result);

    $data = mysqli_fetch_assoc($result);
    
  //  $imag = "user_image/$data["image"]";
     
    $id = $data["id"];

   $name =  $data["fullName"]; 

// code for change password.

   

   if (isset($_POST["change-password"]))
    {
   	
	   	$cp = $_POST["current-password"];
	   	$np = $_POST["new-password"];
	   	$cmp = $_POST["confirm-password"];

	   // echo $cp;
	   // echo $np;
	   // echo $cmp; 
   
   
   
		    if ($cp==$data["password"]) {

		    	if ($np == $cmp) {

		    		$qur2 = "UPDATE `user` SET `password`='$np' WHERE id = '$id'";
		             
		    		$result = mysqli_query($connect,$qur2);
		    		if ($result) {

		    			header("location:change_password.php");
		    		} else {
		    			echo "Something went weong";
		    		}
		    		

		    	}
		    	else{

		    		//echo "current password and confirm password are not match , please type a connect password.";

		    	}
		   	   // echo "currect password";
		   }
		   else{
		   	//echo "incorrect current password  , Try again";
		   }



	   
    }


// Edit profile


if (isset($_POST["Save"])) {
    $nm = $_POST["name"];
    $em = $_POST["email"];
    $con = $_POST["contact"];
    $ag = $_POST["age"];

    // Make sure to define $id somewhere in your code if it's not already defined
    $qry2 = "UPDATE `user` SET `fullName`='$nm',`email`='$em',`contact`='$con',`age`='$ag' WHERE id = '$id'";
    $result2 = mysqli_query($connect, $qry2);

    if ($result2) {
        ?> 
        <script> alert("Save successfully")</script>
        <?php
    } else {
        ?> 
        <script> alert("Save not successfully")</script>
        <?php
    }
}




// Order List


if ($connect) {

   
  $orlist = "SELECT o.*, p.prName,p.image,p.prCategory FROM `order`o JOIN products p ON p.pid=o.pid WHERE o.uid='$id' ";

   $or_result = mysqli_query($connect,$orlist);

    // $data2 = mysqli_fetch_assoc($or_result);
    
 
 }

 

?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	  <?php include("include\boostrapcdn.php"); ?>

    <link rel="stylesheet" href="css/style.css">
     <style>
     	 body {
           
            min-height: 100vh;
            margin: 0;
        }
        
        .sidebar {
            width: 25%;
            
            background-color: #f8f9fa;
            padding: 20px;

        }
        .content {
            flex-grow: 1;
            padding: 20px;
        }
        .cont{
        	width: 100%;
        	display: flex;
        }
        .img{
        	width: 200px;
        }
        .table{
        	text-align: center;
        }
         .success-message {
            color: green;
        }
        .error-message {
            color: red;
        }
        .img-fluid{
            width: 100px;
        }
    </style>
	
</head>
<body>
<div >
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand disabled" href="#">Shop </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link active" href="index.php" >Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
    </ul>
    <span class="navbar-text">

     <a href="log_out.php" name="log_out">Log Out (<?php echo $name;?>)</a>
    </span>
  </div>
</nav>
</div>
  
   
   	
  
<div  class="cont">
    <div class="sidebar col-md-3">
        <h4 class="text-center">User Dashboard</h4>
        <ul class="list-group">
            <li class="list-group-item"><a href="#" id="profile-link">User Profile</a></li>
            <li class="list-group-item"><a href="#" id="change-password-link">Change Password</a></li>
            <li class="list-group-item"><a href="#" id="edit-profile-link">Edit Profile</a></li>
            <li class="list-group-item"><a href="#" id="order-history-link">Order History</a></li>
        </ul>
    </div>
    <div class="content col-md-8">
        <div id="profile" class="content-section">
            <h2>User Profile</h2>
           <?php include("profile.php") ?>

           
        </div>


        <div id="change-password" class="content-section" style="display: none;">
            <h2>Change Password</h2>
            <form id="change-password-form" method="post">
                <div class="form-group">
                    <label for="current-password">Current Password</label>
                    <input type="password" class="form-control col-md-5" name="current-password" id="current-password">
                </div>
                <div class="form-group">
                    <label for="new-password">New Password</label>
                    <input type="password" class="form-control col-md-5" name="new-password" id="new-password">
                </div>
                <div class="form-group">
                    <label for="confirm-password">Confirm New Password</label>
                    <input type="password" class="form-control col-md-5" name="confirm-password" id="confirm-password">
                    
                    <div id="password-message" class="mt-3"></div>

                </div>
                <button name="change-password" type="submit" id="changed" class="btn btn-primary">Change Password</button>

            </form>
        </div>


        <div id="edit-profile" class="content-section" style="display: none;">
            <h2>Edit Profile</h2>
            <form method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control col-md-7" id="name" value="<?php echo $name;?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control col-md-7" id="email" value="<?php echo $data["email"];?>">
                </div>
                <div class="form-group">
                    <label for="contact">Contact</label>
                    <input type="contact" name="contact" class="form-control col-md-7" id="content" value="<?php echo $data["contact"];?>">
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="age" name="age" class="form-control col-md-7" id="age" value="<?php echo $data["age"];?>">
                </div>
                <button type="submit" name="Save" class="btn btn-primary">Save Changes</button>
            </form>
        </div>


        <div id="order-history" class="content-section" style="display: none;">
            <h2>Order History</h2>
                <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quentity</th>
                        <th>Totalprice</th>
                        <th>date</th>

                        <th>Image</th>



                    </tr>
                </thead>
                <tbody>
                  <?php
                  $count=1;
                    while ($data2 = mysqli_fetch_assoc($or_result)) {

                        $img="primage/".$data2['prCategory']."/".$data2["image"];
                      

                      ?>
                     <tr>
                       
                       <td><?php echo $count++ ; ?></td>
                       <td><?php echo $data2["prName"] ; ?></td>
                       <td><?php echo $data2["price"] ; ?></td>
                       <td><?php echo $data2["quentity"] ; ?></td>
                       <td><?php echo $data2["totalprice"] ; ?></td>
                       <td><?php echo $data2["date"] ; ?></td>

                       <td><img class="img-fluid" src="<?php echo $img ; ?>"> </td>
                       <td><a class="btn btn-primary" href="printvoice.php?id=<?php echo $data2["oid"] ; ?>">Print</a> </td>

                     </tr>

                    <?php
                    }
                    ?>


                    


                </tbody>
            </table>


        </div>
    </div>
 </div>
 
   <?php include("include\script.php"); ?>



<script>
        $(document).ready(function() {
            $('.list-group-item a').on('click', function(e) {
                e.preventDefault();
                $('.content-section').hide();
                const sectionId = $(this).attr('id').replace('-link', '');
                $('#' + sectionId).show();
            });

             $('#change-password-form').click( function(e) {
           
            const currentPassword = $('#current-password').val();
            const newPassword = $('#new-password').val();
            const confirmPassword = $('#confirm-password').val();
            const passwordMessage = $('#password-message');

            // Password validation regex
            const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,14}$/;

            if (!passwordRegex.test(newPassword)) {
                passwordMessage.text('Password must be 8-14 characters long, include at least one uppercase letter, one lowercase letter, one digit, and one special character.')
                    .removeClass('success-message')
                    .addClass('error-message');
            } else if (newPassword !== confirmPassword) {
                passwordMessage.text('New passwords do not match.')
                    .removeClass('success-message')
                    .addClass('error-message');
            } else {
                passwordMessage.text('Password changed successfully.')
                    .removeClass('error-message')
                    .addClass('success-message');
                
            }
        });

            // $('#change-password-form').keyup(function(e) {
                
            //     const currentPassword = $('#current-password').val();
            //     const newPassword = $('#new-password').val();
            //     const confirmPassword = $('#confirm-password').val();

            //     if (newPassword !== confirmPassword) {
            //         $('#password-message').text('New passwords do not match.').removeClass('success-message').addClass('error-message');
            //     } else if (newPassword.length < 6) {
            //         $('#password-message').text('New password must be at least 6 characters long.').removeClass('success-message').addClass('error-message');
            //     } else {
            //         $('#password-message').text('Password changed successfully.').removeClass('error-message').addClass('success-message');
            //         // Add AJAX call here to update the password in the database
            //     }
            // });
        });
    </script>
</body>
</html>