<?php
    include('conn.php');
    session_start();


    if(isset($_POST['submit'])){
        $email=mysqli_real_escape_string($con,$_POST['email']);
        $pwd=mysqli_real_escape_string($con,$_POST['password']);
        
        $log_query="SELECT * FROM   `user` WHERE email='$email' AND password='$pwd' LIMIT 1";
        $lg_result=mysqli_query($con,$log_query);
        
        if($lg_result){
            if(mysqli_num_rows($lg_result)==1){
                $recode=mysqli_fetch_assoc($lg_result);
                $_SESSION['name']=$recode['fname'];
                $_SESSION['id']=$recode['id'];
                $_SESSION['role']=$recode['role'];
                
                if($_SESSION['role']=='admin'){
                    header("location:admin.php?role='{$_SESSION['role']}'");
                }else{
                    header("location:../index.php");    
                }
                
            }else{
                echo "<script>alert('invalide user name or password')</script>";
            }
        }else{
            echo "query error";
        }
    }

$error="";
    if(isset($_POST['submit_r'])){
        $email=mysqli_real_escape_string($con,$_POST['email']);
        $fname=mysqli_real_escape_string($con,$_POST['fname']);
        $lname=mysqli_real_escape_string($con,$_POST['lname']);
        $num=mysqli_real_escape_string($con,$_POST['num']);
        $pwd1=mysqli_real_escape_string($con,$_POST['pwd1']);
        $pwd2=mysqli_real_escape_string($con,$_POST['pwd2']);
        
        $email_query="SELECT * FROM `user` WHERE email='$email'";
        $email_result=mysqli_query($con,$email_query);
        if($email_result){
            if(mysqli_num_rows($email_result)==1){
                echo "<script>alert('email already registered')</script>";
            }else{
                $error="";
                
                if($pwd1!=$pwd2){
                    echo "<script>alert('Password Not Match')</script>";
                }else{
                    $insert_query="INSERT INTO `user` (fname,lname,email,number,password) VALUE('{$fname}','{$lname}','{$email}','{$num}','{$pwd1}')";
                    $insert_result=mysqli_query($con,$insert_query);
                    
                    if($insert_result){
                        // register seccess
                    }else{
                        // register fail 
                    }
                    
                }
            }
            
        }
        
        
        
    }
?>
<!--send email-->
<?php

if(isset($_POST['submit_email'])){
     require '../email/PHPMailerAutoload.php';
    $credential = include('../email/credential.php');   //credentials import
                $email=$_POST['email'];
                $mail = new PHPMailer;

                //$mail->SMTPDebug = 3;                               // Enable verbose debug output

                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = $credential['user'];           // SMTP username
                $mail->Password = $credential['pass'];                           // SMTP password
                $mail->SMTPSecure = 'tls';                          // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                $mail->setFrom($email);
                $mail->addAddress($email);             // Name is optional

                $mail->addReplyTo('hello');
                $en_email1=base64_encode($email);
                $en_email2=base64_encode($en_email1);
                        
                $mail->isHTML(true);                                  // Set email format to HTML
                $link="<a href=\"http://localhost/bookcafe/page/password_reset.php?email=$en_email2\">cliak here change your password</a>";
                
                $mail->Subject = "Password Reset";
                $mail->Body    = "$link";
                $mail->AltBody = 'If you see this mail. please reload the page.';

                if(!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    echo "<script>alert('sent Email')</script>";
                }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
        
    
    <!--poup box link-->
                
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!--poup box link-->
    
    
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="../img/q.png" />
     <link href="../css/login_page.css"  rel="stylesheet" type="text/css">
    
    <script src="../css/jquery-3.4.1.js"></script>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/navbar.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    
    <style>
        .btn_l{border: none;
            background-color:#edf7f3;
            width: 49%;
            height: 40px;
        }
        
        #text{
            display: none;
            color:red;
        }
        
        .btn-secondary{
            background-color: red;
            color: white;
        }
        .btn-primary{
            color: white;
        }
    </style>
    
</head>
<body id="myInput">
    
    <?php
        include("../css/navbar.html");
    ?>
    <!--nav bar-->


    <!--end of nav bar-->
<div class="row">
<div class="col-md-12">        
        <form method="post">
            <table class="table_1" id="log_tb" style="width:35%;">
                <tr>
                    <td>User Name</td>
                </tr>
                <tr>
                    <td><input type="text" name="email"  class="form-control" placeholder="Email"> </td>
                </tr>
                <tr>
                    <td>Password</td>
                </tr>
                <tr>
                    <td><input type="password" name="password" id=""  class="form-control" placeholder="password">  </td>
                </tr>
                <tr><td id="text">Caps lock is ON.</td></tr>
                <tr>
                    <td>
                        <input type="submit" name="submit" value="Login" class="btn">
                        <input type="reset" value="Cansel" class="btn">
                    </td>
                </tr>
                <tr>
                    <td><a href="#" data-toggle="modal" data-target="#exampleModalCenter">Forget Your Password?</a></td>
                </tr>
                 <tr>
                    <td> Don't have an account! <a href="#" id="sing_in">Sign Up Here</a></td>
                </tr>
            </table>
        </form>
        <!--user register form-->
        <form method="post">
            <table class="table2" id="rge_tb">
                <tr>
                   <td></td>
                   <td><?php echo "$error";?></td>
                </tr>
                <tr>
                   <td>First Name</td>
                   <td><input type="text" name="fname"  class="form-control" placeholder="First Name" required></td>
                </tr>
                 <tr>
                   <td>Last Name</td>
                   <td><input type="text" name="lname"  class="form-control" placeholder="Last Name" required></td>
                </tr>
                  <tr>
                   <td>Contact Number</td>
                   <td><input type="text" name="num"  class="form-control" placeholder="0711234567" maxlength="10" required></td>
                </tr>
                <tr>
                   <td>Email Address</td>
                   <td><input type="email" name="email"  class="form-control" placeholder="email Address" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="pwd1"  class="form-control" placeholder="password" required> </td>
                </tr>
                <tr><td id="text">Caps lock is ON.</td></tr>
                 <tr>
                    <td>Confirm Password</td>
                    <td><input type="password" name="pwd2"  class="form-control" placeholder="Confirm password" required> </td>
                </tr>
                
                 <tr>
                     <td></td>
                     <td>
                        <input type="submit" name="submit_r" value="Register" class="btn">
                        <input type="reset" value="Cansel" class="btn">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>Do you have an account? <a href="#" id="log">Log in</a> </td>
                </tr>
            </table>
        </form>
        <!---->
</div>
</div> 
    
        <!--Modal email-->
        <form method="post">
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Enter Your Email Address</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <input type="email" name="email" class="form-control" placeholder="email address">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" name="submit_email" class="btn btn-primary" value="send Email">
              </div>
            </div>
          </div>
        </div>
    </form>
        <!---->
    
    
    <script>
        $(document).ready(function(){
           $("#sing_in").click(function(){
            $("#log_tb").fadeOut("3000");
            $("#rge_tb").fadeIn("3000");
            });
            
             $("#log").click(function(){
                $("#rge_tb").fadeOut("3000");
                 $("#log_tb").fadeIn("3000");
             });
        });
    </script>
    
    <script>
        var input = document.getElementById("myInput");
        var text = document.getElementById("text");
        input.addEventListener("keyup", function(event) {

        if (event.getModifierState("CapsLock")) {
            text.style.display = "block";
          } else {
            text.style.display = "none"
          }
        });
</script>
</body>
</html>