<?php
session_start();

if (isset($_SESSION["sid"])) {
    header("location:user.php");
    exit();
}
if (isset($_SESSION["admin_id"])) {
    header("location:admin\admindashdord.php");
    exit();
}




if (isset($_POST["Sign_In"]))
 {



    $connect = mysqli_connect("localhost", "root", "", "shop");

    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $emi = mysqli_real_escape_string($connect, $_POST['email']);
    $pwd = mysqli_real_escape_string($connect, $_POST['password']);

    $qur = "SELECT * FROM user WHERE email = '$emi' AND password = '$pwd'";

    if ($emi=="admin@gmail.com" && $pwd == "admin@2004") 
    {

      $_SESSION["admin_id"]=$emi;
       header("location:admin\admindashdord.php");
    }else{
        $result = mysqli_query($connect, $qur);
        $row = mysqli_num_rows($result);

        $data = mysqli_fetch_assoc($result);
         
        $id = $data["id"];

       $name =  $data["fullName"];
      
        
        if ($row > 0)
         {
            $_SESSION["sid"] = $id;
            $_SESSION["nid"] = $name;
            header("Location: user.php");
            exit();
        } else {
            echo "Invalid Email and password.";
        }

      
        mysqli_close($connect);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center mb-4">Sign In</h3>
                        <form id="registerForm" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" name="Sign_In">Sign In</button>
                            <a href="register.php" class="btn btn-secondary btn-block">Register</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>
