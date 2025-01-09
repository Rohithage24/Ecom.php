<?php

// if ($_SERVER["REQUEST_METHOD"]=="POST") {
// 	if (isset($_POST["totalProduct"]) && isset(["totalprice"])) {

// $quentity = $_POST['totalProduct'];
// $totalprice = $_POST['totalPrice'];
// $pid = $_POST['pid'];
// $price = $_POST['price'];
// $quentites = $_POST['quantites'];

// 	}

// }






// echo $quentity."<br>" ;

// echo $totalprice."<br>" ;
//  print_r($price) ;

// echo "<br>";

// print_r($pid);



?>
<?php
session_start();
$id = $_SESSION['sid'];

if (!isset($_SESSION["sid"])) {

    header("location:login.php");
    exit();
}

include("include\dbconnect.php");

$qur = "SELECT * FROM user WHERE id = '$id'";
$result = mysqli_query($connect, $qur);
$row = mysqli_num_rows($result);

$data = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["totalProduct"]) && isset($_POST["totalPrice"]) ?? 0) {
        $quentity = $_POST['totalProduct'];
        $totalprice = $_POST['totalPrice'];
        $pids = $_POST['pid'];
        $prices = $_POST['price'];
        $quantities = $_POST['quantites'];
        $productNames = $_POST['prName'];
        $img = $_POST['img'];
    } else {
        echo "No data received!";
        exit();
    }
} else {
    echo "Invalid request method!";
    exit();
}

print_r($pids);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="css/index.css">
    <?php include("include/boostrapcdn.php"); ?>

    <style>
        img {
            width: 100px;

        }
    </style>
</head>

<body>

    <?php include("naveber.php"); ?>

    <div class="container mt-4 my-4 col-md-9">
        <h1>Checkout Summary</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $totalCalculatedPrice = 0;
                for ($i = 0; $i < count($pids); $i++) {
                    $totalItemPrice = $prices[$i] * $quantities[$i];
                    $totalCalculatedPrice += $totalItemPrice;
                ?>
                    <tr>
                        <td> <img class="img-fluid" src="<?php echo $img[$i]; ?> "></td>
                        <td><?php echo $productNames[$i]; ?></td>
                        <td><?php echo $prices[$i]; ?></td>
                        <td><?php echo $quantities[$i]; ?></td>
                        <td><?php echo $totalItemPrice; ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <form method="post" action="addorder.php">
            <h2>Put Information</h2>

            <div class="form-group">
                <label for="name"> Name</label>
                <input type="text" class="form-control" id="name" value="<?php echo $data["fullName"]; ?> " name="name" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="email">Email ID</label>
                <input type="email" class="form-control" id="email" value="<?php echo $data["email"]; ?>" name="email" required>
            </div>

            <?php
            $totalCalculatedPrice = 0;
            for ($i = 0; $i < count($pids); $i++) {

            ?> <div class="form-group">

                    <input type="hidden" class="form-control" id="price" name="price[]" value="<?php echo $prices[$i]; ?>" readonly>
                </div>
                <div class="form-group">

                    <input type="hidden" class="form-control" id="quen" name="quen[]" value="<?php echo $quantities[$i]; ?>" readonly>
                </div>
                <div class="form-group">

                    <input type="hidden" class="form-control" id="pid[]" value="<?php echo $pids[$i]; ?> " name="pid[]" required>
                </div>
            <?php
            }
            ?>

            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="text" class="form-control" id="quantity" name="quantity" value="<?php echo $quentity ?>" readonly>
            </div>
            <div class="form-group">
                <label for="totalPrice">Total Price</label>
                <input type="text" class="form-control" id="totalPrice" name="totalPrice" value="<?php echo  $totalprice; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="cardNumber">Debit Card Number</label>
                <input type="num" class="form-control" id="debit_card" name="cardNumber" max="16" required>
            </div>
            <div class="form-group">
                <label for="cvv">CVV</label>
                <input type="text" class="form-control" id="cvv" name="cvv" required>
            </div>
            <div class="form-group">
                <label for="expiryDate">Expiry Date</label>
                <input type="date" class="form-control" id="expiryDate" name="expiryDate" required>
            </div>
            <button type="submit" class="btn btn-success" name="submit">Place Order</button>
        </form>


    </div>

    <?php include("include/script.php"); ?>

    <?php include("include\script.php"); ?>

    <script type="text/javascript" src="js/index.js"></script>
</body>

</html>