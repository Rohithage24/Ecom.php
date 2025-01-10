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

$tableCheckQuery = "SHOW TABLES LIKE 'order'";
$tableCheckResult = mysqli_query($connect, $tableCheckQuery);

if (mysqli_num_rows($tableCheckResult) == 0) {
    // Table does not exist, create it
    $createTableQuery = "CREATE TABLE IF NOT EXISTS `order` (
  `oid` int(12) NOT NULL AUTO_INCREMENT,
  `uid` int(12) NOT NULL,
  `pid` int(12) NOT NULL,
  `quentity` int(50) NOT NULL,
  `price` int(200) NOT NULL,
  `totalprice` int(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `cardNumber` int(16) NOT NULL,
  `cvv` int(3) NOT NULL,
  `expdate` date NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`oid`),
  KEY `fk_product_order` (`pid`),
  KEY `fk_user_order` (`uid`)
)";

    if (mysqli_query($connect, $createTableQuery)) {
        echo "Table 'user' created successfully.";
    } else {
        die("ERROR: Could not create table. " . mysqli_error($connect));
    }
}





for ($i = 0; $i < count($prices); $i++) {

    $qury = "INSERT INTO `order`(`oid`, `uid`, `pid`, `quentity`, `price`, `totalprice`, `address`, `cardNumber`, `cvv`, `expdate`, `date`) VALUES (null,'$id','$pids[$i]','$quantities[$i]','$prices[$i]','$totalprice','$addre','$card','$cvv','$exp',now())";



    $result1 = mysqli_query($connect, $qury);

    $query1 = "DELETE FROM `addcart` WHERE pid='$pids[$i]'";

    $result4 = mysqli_query($connect, $query1);
}








if ($result1) {
?>
    <script>
        alert("Successfully loaded deta")
    </script> <?php


                header("location:index.php");
            }

                ?>