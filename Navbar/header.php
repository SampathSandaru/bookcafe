<?php
    include('../page/conn.php');
    //session_start();
    $user_id=$_SESSION['id'];
    $count_query="SELECT sum(c_quantity) as num from `cart` WHERE user_id='$user_id' GROUP by (user_id)";
    $count_result=mysqli_query($con,$count_query);

    if($count_result){
        $rec=mysqli_fetch_assoc($count_result);
        $cart_num=$rec['num'];
    }
    
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>BOOKCAFE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
-->
  </head>
  <body>
    <nav class="">
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
        <div class="row">
            <div class="col-md-3">
                 <label class="logo">BOOKCAFE</label>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-7">
                <ul>
                    <li></li><li></li><li></li><li></li>
                    <li></li><li></li><li></li><li></li>
                    <li></li><li></li><li></li><li></li>
                    <li></li><li></li><li></li><li></li>
                    <li><a href="../index.php">Home</a></li>
                    
                    <li><a href="../page/cart.php"><sup><?php echo $cart_num;?></sup>Card</a></li>
                    <li><a href="../page/My_Order.php">My Order</a></li>
                    <li><a href="../page/msg.php">Massege</a></li>
                    <li><a href="../page/profile.php">Profile</a></li>
                    <li><a href="../page/logout.php">Logout</a></li>
                </ul> 
            </div>
        </div>
      
    </nav>
    <section></section>
  </body>
</html>
