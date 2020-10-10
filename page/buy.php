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
    
    $bk_name=mysqli_query($con,"SELECT `b_name` FROM `book` WHERE b_id='BK001'");
    $b_recode=mysqli_fetch_assoc($bk_name);
    $bk_name=$b_recode['b_name'];

    $query="SELECT * FROM `user` u, `address` a WHERE id='$_SESSION[id]' AND a.user_id=u.id";
    $result=mysqli_query($con,$query);


    if($result){
       $recode=mysqli_fetch_assoc($result);
        $user_email=$recode['email'];
        
    }

//************************PDF********************************************//

require('../fpdf182/fpdf.php');

class PDF extends FPDF{
// Page header
    function Header()
    {   
        date_default_timezone_set("Asia/Colombo");
		$tDate=date('Y-m-d H:i:s');
        // Arial bold 15
        $this->SetFont('Courier','',11);
        $this->Cell(190,0,"Date : ".$tDate,0,1,'R');
        //set line
        $this->Line(10,12,200,12);
        // Logo
        $this->Image('logo.png',60,11,100);
        //set line
        $this->Line(10,30,200,30);
        $this->Line(10,31,200,31);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Move to the right
        $this->Cell(80);
        // Title
        //$this->Cell(30,10,'Title',1,0,'C');
        
        // Line break
        $this->Ln(20);
    }
    
    function FancyTable($header)
            {   
               
               /* $this->Ln(15);
                $this->Cell(20,10,$_SESSION['first_name']." ".$_SESSION['last_name']);
                $this->Ln(6);
                $date=date("Y-m-d");
                $this->Cell(20,10,$date);
                $this->Ln();*/
                
                // Colors, line width and bold font
                $this->SetFillColor(179, 171, 178);
                $this->SetTextColor(0, 0, 0);
                //$this->SetDrawColor(128,0,0);
                $this->SetLineWidth(.1);
                $this->SetFont('','');
                
                
                // Table Header 
                $w = array(25, 35, 40, 45,40); // Table Header colum size and number of colum
                for($i=0;$i<count($header);$i++)
                    $this->Cell($w[$i],6,$header[$i],1,0,'C',false);
                //$this->Ln();
                // Color and font restoration
               /* $this->SetFillColor(224,235,255);
                $this->SetTextColor(0);
                $this->SetFont('');*/
                // Data
                $fill = false;
//                foreach($data as $row)
//                {
//                    $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
//                    $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
//                    $this->Cell($w[2],6,$row[2],'LR',0,'R',$fill);
//                    $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R',$fill);
//                    $this->Ln();
//                    $fill = !$fill;
//                }
                // Closing line
                //$this->Cell(array_sum($w),0,'','T');
            }

// Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

$header = array('Order ID', 'Book', 'Price', 'Quantity','Total Price');
// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->Ln(8);
$pdf->Cell(3);
$pdf->SetFont('Times','',14);

$pdf->FancyTable($header);
    //$pdf->Cell(0,10,'Printing line number ',0,1);
//$pdf->Output();

//***********************************************************************//

    if(isset($_POST['submit1'])){
        $add_name=$_POST['add_name'];
        $address_query="SELECT * FROM `address` WHERE name='$add_name'";
        $address_result=mysqli_query($con,$address_query);
        
        if($address_result){
            $add_recode=mysqli_fetch_assoc($address_result);
            $order_address=$ad1=$add_recode['address_1'];
            $order_address.= $ad2=$add_recode['address_2']." ";
            $order_address.=$ad3=$add_recode['city']." ";
            $order_address.=$ad4=$add_recode['postal_code'];
            $url1=$_POST['url'];
            
            $tot=0;
            $tot=$price*$item_qnt;
            
            //mail function

function send_mail($user_email,$ad1,$ad2,$ad3,$ad4,$bk_name,$tot){
    require '../email/PHPMailerAutoload.php';
    $credential = include('../email/credential.php');   //credentials import
    $mail = new PHPMailer;
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = $credential['user'];           // SMTP username
    $mail->Password = $credential['pass'];                           // SMTP password
    $mail->SMTPSecure = 'tls';                          // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    $mail->setFrom($user_email);
    $mail->addAddress($user_email);             // Name is optional
    $mail->addReplyTo('hello');
    //$mail->addAttachment("../img/order.png");
    $mail->AddEmbeddedImage(dirname(__FILE__) . "../img/order.png","im");
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = "Order Successfull!";
    $tb="Your order has been confirmed";
    $bk="BOOK : ".$bk_name."<br>";
    $bk.="RS : ".$tot;
    
    $mail->Body    = $tb."<br>"."<br>".$bk."<br>"."<br>".$ad1."<br>".$ad2."<br>".$ad3."<br>".$ad4;
    $mail->AltBody = 'If you see this mail. please reload the page.';
    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }else{
       echo "<script>alert('sent Email')</script>";
    }
}
            
            
            
 /****from cart.php****/
        if($url1=="http://localhost/bookcafe/page/cart.php"){
            $get_cart="SELECT * FROM `cart` c,`book` b WHERE user_id=$_SESSION[id] AND c.b_id=b.b_id";
            $get_result=mysqli_query($con,$get_cart);
            if($get_result){
                while($cart_rec=mysqli_fetch_assoc($get_result)){
                    $inser_from_cart="INSERT INTO `order` (book_id,user_id,order_address,order_quantity,order_price) VALUE ('{$cart_rec['b_id']}','{$cart_rec['user_id']}','{$order_address}','{$cart_rec['c_quantity']}','{$cart_rec['price']}')";
                    
                    $insert_result=mysqli_query($con,$inser_from_cart);
                    if($insert_result){
                        
                          send_mail($user_email,$ad1,$ad2,$ad3,$ad4,$bk_name,$tot);
                        
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
            //mail send 
            send_mail($user_email,$ad1,$ad2,$ad3,$ad4,$bk_name,$tot);
            //ss();
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
                        
                         send_mail($user_email,$ad1,$ad2,$ad3,$ad4);
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
            send_mail($user_email);
            
             send_mail($user_email,$ad1,$ad2,$ad3,$ad4);
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
                <samp><b>Address</b></samp> <button type="button" class="btn" style="float:right;">New Address</button> <hr>
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
                <samp><b>New Address</b></samp> <button type="button" id="new_address" class="btn" style="float:right;">Default Address</button> <hr>
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