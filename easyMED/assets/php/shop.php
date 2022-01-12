<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine_shore</title>

    <!-- font: Playfair Display, Semi-bold 600 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&display=swap" rel="stylesheet">

    
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/shop.css">

    <!-- w3 School: Font Awesome 5 -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    <div class="nav">
        <nav>
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                <i class="fas fa-bars"></i>
            </label>
    
            <label class="logo">easyMED</label>
            <ul>
                <li><a class="active" href="../../index.html">Home</a></li>
                <li><a href="">Doctor</a></li>
                <li><a href="#">Medicine</a></li>
                <li><a href="">Blood</a></li>
                <li><a href="">Ambulance</a></li>
                <li><a href="cart.php">Cart</a></li>
            </ul>
        </nav>
    </div>




    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Brand</th>
                    <th>Unit Available</th>
                    <th>Unit Price</th>
                    <th>Add to Cart</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    include('./connection.php');

                    $qry = "SELECT * from medicine";
                    $test = mysqli_query($conn, $qry);

                    while($data = mysqli_fetch_array($test)){
                ?>
                    <tr>
                        <td><?php  echo $data[1] ?><br><?php echo $data[2] ?></td>
                        <td><?php  echo $data[3] ?><br><?php echo $data[4] ?></td>
                        <td><?php  echo $data[5] ?></td>
                        <td><?php  echo $data[6] ?></td>
                        <td><?php  echo $data[7] ?></td>
                        <td><a href="./addToCart.php?id=<?php echo $data[0] ?>">ADD</a></td>
                    </tr>
                <?php
                }

                ?>

            </tbody>
        </table>
    </div>

</body>
</html>