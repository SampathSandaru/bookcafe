<?php

    include('conn.php');
    session_start();

    if(!isset($_SESSION['id'])){
        header('location:login.php');
    }

    $user_id=$_SESSION['id'];
?>

<html>
    <head>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        
        <!-- for header-->
        <link rel="stylesheet" href="../Navbar/style.css">
<!--    <script src="https://kit.fontawesome.com/a076d05399.js"></script>-->
<!--        -->
        
        <style>
            img{
                width: 100px;
                height: 150px;
            }
            
            .tb1{
                margin-top: 20px;
                width: 100%;
                text-align: center;
                box-shadow:   8px 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.2);
            }
           .tb1 th{
                padding: 15px;
                background-color: #e8e6e6;
            }
            
           .tb1 td{
                padding: 10px;
                background-color: #f7fafa;
                border-bottom: 1px solid black;
               
            }
        </style>
    </head>
    <body>
         <?php
            include('../Navbar/header.php');
        ?>
        
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-7">
                <table class="tb1">
                        <tr>
                            <th>Item</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Date</th>
                            <th>Address</th>
                            
                        </tr>
                        
                        <?php
                            $user_id=$_SESSION['id'];
            
                            $q="SELECT * FROM `order` o, `book` b WHERE user_id='$user_id' AND o.book_id=b.b_id";
                            $q_result=mysqli_query($con,$q);

                            if($q_result){
                                 while($b_id_recode=mysqli_fetch_assoc($q_result)){
                                     
                                     $im=$b_id_recode['img_path'];
                                     
                                     $tb1="<tr>";
                                     $tb1.="<td><img src=\"../$im\"></td>";
                                     $tb1.="<td>$b_id_recode[b_name]</td>";
                                     $tb1.="<td>$b_id_recode[order_quantity]</td>";
                                     $tb1.="<td>Rs: $b_id_recode[order_price]</td>";
                                     $tb1.="<td>$b_id_recode[order_time]</td>";
                                     $tb1.="<td style=\"width:20%;\">$b_id_recode[order_address]</td>";
                                     
                                     $tb1.="</tr>";
                                     
                                     echo $tb1;
                                 }
                                }
                        ?>
                                            
                    </table>
            </div>
        </div>
        <br>
        <br>
          <!-- Footer -->
    <?php
        include('footer.php');
    ?>
    </body>
</html>