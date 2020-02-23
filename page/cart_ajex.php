<?php

    include('conn.php');

    session_start();
    $user_id=$_SESSION['id'];
    $b_id=$_SESSION['book_id'];

    $qua=$_GET['qua']; 
    
    $sql="INSERT INTO `cart` (b_id,c_quantity,user_id) VALUE('{$b_id}','{$qua}','{$user_id}')";
    //$sql="DELETE FROM `cart` WHERE cart_id='$c_id'";
    //$sql = "SELECT * FROM `stock` WHERE `size` = {$_GET['size']}";

    $result = mysqli_query($con, $sql);

    $user_id=$_SESSION['id'];
?>