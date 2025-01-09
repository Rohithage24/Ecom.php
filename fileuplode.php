<?php
if (isset($_POST["upload"])) {
    $connected = mysqli_connect("localhost", "root", "", "image");

    $file = $_FILES["image"];
    print_r($file);
    echo "<br>";

    $orgname = $file["name"];
    $orgsize = $file["size"];
    $orgtmp = $file["tmp_name"];
    $orgtype = $file["type"];

    $fileinfo = pathinfo($orgname); // Use pathinfo to get file information
    print_r($fileinfo);
    echo "<br>";

    $fileexte = strtolower($fileinfo['extension']); // Get the file extension and convert to lowercase

    $ext = array('jpg', 'png', 'jpeg', 'bmp');

    $corr = in_array($fileexte, $ext);

    if ($corr) {
        if ($file["size"] > 100000 && $file["size"] < 500000) {
            move_uploaded_file($file["tmp_name"], "user_image/" . $file["name"]);

            $img = "INSERT INTO `userimage`( `user_image`) VALUES ('$orgname')";

            echo $img;
            


            mysqli_query($connected, $img);

            echo "File uploaded successfully!";
        } else {
            echo "File size is too big or too small";
        }
    } else {
        echo "Invalid Extension";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Image Upload</title>
</head>
<body>

    <form method="post" enctype="multipart/form-data">
        Image: <input type="file" name="image"><br><br>
        <button type="submit" name="upload">Upload</button>
    </form>

</body>
</html>
