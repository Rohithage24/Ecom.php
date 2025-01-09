<?php


    $connect = mysqli_connect("localhost", "root", "", "shop");

    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }


?>