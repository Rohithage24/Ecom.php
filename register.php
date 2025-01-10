<?php
if (isset($_POST["register"])) {
    // $connect = mysqli_connect("dpg-ctvvigtds78s73estnjg-a", "ecomdb_18i9", "aRPOobpd4r0w8oXWmXc9oeJ6684W0k1T", "ecomdb_18i9");
    $connect = mysqli_connect("dpg-ctvvigtds78s73estnjg-a", "ecomdb_18i9", "aRPOobpd4r0w8oXWmXc9oeJ6684W0k1T", "ecomdb_18i9");


    if ($connect === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    // Check if the table exists
    $tableCheckQuery = "SHOW TABLES LIKE 'user'";
    $tableCheckResult = mysqli_query($connect, $tableCheckQuery);

    if (mysqli_num_rows($tableCheckResult) == 0) {
        // Table does not exist, create it
        $createTableQuery = "CREATE TABLE user (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            fullName VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL,
            contact VARCHAR(15) NOT NULL,
            age INT(3) NOT NULL,
            image VARCHAR(255) NOT NULL
        )";

        if (mysqli_query($connect, $createTableQuery)) {
            echo "Table 'user' created successfully.";
        } else {
            die("ERROR: Could not create table. " . mysqli_error($connect));
        }
    }

    // Proceed with the registration process
    $fn = $_POST["fullName"];
    $em = $_POST["email"];
    $ps = $_POST["password"];
    $con = $_POST["contact"];
    $ag = $_POST["age"];

    $file = $_FILES["image"];

    $orgname = $file["name"];
    $orgsize = $file["size"];
    $orgtmp = $file["tmp_name"];
    $orgtype = $file["type"];

    $fileinfo = pathinfo($orgname);
    $fileexte = strtolower($fileinfo['extension']);

    $ext = array('jpg', 'png', 'jpeg', 'bmp');
    $corr = in_array($fileexte, $ext);

    if ($corr) {
        if ($file["size"] > 100000 && $file["size"] < 500000) {
            $target_dir = "user_image/";
            $target_file = $target_dir . basename($file["name"]);
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                $in = "INSERT INTO `user`(`fullName`, `email`, `password`, `contact`, `age`, `image`) VALUES ('$fn', '$em', '$ps', '$con','$ag','$orgname')";

                $result = mysqli_query($connect, $in);

                if ($result) {
                    echo "Register success. File uploaded successfully!";
                } else {
                    echo "Failed to Register. ERROR: " . mysqli_error($connect);
                }
            } else {
                echo "Failed to upload the file.";
            }
        } else {
            echo "File size is too big or too small";
        }
    } else {
        echo "Invalid Extension";
    }

    mysqli_close($connect);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center mb-4">Register</h3>
                        <form id="registerForm" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="fullName">Full Name</label>
                                <input type="text" class="form-control" id="fullName" name="fullName" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="form-group">
                                <label for="contact">Contact</label>
                                <input type="text" class="form-control" id="contact" name="contact" required>
                            </div>
                            <div class="form-group">
                                <label for="age">Age</label>
                                <input type="text" class="form-control" id="age" name="age" required>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" id="image" name="image" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" name="register">Register</button>
                            <a href="login.php" class="btn btn-secondary btn-block">Sign In</a>
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
