<?php
session_start();

if (isset($_SESSION['sid']) || isset($_SESSION['admin_id'])) {

  $id = $_SESSION['sid'];


  include("include\dbconnect.php");

  $product = "SELECT * FROM `products`";

  $result3 = mysqli_query($connect, $product);

  $data = mysqli_fetch_assoc($result3);



  $user = "SELECT * FROM `user` WHERE id = '$id'";

  $res = mysqli_query($connect, $user);

  $da = mysqli_fetch_assoc($res);





  $log = "log_out.php";
  $na = "Log Out";
  $img = isset($da['image']) ? '<img class="img" src="user_image/' . $da['image'] . '">' : '<img class="img" src="default_image.jpg">';
} else {
  $log = "login.php";
  $na = "Log In";
  $img = "";
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


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Shopping User Page</title>
  <?php include("include\boostrapcdn.php"); ?>


  <link rel="stylesheet" href="css/index.css">

  <style>
    body {
      background-color: #bcb0e8;
    }

    .card-img-top {
      width: 220px;
      height: 250px;
      align-items: center;
    }

    .img {
      height: 30px;
      width: 30px;

      border-radius: 20px;
    }

    .imgin {
      background-color: #4f19b3;
      width: 150px;
      text-align: center;
      font: bold;

    }

    .nav-link .nav {
      color: white;
      font: bold;
    }
  .addcart {
    position: fixed;
    top: 50%;
    right: 0;
    transform: translateY(-50%);
    background-color: #4f19b3;
    padding: 10px;
    border-radius: 5px 0 0 5px;
    z-index: 1000;
}

.addcart h1 {
    margin: 0;
    color: white;
}

.addcart a {
    color: white;
    text-decoration: none;
}



  </style>
</head>

<body>
  <img src="">


  <div class="  banner_bg_main">

    <div class="container">
      <nav class=" top-nav navbar navbar-expand-lg navbar-light bg-secondary">


        <div class=" row collapse navbar-collapse" id="navbarNav">
          <ul class="custom_menu navbar-nav  mx-auto">
            <li class="nav-item ">
              <a class="nav-link " href="#">Best Sellers </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="#">Gift Ideas</a>
            </li>
            <li class="nav-item ">

              <a class="nav-link imgin " href="<?php echo $log; ?>"> <?php echo $na . " ";
                                                                      echo $img; ?> </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Today's Deals</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Customer Service</a>
            </li>
          </ul>

      </nav>

       <div class="addcart">
        <a href="addcart.php"><h1><i class="bi bi-cart-plus"></i> </h1></a>
    </div>
    </div>

    <div class="logo_section">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="logo"><a href="index.php"><img src="images\logo1.png"></a></div>
          </div>
        </div>
      </div>
    </div>

    <div >

    <?php include("naveber.php"); ?>

     

    </div>

    <div class="container  justify-content-center">

      <div class=" active ">
        <div class="row  justify-items-center">
          <center>
            <div>
              <h1 class="  display-1">Get Start <br>Your favriot shoping </h1>
              <div><a class="btn" href="#">Buy Now</a></div>
            </div>
          </center>
        </div>
      </div>

    </div>




  </div>

  <!-- Carousel -->
  <!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="https://via.placeholder.com/800x400" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://via.placeholder.com/800x400" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://via.placeholder.com/800x400" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
 -->

  <div class="jumbotron">
    <div class="container mt-4">
      <div class=" justify-content-center mb-4">
        <button class="btn btn-primary filter-btn" data-filter="all">All</button>
        <button class="btn btn-secondary filter-btn" data-filter="electronics">Electronics</button>
        <button class="btn btn-secondary filter-btn" data-filter="dress">Dress</button>
        <button class="btn btn-secondary filter-btn" data-filter="studyMaterial">Study Material</button>
        <button class="btn btn-secondary filter-btn" data-filter="exerisesequipme">Exerises Equipment</button>
        <button class="btn btn-secondary filter-btn" data-filter="otherProducts">Other Products</button>


      </div>
      <div class="row row product-gallery">
        <!-- Product 1 -->
        <?php
        $count = 1;
        while ($data = mysqli_fetch_assoc($result3)) {
          $img = "primage/" . $data['prCategory'] . "/" . $data["image"];

        ?>
          <div class="col-md-3 col-sm-6  mb-4 product-item" data-category="<?php echo $data['prCategory']; ?>">
            <div class="card">
              <img src="<?php echo $img; ?>" class="card-img-top product-img mx-auto" alt="Product 1">
              <div class="card-body">
                <h5 class="card-title"><?php echo $data['prName']; ?></h5>
                <div class="rating">
                  ★★★★☆
                </div>
                <p class="card-text">$<?php echo $data['prPrice']; ?></p>
                <a href="Product.php?id=<?php echo $data['pid'] ?>" class="btn btn-primary" name="viewport"> View More</a>
              </div>
            </div>
          </div>
        <?php

        }
        ?>

        <!-- Additional Products Here -->
      </div>
    </div>
  </div>






  <!-- Footer -->
<footer class="bg-dark text-white mt-5" id="contact">
    <div class="container py-4">
        <div class="row">
            <!-- About Us Section -->
            <div class="col-md-4">
                <h5>About Us</h5>
                <p>
                    Welcome to our shopping site. We offer a wide range of products from electronics to fashion, and much more. Your satisfaction is our priority.
                </p>
            </div>
            <!-- Quick Links Section -->
            <div class="col-md-4">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white">Home</a></li>
                    <li><a href="#" class="text-white">Best Sellers</a></li>
                    <li><a href="#" class="text-white">Gift Ideas</a></li>
                    <li><a href="#" class="text-white">Today's Deals</a></li>
                    <li><a href="#" class="text-white">Customer Service</a></li>
                </ul>
            </div>
            <!-- Contact Us Section -->
            <div class="col-md-4">
                <h5>Contact Us</h5>
                <p>
                    <i class="bi bi-envelope"></i> Email: support@shoppingsite.com<br>
                    <i class="bi bi-telephone"></i> Phone: +123 456 7890<br>
                    <i class="bi bi-geo-alt"></i> Address: 123 Shopping St, Shop City, SC 12345
                </p>
            </div>
        </div>
    </div>
    <div class="bg-secondary text-center py-3">
        <p class="mb-0">&copy; 2024 Shopping Site. All Rights Reserved.</p>
    </div>
</footer>


  <!-- Bootstrap JS and jQuery CDN -->

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




  <?php include("include\script.php"); ?>

  <script type="text/javascript" src="js/index.js"></script>



</body>

</html>