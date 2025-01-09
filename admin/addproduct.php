<?php

if (isset($_POST['Add_product'])) {
    include("../include/dbconnect.php");

    $prname= $_POST["prName"];
    $prcat= $_POST["ProductCategory"];
    $prprice= $_POST["prPrice"];
    $prdescription=mysqli_real_escape_string($connect,$_POST["prDescription"]);
    $pravailable= $_POST["Available"];


    $file = $_FILES["image"];
   

    $orgname = $file["name"];
    $orgsize = $file["size"];
    $orgtmp = $file["tmp_name"];
    $orgtype = $file["type"];

    $fileinfo = pathinfo($orgname);
    

    $fileexte = strtolower($fileinfo['extension']);

    $ext = array('jpg', 'png', 'jpeg', 'bmp');

    $corr = in_array($fileexte, $ext);

    if ($corr) {
        if ($file["size"] > 100000 && $file["size"] < 500000) {
            $target_dir = "../primage/";
            $target_file = $target_dir.$prcat. "/" . basename($file["name"]);
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
               
                 $qry = "INSERT INTO `products`(`pid`, `prName`, `prCategory`, `prPrice`, `prDescription`, `Available`, `image`, `upoaded_at`) VALUES (Null,'$prname','$prcat','$prprice','$prdescription','$pravailable','$orgname',now(
             ))";

                    $result = mysqli_query($connect,$qry);

                    if ($result) {
                        ?><script >alert("Product Add Successfully" <?php echo $prname; ?>)</script> <?php
                     }else{
                        echo "Failed Add Product : ".mysqli_error($connect); 
                    }
                
            } else {
                echo "Failed to upload the file.";
            }
        } else {
            echo "File size is too big or too small";
        }
    } else {
        echo "Invalid Extension";
    }


    



}
?>



  <title>Add Product</title>
  <style >
    body{
                background-color: #bcb0e8;
            }
  	.card{
  		width: 500px;
  	}
  </style>

<div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center mb-4">Add Product</h3>
                        <form id="productform" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="prName">Product Name</label>
                                <input type="text" class="form-control" id="prName" name="prName" required>
                            </div>
                            <div class="form-group">
                                <label for="Product_Category" >Product Category</label>
                                <select class="form-control "  name="ProductCategory">
                                	<option value="electronics">Electronics</option>
                                	<option value="dress">Dress</option>
                                	<option value="studyMaterial">Study Material</option>
                                	<option value="exerisesequipment">Exerise equipment</option>
                                	<option value="otherProducts">Other Products</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="prPrice">Product Price</label>
                                <input type="number" class="form-control" id="prPrice" name="prPrice" required>
                            </div>
                            <div class="form-group">
                                <label for="prDescription">Product Description</label>
                                <input type="text" class="form-control" id="prDescription" name="prDescription" required>
                            </div>
                            <div class="form-group">
                                <label for="Available">Available</label>
                                <input type="text" class="form-control" id="Available" name="Available" required>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" id="image" name="image" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" name="Add_product">Add product</button>
                           
                        </form>
                    </div>
                </div>
            
        </div>
    </div>