<?php
    include('./connection.php');
    // echo $_GET['id'];
    $user_id = 2;
    $medicine_id = $_GET['id'];

    $is_exist = "select * from cart where user_id='$user_id' and medicine_id='$medicine_id'";
    $run_query = mysqli_query($conn, $is_exist);

    if(mysqli_num_rows($run_query) > 0){
        echo "<script>alert('Already Exist!')</script>";
        echo "<script>window.open('./shop.php','_self')</script>";
        exit();
    }else{
        $insert_val = "insert into cart(user_id, medicine_id)
        values('$user_id','$medicine_id')";

        if(mysqli_query($conn, $insert_val)){
            echo "<script>alert('Inserted Successfully!')</script>";
            echo "<script>window.open('./shop.php','_self')</script>";
            exit();
        }
    }

?>