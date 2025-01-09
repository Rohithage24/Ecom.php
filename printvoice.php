<?php
session_start();

// Database connection
$connect = mysqli_connect("localhost", "root", "", "shop");

include("include/dbconnect.php");

// User details
$id = $_SESSION['sid'];

$qry = "SELECT fullName, email, contact FROM user WHERE id ='$id'";
$result = mysqli_query($connect, $qry);
$data = mysqli_fetch_assoc($result);

$D_name = $data["fullName"];
$D_gmail = $data["email"];
$D_contact = $data["contact"];

// Order details
$oid = $_GET['id'];

$qry2 = "SELECT quentity, price, totalprice, address, cardNumber, cvv, expdate, date FROM `order` WHERE oid='$oid'";
$result2 = mysqli_query($connect, $qry2);
$orderData = mysqli_fetch_assoc($result2);

include("naveber.php");
include("include/boostrapcdn.php");
?>

<link rel="stylesheet" href="css/index.css">
<style>

</style>

<body>
    <div class="container invoice-container">
        <div class="invoice-header text-center">
            <h2>Invoice</h2>
            <p>Order ID: <?php echo $oid; ?></p>
        </div>

        <div class="row">
            <div class="col-md-6">
                <h5>User Details</h5>
                <p><strong>Name:</strong> <?php echo $D_name; ?></p>
                <p><strong>Email:</strong> <?php echo $D_gmail; ?></p>
                <p><strong>Contact:</strong> <?php echo $D_contact; ?></p>
            </div>
            <div class="col-md-6">
                <h5>Order Details</h5>
                <p><strong>Quantity:</strong> <?php echo $orderData["quentity"]; ?></p>
                <p><strong>Price per item:</strong> $<?php echo $orderData["price"]; ?></p>
                <p><strong>Total Price:</strong> $<?php echo $orderData["totalprice"]; ?></p>
                <p><strong>Shipping Address:</strong> <?php echo $orderData["address"]; ?></p>
            </div>
        </div>

        <table class="table table-bordered mt-4">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Description</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Unit Price</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Product Name</td>
                    <td><?php echo $orderData["quentity"]; ?></td>
                    <td>$<?php echo $orderData["price"]; ?></td>
                    <td>$<?php echo $orderData["totalprice"]; ?></td>
                </tr>
            </tbody>
        </table>

        <div class="row mt-4">
            <div class="col-md-12 text-right">
                <p><strong>Grand Total:</strong> $<?php echo $orderData["totalprice"]; ?></p>
            </div>
        </div>
        <div class="button">

            <button class="btn btn-success text-center" onclick="window.print()">Print</button>
        </div>
    </div>

    <?php include("include/script.php"); ?>
    <script type="text/javascript" src="js/index.js"></script>


</body>


<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
    }
</script>