<?php
session_start();

if (!isset($_SESSION["sid"])) {
    header("Location:login.php");
    exit();
}

$uid = $_SESSION['sid'];


include("include/dbconnect.php");

if ($connect) {


    $orlist = "SELECT o.*, p.prName,p.image,p.prCategory FROM `addcart`o JOIN products p ON p.pid=o.pid WHERE o.uid='$uid' ";

    $or_result = mysqli_query($connect, $orlist);

    // $data2 = mysqli_fetch_assoc($or_result);



}


if (isset($_POST["remove"])) {
    $addid = $_POST['remove'];
    $query1 = "DELETE FROM `addcart` WHERE pid='$addid'";

    $result4 = mysqli_query($connect, $query1);

    if ($result4) {

?><script>
            alert("Remove the Product  Successfuly form Add cart..")
        </script> <?php
                    header("Location:addcart.php");
                } else {
                    ?><script>
            alert("Not  Remove the Product form Add cart..")
        </script> <?php

                }
            }



                    ?>
<?php include("include/boostrapcdn.php"); ?>
<link rel="stylesheet" href="css/index.css">
<style>
    body {
        background-color: #bcb0e8;
    }

    #summm {
        margin-top: 200px;
    }

    .img-fluid {
        width: 200px;
    }
</style>

<body>
    <?php include("naveber.php"); ?>

    <div class="container mt-4 my-4 col-md-9">
        <h1>Your Cart</h1>
        <form method="post">


            <table class="table ">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>

                        <th>Action</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    while ($data2 = mysqli_fetch_assoc($or_result)) {

                        $img = "primage/" . $data2['prCategory'] . "/" . $data2["image"];


                    ?>
                        <input type="hidden" name="pid" value="<?php echo $data2["pid"]; ?>">
                        <tr>
                            <td><img class="img-fluid" src="<?php echo $img; ?>"> </td>

                            <td><?php echo $data2["prName"]; ?></td>
                            <td id="price"><?php echo $data2["price"]; ?></td>
                            <td><input type="number" id="quantity" name="quantity" class="form-control quantity" style="width:90px;" value="<?php echo "1"; ?>" min="1" data-price="<?php echo $data2["price"]; ?>"></td>

                            <td><?php echo $data2["date"]; ?></td>
                            <td><button class="btn btn-danger" type="button" name="remove" value="<?php echo $data2["pid"]; ?>">Remove</button> </td>



                        </tr>

                    <?php
                    }
                    ?>





                </tbody>

            </table>
        </form>
        <div id="summm" class="card col-md-5 mx-auto">
            <h2 class="card-title">Order Summary</h2>
            <h5 class="card-body">Total Product :-<span id="totalProduct">0</span> </h5>
            <h3 class="card-body">Total Price :-<span id="totalPrice">0</span> </h3>
            <div class="d-flex justify-content-between card-footer">

                <form action="addcheckout.php" method="POST">
                    <input type="hidden" name="totalProduct" id="totalProduct2">
                    <input type="hidden" name="totalPrice" id="totalPrice2">

                    <?php
                    mysqli_data_seek($or_result, 0); // Reset result pointer
                    while ($data2 = mysqli_fetch_assoc($or_result)) {

                        $img = "primage/" . $data2['prCategory'] . "/" . $data2["image"];
                    ?>
                        <input type="hidden" name="img[]" value="<?php echo $img; ?>">
                        <input type="hidden" name="pid[]" value="<?php echo $data2["pid"]; ?>">
                        <input type="hidden" name="price[]" value="<?php echo $data2["price"]; ?>">
                        <input type="hidden" name="prName[]" value="<?php echo $data2["prName"]; ?>">
                        <input type="hidden" name="quantites[]" class="quentity2">
                    <?php } ?>
                    <button class="btn btn-success">Proceed to Checkout</button>
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
            document.getElementById("main").style.marginLeft = "0";
        }
    </script>



    <?php include("include/script.php"); ?>
    <script>
        $(document).ready(function() {

            $(".quantity").change(function() {
                let totalquentity = 0;
                let totalprice = 0;


                $(".quantity").each(function() {

                    let quentity = $(this).val();
                    totalquentity = totalquentity + parseInt(quentity);

                    let tprice = $(this).data('price');
                    totalprice = totalprice + (quentity * tprice);

                    $("#totalProduct").text(totalquentity);
                    $("#totalPrice").text(totalprice);


                    $("#totalProduct2").val(totalquentity);
                    $("#totalPrice2").val(totalprice);


                    let index = 0;
                    $(".quantity").each(function() {
                        let quentity = $(this).val();


                        $("input[name='quantites[]']").eq(index).val(quentity);
                        index++;
                    })
                })
            })

            $(".quantity").trigger('change');


        })

        function update() {

        }
    </script>

</body>