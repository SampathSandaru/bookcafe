<?php

    include('conn.php');
    session_start();
        
    $url=$_SERVER['HTTP_REFERER'];
    $item_qnt=$_POST['quantity'];
    
    if(isset($_GET['price'])){
       $price=$_GET['price']; 
    }

    if(isset($_GET['id'])){
       $item_id=$_GET['id']; 
    }
    $user_id=$_SESSION['id'];
    
    if(isset($_POST['price'])){
        $tot=$_POST['price'];
    }else if(isset($_GET['price'])){
        $tot=$price*$item_qnt;
    }
    $query="SELECT * FROM `user` u, `address` a WHERE id='$_SESSION[id]' AND a.user_id=u.id";
    $result=mysqli_query($con,$query);

    if($result){
       $recode=mysqli_fetch_assoc($result);
        
    }

    if(isset($_POST['submit1'])){
        $add_name=$_POST['add_name'];
        $address_query="SELECT * FROM `address` WHERE name='$add_name'";
        $address_result=mysqli_query($con,$address_query);
        
        if($address_result){
            $add_recode=mysqli_fetch_assoc($address_result);
            $order_address=$add_recode['address_1'];
            $order_address.=$add_recode['address_2']." ";
            $order_address.=$add_recode['city']." ";
            $order_address.=$add_recode['postal_code'];
            $url1=$_POST['url'];
            
            $tot=0;
            $tot=$price*$item_qnt;
            
 /****from cart.php****/
        if($url1=="http://localhost/bookcafe/page/cart.php"){
            $get_cart="SELECT * FROM `cart` c,`book` b WHERE user_id=$_SESSION[id] AND c.b_id=b.b_id";
            $get_result=mysqli_query($con,$get_cart);
            if($get_result){
                while($cart_rec=mysqli_fetch_assoc($get_result)){
                    $inser_from_cart="INSERT INTO `order` (book_id,user_id,order_address,order_quantity,order_price) VALUE ('{$cart_rec['b_id']}','{$cart_rec['user_id']}','{$order_address}','{$cart_rec['c_quantity']}','{$cart_rec['price']}')";
                    
                    $insert_result=mysqli_query($con,$inser_from_cart);
                    if($insert_result){
                        //auantity (-)
                        $qua_que="UPDATE `book` SET quantity=quantity-$cart_rec[c_quantity] WHERE b_id='$cart_rec[b_id]'";
                        $qua_res=mysqli_query($con,$qua_que);
                        //
                        
                        // delete cart tb
                        
                        $delete_cart="DELETE FROM `cart` WHERE cart_id='$cart_rec[cart_id]'";
                        $dele_result=mysqli_query($con,$delete_cart);
                        header("location:order_seccuss.php");
                        
                    }else{
                        echo "<script>alert('insert error')</script>";
                    }
                }
            }else{
                echo "<script>alert('cart tb error')</script>";
            }
        }else{
            $order_query="INSERT INTO `order` (book_id,user_id,order_address,order_quantity,order_price) VALUE('{$item_id}','{$user_id}','{$order_address}','{$item_qnt}','{$tot}')";
            $order_result=mysqli_query($con,$order_query);
            
            //auantity (-)
            $qua_que="UPDATE `book` SET quantity=quantity-$item_qnt WHERE b_id='$item_id'";
            $qua_res=mysqli_query($con,$qua_que);
            //
             header("location:order_seccuss.php");
        }
  /***************/
            
            
        }
        
        
//        echo "<script>alert('$add_name')</script>";
        
      
    }

    if(isset($_POST['submit2'])){
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $address_1=$_POST['address_1'];
        $address_2=$_POST['address_2'];
        $city=$_POST['city'];
        $province=$_POST['province'];
        $postal_code=$_POST['postal_code'];
        $p_number=$_POST['p_number'];
        $email=$_POST['email'];
        $url1=$_POST['url'];
        
        $address=$fname." ".$lname." ".$address_1." ".$address_2." ".$city." ".$province." ".$postal_code;
        $tot=0;
        $tot=$price*$item_qnt;
        
       
        
/****from cart.php****/
        if($url1=="http://localhost/bookcafe/page/cart.php"){
            $get_cart="SELECT * FROM `cart` c,`book` b WHERE user_id=$_SESSION[id] AND c.b_id=b.b_id";
            $get_result=mysqli_query($con,$get_cart);
            if($get_result){
                while($cart_rec=mysqli_fetch_assoc($get_result)){
                    $inser_from_cart="INSERT INTO `order` (book_id,user_id,order_address,order_quantity,order_price) VALUE ('{$cart_rec['b_id']}','{$cart_rec['user_id']}','{$address}','{$cart_rec['c_quantity']}','{$cart_rec['price']}')";
                    
                    $insert_result=mysqli_query($con,$inser_from_cart);
                    if($insert_result){
                        //quantity (-)
                        $qua_que="UPDATE `book` SET quantity=quantity-$cart_rec[c_quantity] WHERE b_id='$cart_rec[b_id]'";
                        $qua_res=mysqli_query($con,$qua_que);
                        //
                        // delete cart tb
                        
                        $delete_cart="DELETE FROM `cart` WHERE cart_id='$cart_rec[cart_id]'";
                        $dele_result=mysqli_query($con,$delete_cart);
                        header("location:order_seccuss.php");
                    }else{
                        echo "<script>alert('insert error')</script>";
                    }
                }
            }
        }else{
             $order_query="INSERT INTO `order` (book_id,user_id,order_address,order_quantity,order_price) VALUE('{$item_id}','{$user_id}','{$address}','{$item_qnt}','{$tot}')";
            $order_result=mysqli_query($con,$order_query);
            //quantity (-)
            $qua_que="UPDATE `book` SET quantity=quantity-$item_qnt WHERE b_id='$item_id'";
            $qua_res=mysqli_query($con,$qua_que);
            header("location:order_seccuss.php");
            //
        }
  /***************/
        
        
    }

?>


<html>
    <head>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        
<!--for payment card-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--        -->
        
<!-- for header-->
        <link rel="stylesheet" href="../Navbar/style.css">
<!--    <script src="https://kit.fontawesome.com/a076d05399.js"></script>-->
<!--        -->
        
        
        <script>
            $(document).ready(function(){
                $("button").click(function(){
                    $("#address_1").hide(500);
                    $(".address_new").show(500);
                });
                
                $("#new_address").click(function(){
                    $(".address_new").hide(500);
                    $("#address_1").show(500);
                });
            });
        </script>
        
        <script>
            function script(){
                var xhttp;
               
                var name=document.getElementById("myslect").value;
                   
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function(){
                    
                   if(this.readyState == 4 && this.status == 200) {
                       document.getElementById("txtHint").innerHTML = this.responseText;                  
                    }
                };
                
                xhttp.open("GET","address_ajex.php?name=" + name, true);
                xhttp.send();
            } 
        </script>
        
        <style>
            .address{
                margin-top: 50px;
                padding: 20px;
                border-radius: 10px;
                box-shadow:   8px 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.2);
            }
            
            .address_new{
                display: none;
            }
            
            
            
        </style>
    </head>
    <body>
        
        <?php
            include('../Navbar/header.php');
        ?>
        
<!--  defalit address -->
        <div class="row">
            <div class="col-md-2"></div>
            
            <div class="col-md-7 address" id="address_1">
                <samp><b>Assress</b></samp> <button type="button" class="btn" style="float:right;">New Address</button> <hr>
                <form method="post" action="">
                    <input type="hidden" name="quantity" value="<?php echo $item_qnt;?>">
                <div class="form-row">
                    <div class="col-md-5 pd">
                        <select class="form-control" id="myslect" onchange="script()" name="add_name">
                            <option>Select Name</option>
                            <?php
                                 $query2="SELECT * FROM `address` WHERE user_id='$_SESSION[id]'";
                                 $result_2=mysqli_query($con,$query2);
                             
                                if($result_2){
                                   while($recode_2=mysqli_fetch_assoc($result_2)){
                                      echo "<option value=\"$recode_2[name]\">$recode_2[name]</option>";
                                   }
                                }
       
                            ?>
                        </select>
                     </div>
                </div><br>
                
                 <div class="form-row">
                    <div class="col-md-4 pd">
                        <lable id="txtHint"></lable>
                     </div>
                </div>
                <hr>
                <samp><b>Payemt Method</b></samp> 
                    <div class="icon-container">
                      <i class="fa fa-cc-visa" style="color:navy;"></i>
                      <i class="fa fa-cc-amex" style="color:blue;"></i>
                      <i class="fa fa-cc-mastercard" style="color:red;"></i>
                      <i class="fa fa-cc-discover" style="color:orange;"></i>
                    </div>
                    <br>
                
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            Card Holder : <input type="text" class="form-control" placeholder="A.B Silwa" required>
                        </div>
                         <div class="form-group col-md-5">
                            Card Number : <input type="text" class="form-control" placeholder="0000 0000 0000 0000" maxlength="16" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            CVC: <input type="text" class="form-control" placeholder="123" maxlength="3" required>
                        </div>
                         <div class="form-group col-md-5">
                            Expires : <input type="text" class="form-control" placeholder="Ex : 01/25" required>
                        </div>
                    </div>
                    <input type="hidden" value="<?php echo $url;?>" name="url">
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <input type="submit" value="Confirm" name="submit1" class="btn" style="background-color:red;color:white;">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Rs :<?php echo $tot;?>.00</label>
                        </div>
                    </div>
                </form>    
            </div>
            
            <div class="col-md-1"></div>
        </div>
        
        
<!--        -->
        
        
        
        <div class="row">
            <div class="col-md-2"></div>
            
            <div class="col-md-7 address address_new">
                <samp><b>New Assress</b></samp> <button type="button" id="new_address" class="btn" style="float:right;">Default Address</button> <hr>
                <form method="post">
                    <input type="hidden" name="quantity" value="<?php echo $item_qnt;?>">
                <div class="form-row">
                    <div class="form-grop col-md-6">
                        First Name : <input type="text" class="form-control" name="fname" required>
                    </div>
                    <div class="form-grop col-md-6">
                        Last Name : <input type="text" class="form-control" name="lname" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-grop col-md-6">
                        Street Address : <input type="text" class="form-control" name="address_1" required>
                    </div>
                    <div class="form-grop col-md-6">
                        Street Address : <input type="text" class="form-control" name="address_2" required>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-grop col-md-4">
                        City : <input type="text" class="form-control" name="city" required>
                    </div>
                    <div class="form-grop col-md-4">
                        Province : <input type="text" class="form-control" name="province" required>
                    </div>
                    <div class="form-grop col-md-4">
                        Postal Code : <input type="text" class="form-control" name="postal_code" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        Email : <input type="email" class="form-control" name="email" required>
                    </div>
                     <div class="form-group col-md-4">
                        Contact No : <input type="text" class="form-control" name="p_number" required>
                    </div>
                </div>
                
                
                    
                    <hr>
                     <samp><b>Payemt Method</b></samp>
                    
                    <div class="icon-container">
                      <i class="fa fa-cc-visa" style="color:navy;"></i>
                      <i class="fa fa-cc-amex" style="color:blue;"></i>
                      <i class="fa fa-cc-mastercard" style="color:red;"></i>
                      <i class="fa fa-cc-discover" style="color:orange;"></i>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            Card Holder : <input type="text" class="form-control" placeholder="A.B Silwa" required>
                        </div>
                         <div class="form-group col-md-5">
                            Card Number : <input type="text" class="form-control" placeholder="0000 0000 0000 0000" maxlength="16" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            CVC: <input type="text" class="form-control" placeholder="123" maxlength="3" required>
                        </div>
                         <div class="form-group col-md-5">
                            Expires : <input type="text" class="form-control" placeholder="01/25" required>
                        </div>
                    </div>
                     <input type="hidden" value="<?php echo $url;?>" name="url">
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <input type="submit" value="Confirm" name="submit2" class="btn" style="background-color:red;color:white;">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Rs :<?php echo $tot;?>.00</label>
                        </div>
                    </div>
                    
                 </form>
            </div>
           
            <div class="col-md-1"></div>

        </div>
        <br>
        <br>
          <!-- Footer -->
    <?php
        include('footer.php');
    ?>
    </body>
</html>