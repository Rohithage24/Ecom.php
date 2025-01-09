<?php

session_start();

 $pid =$_GET['id'];

if (!isset($_SESSION["sid"])) {

    header("Location:login.php");
    // code...
}
$uid=$_SESSION['sid'];



include("include\dbconnect.php");





$qur2= "SELECT * FROM `products` WHERE pid='$pid'";

$result = mysqli_query($connect,$qur2);
  $data = mysqli_fetch_assoc($result);


  $img="primage/".$data['prCategory']."/".$data["image"];


$pname= $data["prName"];
$pprice= $data["prPrice"];

  if (isset($_POST["addcart"])) {

$qryadd = "INSERT INTO `addcart`(`aid`, `uid`, `pid`, `pname`, `price`, `date`, `modifide_date`) VALUES (null,'$uid','$pid','$pname','$pprice',now(),now())";


$resulta = mysqli_query($connect,$qryadd);
if ($resulta) {
    ?><script> alert("Add to cart are Successfuly..")</script> <?php
}else{
    ?><script> alert("Add to cart are not Successfuly..")</script> <?php

}

 
    
}


  // Full texts
// pid 
// prName  
// prCategory  
// prPrice 
// prDescription   
// Available   
// image   
// upoaded_at





?>
  <?php include("include\boostrapcdn.php"); ?>
  <link rel="stylesheet" href="css/index.css">

<style >
    #product{
        background-color: #bcb0e8;
    }
</style>

<body id="product">
     <?php include("naveber.php"); ?>





    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <img src="<?php echo $img; ?>" class="img-fluid" alt="Product Image">
            </div>
            <div class="col-md-6">
                <h1><?php echo $data['prName'] ; ?> </h1>
                <h2 class="text-success">$<?php echo $data['prPrice'] ; ?></h2>
                <p class="text-muted" id="stock">In Stock: <?php echo $data['Available'] ; ?></p>
                <p><?php echo $data['prDescription'] ; ?></p>
                 <!-- <form action="checkout.php" method="POST"> -->
                <div class="d-flex align-items-center mb-3" >


                    <label for="quantity" class="me-2">Quantity:</label>
                    <div class="input-group quantity-input">
                        <button class="btn btn-outline-secondary" id="decrement">-</button>
                        <input type="num" class="form-control d-inline-block " name="quantity" min="1" id="quantity" value="1" max="10" style="width: 30px;" >
                        <button class="btn btn-outline-secondary" id="increment">+</button>
                    </div>
                </div>

               <form  method="post" action="checkout.php">

                
                <button class="btn btn-success" type="submit" name="buynow" id="buynow">Buy Now</button>

          <input type="hidden" name="quent" id="quant">

           <input type="hidden" class="form-control " name="price" id="price" value="<?php echo $data['prPrice'] ; ?>  " readonly><br>
           <input type="hidden" class="form-control " name="pid" id="pid" value="<?php echo $data['pid'] ; ?>  " readonly><br>


           
             </form>

             <form method="post">

                  <input type="hidden" class="form-control " name="price" id="price" value="<?php echo $data['prPrice'] ; ?>  " readonly><br>
                 <input type="hidden" class="form-control " name="pid" id="pid" value="<?php echo $data['pid'] ; ?>  " readonly><br>
                <button class="btn btn-primary me-2" name="addcart">Add to Cart</button>
                </form>



                <!-- </form> -->
                <h4 class="mt-4">Features:</h4>
                <ul>
               

                    <li>Feature 1: Lorem ipsum dolor sit amet.</li>
                    <li>Feature 2: Consectetur adipiscing elit.</li>
                    <li>Feature 3: Vivamus lacinia odio.</li>
                    <li>Feature 4: Vestibulum vestibulum.</li>
                    <li>Feature 5: Quisque bibendum.</li>
                </ul>
            </div>
        </div>
        

        <div class="row mt-5">
            <div class="col">
                <h3>Reviews</h3>
                <div class="review">
                    <p><strong>John Doe</strong></p>
                    <p>★★★★☆</p>
                    <p>Great product! I highly recommend it.</p>
                </div>
                <div class="review">
                    <p><strong>Jane Smith</strong></p>
                    <p>★★★☆☆</p>
                    <p>Good quality, but a bit pricey.</p>
                </div>
                <!-- Add more reviews as needed -->
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


<script >




    $(document).ready(function(){
        $("#buynow").click(function(){

            let quen = $("#quantity").val();

          $("#quant").val(quen);


            console.log(quen);

        })





    })

</script>
</body>