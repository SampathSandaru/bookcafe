<?php
    include('conn.php');
    session_start();

    if(isset($_GET['cart_id'])){
        $cart_id=$_GET['cart_id'];
        $delet_q="DELETE FROM `cart` WHERE cart_id='$cart_id'"; 
        $reu_de=mysqli_query($con,$delet_q);
    }
    
?>

<html>
    <head>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      
<!--        fontawosome-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        
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
            
            button{
                border: none;
                color: blue;
            }
            
            .card{
                width: 90%;
                height: 300px;
                margin-top: 100px;
                position: relative;
                box-shadow:   8px 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.2);
                padding: 10px;
            }
            
            .tb_card{
                width: 100%;     
            }
            
            .tb_card th{
                padding: 8px;
            }
            
            .tb_card td{
                padding: 12px;
            }
            
            .btn{
                background-color: red;
                color: white;
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
                       
                        
                        <?php
                            $user_id=$_SESSION['id'];
                            $tot=0;
                            $count=0;
                            $tot_p=0;
                            $di_tot=0;
                            $sub_tot=0;
                            $q="SELECT * FROM `cart` c,`book` b WHERE user_id='$user_id' AND b.b_id=c.b_id";
                            $q_result=mysqli_query($con,$q);

                            if($q_result){
                                if(mysqli_num_rows($q_result)>=1){
                                    echo " <tr>
                                        <th>Item</th>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Totel Price</th>
                                        <th>Remove Book</th>
                                    </tr>";
                                     while($b_id_recode=mysqli_fetch_assoc($q_result)){
                                         $bo_id=$b_id_recode['b_id'];
                                         $cart_id=$b_id_recode['cart_id'];
                                         $quantity=$b_id_recode['quantity'];
                                         $tot_p=$b_id_recode['c_quantity']*$b_id_recode['price'];
                                         $sub_tot=$sub_tot+$tot_p;
                                         $tot=$b_id_recode['c_quantity']*$b_id_recode['price'];
                                         $id=$b_id_recode['b_id'];
                                         $im=$b_id_recode['img_path'];
                                         $tb1="<tr>";
                                         $tb1.="<td><img src=\"../$im\"></td>";
                                         $tb1.="<td>$b_id_recode[b_name]</td>";
                                         $tb1.="<td>$b_id_recode[c_quantity]</td>";
                                         $tb1.="<td>$b_id_recode[price]</td>";
                                         $tb1.="<td>$tot</td>";
                                         $tb1.="<td><a href=\"cart.php?cart_id=$b_id_recode[cart_id]\"><i class=\"fa fa-trash\"></i></a></td>";
                                         $tb1.="</tr>";
                                        $count=$count+$b_id_recode['c_quantity'];

                                         echo $tb1;
                                          $disable="";
                                     }
                                }else{
                                     $disable="disabled";
                                    echo "<td>Your cart is Empty..</td>";
                                }
                            }
                        ?>
                                            
                    </table>
                
          </div>
            <div class="col-md-3">
                <div class="card">
                    <form method="post" action="buy.php">
                    <table class="tb_card">
                        <tr>
                            <th>Your Order</th>
                        </tr>
                        <tr>
                            <td>SubTotal</td>
                            <td>Rs :<?php echo $sub_tot;?></td>
                        </tr>
                        <tr>
                            <td>Discount 5%</td>
                            <td>-Rs :<?php if($sub_tot>0){ $di_tot=($sub_tot*5)/100;}else{ $di_tot=0;} echo $di_tot;?></td>
                        </tr>
                        <tr>
                            <td>Item Quantity</td>
                            <td>Rs :<?php echo $count;?></td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>Rs :<?php echo $sub_tot-$di_tot;?></td>
                        </tr>
                        <tr>
                            <td><input type="hidden" name="quantity"></td>
                            <input type="hidden" value="<?php echo $sub_tot-$di_tot;?>" name="price">
                            <td><input type="submit" name="pay" value="Place Order" class="btn" <?php echo $disable?>></td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
            </div>
            <div class="col-md-4"></div>
        </div>
        <br>
        <br>
         <!-- Footer -->
    <?php
        include('footer.php');
    ?>
    </body>
</html>