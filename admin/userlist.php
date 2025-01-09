
<?php


if ($connect) {

   
  $qry = "SELECT * FROM `user`";

   $result = mysqli_query($connect,$qry);

    // $data = mysqli_fetch_assoc($result);
    
 
 ?>
     
   

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <title>User List</title>
        <style>
            body{
                background-color: #bcb0e8;
            }
          img{
            width: 100px;
          }
          img:hover{
            width: 110px;
          }
        </style>
    </head>
    <body>
        <div class="container">
            <h2 class="my-4">User List</h2>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Age</th>
                        <th>Image</th>



                    </tr>
                </thead>
                <tbody>
                  <?php
                  $count=1;
                    while ($data = mysqli_fetch_assoc($result)) {

                      $img="../user_image/".$data["image"];

                      ?>
                     <tr>
                       
                       <td><?php echo $count++ ; ?></td>
                       <td><?php echo $data["fullName"] ; ?></td>
                       <td><?php echo $data["email"] ; ?></td>
                       <td><?php echo $data["contact"] ; ?></td>
                       <td><?php echo $data["age"] ; ?></td>
                       <td><img src="<?php echo $img ; ?>"> </td>

                     </tr>

                    <?php
                    }
                    ?>


                    


                </tbody>
            </table>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
    </html>
    <?php
} else {
    echo "Connection failed: " . mysqli_connect_error();
}
?>



