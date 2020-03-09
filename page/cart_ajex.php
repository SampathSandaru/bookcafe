<?php

    include('conn.php');

    session_start();
    $user_id=$_SESSION['id'];
    $b_id=$_SESSION['book_id'];

    $qua=$_GET['qua']; 
    
    $sql="INSERT INTO `cart` (b_id,c_quantity,user_id) VALUE('{$b_id}','{$qua}','{$user_id}')";

    $result = mysqli_query($con, $sql);

    $user_id=$_SESSION['id'];
    $price =$_SESSION['book_price'];
    echo $qua;

    
    echo json_encode($rs);
?>