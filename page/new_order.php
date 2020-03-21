<?php
    include('conn.php');
    session_start();

    if(!isset($_SESSION['id'])){
        header("location:login.php");
    }

    if(isset($_GET['order_id'])){
       $accept_book="UPDATE `order` set is_order='0' WHERE id=$_GET[order_id]";
       $accept_result=mysqli_query($con,$accept_book);
    }
?>

<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        
        <style>
            .head{
                background-color:#0082e6;
                width 100%;
                height: 50px;
                border-radius: 7px;
                color: white;
                padding: 8px 60px;
                font-size: 25px;
                margin:0 0 20px;
                margin-top: 60px;
                box-shadow:   0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.2);
                user-select: none;
            }
            
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
            .btn{
                background-color:#0082e6;
                color: white;
            }
            
        </style>
    </head>
    <body>
        
        <div class="head">
            New Order
        </div>
        
        <div class="row">
<!--            <div class="col-md-12"></div>-->
            <div class="col-md-11">
                <table class="tb1">
                        <tr>
                            <th>Item</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Order Accept</th>
                            
                        </tr>
                        
                        <?php
                            $user_id=$_SESSION['id'];
            
                            $q="SELECT * FROM `order` o, `book` b WHERE is_order='1' AND o.book_id=b.b_id";
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
                                     $tb1.="<td>$_SESSION[name]</td>";
                                     $tb1.="<td style=\"width:20%;\">$b_id_recode[order_address]</td>";
                                     $tb1.="<td><a href=\"new_order.php?order_id=$b_id_recode[id]\"><button class=\"btn\">Accept</button></a></td>";
                                     
                                     $tb1.="</tr>";
                                     
                                     echo $tb1;
                                 }
                                }
                        ?>
                                            
                    </table>
            </div>
        </div>
    </body>
</html>