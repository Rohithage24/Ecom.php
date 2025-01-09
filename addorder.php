<?php
session_start();
$id = $_SESSION['sid'];

if (!isset($_SESSION["sid"])) {

    header("location:login.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["name"]) && isset($_POST["totalPrice"]) ?? 0) {
        $quentity = $_POST['quantity'];
        $totalprice = $_POST['totalPrice'];
        $pids = $_POST['pid'];
        $prices = $_POST['price'];
        $addre = $_POST['address'];

        $quantities = $_POST['quen'];
        $productNames = $_POST['name'];
        $card = $_POST['cardNumber'];
        $cvv = $_POST['cvv'];
        $exp = $_POST['expiryDate'];
    } else {
        echo "No data received!";
        exit();
    }
} else {
    echo "Invalid request method!";
    exit();
}








include("include\dbconnect.php");




for ($i = 0; $i < count($prices); $i++) {

    $qury = "INSERT INTO `order`(`oid`, `uid`, `pid`, `quentity`, `price`, `totalprice`, `address`, `cardNumber`, `cvv`, `expdate`, `date`) VALUES (null,'$id','$pids[$i]','$quantities[$i]','$prices[$i]','$totalprice','$addre','$card','$cvv','$exp',now())";



    $result1 = mysqli_query($connect, $qury);

    $query1 = "DELETE FROM `addcart` WHERE pid='$pids[$i]'";

    $result4 = mysqli_query($connect, $query1);
}








if ($result1) {
?><script>
        alert("Successfully loaded deta")
    </script> <?php


                header("location:index.php");
            }

                ?>