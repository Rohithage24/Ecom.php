

<?php




session_start();
$id= $_SESSION['sid'];

if (!isset($_SESSION["sid"])) {

    header("location:login.php");
    exit();
    
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pr = $_POST['price'] ?? 0; // Use null coalescing operator to avoid undefined index error
    $qu = $_POST['quent'] ?? 0; // Use null coalescing operator to avoid undefined index error
    $pid = $_POST['pid'] ?? 0; // Use null coalescing operator to avoid undefined index error

    $total = $pr * $qu;
}



 



include("include\dbconnect.php");

$qur = "SELECT * FROM user WHERE id = '$id'";
$result = mysqli_query($connect, $qur);
    $row = mysqli_num_rows($result);

    $data = mysqli_fetch_assoc($result);

    
   







	if (isset($_POST["submit"])) {
	$addre =$_POST['address'];
	$pri =$_POST['price'];
	$quentity=$_POST['quantity'];
	$total = $_POST['totalPrice'];
	$card = $_POST['cardNumber'];
	$cvv = $_POST['cvv'];
	$exp = $_POST['expiryDate'];
    $pid_n=$_POST['pid'];


    // echo $pid_n;


    $qury ="INSERT INTO `order`(`oid`, `uid`, `pid`, `quentity`, `price`, `totalprice`, `address`, `cardNumber`, `cvv`, `expdate`, `date`) VALUES (null,'$id','$pid_n','$quentity','$pri','$total','$addre','$card','$cvv','$exp',now())";


    $result1=mysqli_query($connect,$qury);

    if ($result) {
        ?><script > alert("Successfully loaded deta")</script> <?php


        header("location:index.php");
    }

    // echo $qury;


        // echo $addre ;
        // echo $pri;
        // echo $quentity ." ";
        // echo $total;
        // echo $card;
        // echo $cvv;
        // echo $exp;


    
	}


$pid_n=$pid;
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
    <?php include("include\boostrapcdn.php"); ?>
  <link rel="stylesheet" href="css/index.css">
      <style>
        body {
            background-color: #bcb0e8;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            padding: 20px;
        }
        .card-title{
            text-align: center;
        }
    </style>
</head>
<body>

     <?php include("naveber.php"); ?>


<div class="container">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title ">Checkout</h2>
            <form method="post" >
                <div class="form-group">
            
                    <input type="hidden" class="form-control" id="pid" value="<?php echo $pid; ?> " name="pid" required>
                </div>
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
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" id="price" name="price" value="<?php echo $pr; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="text" class="form-control" id="quantity" name="quantity" value="<?php echo $qu; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="totalPrice">Total Price</label>
                    <input type="text" class="form-control" id="totalPrice" name="totalPrice" value="<?php echo $total; ?>" readonly>
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
                <button type="submit" class="btn btn-success" name="submit">Submit</button>
            </form>
        </div>
    </div>
</div>


<script>
  function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
  }

  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
  }
</script>

<?php include("include\script.php"); ?>

<script type="text/javascript" src="js/index.js"></script>

</body>
</html>