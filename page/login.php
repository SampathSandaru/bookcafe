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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
        
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
                    <td>Forget Your Password?</td>
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
                   <td>First Name</td>
                   <td><input type="text" name="fname"  class="form-control" placeholder="First Name"></td>
                </tr>
                 <tr>
                   <td>Last Name</td>
                   <td><input type="text" name="lname"  class="form-control" placeholder="Last Name"></td>
                </tr>
                  <tr>
                   <td>Contact Number</td>
                   <td><input type="text" name="lname"  class="form-control" placeholder="0711234567"></td>
                </tr>
                <tr>
                   <td>Email Address</td>
                   <td><input type="email" name="email"  class="form-control" placeholder="email Address"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="pwd1"  class="form-control" placeholder="password"> </td>
                </tr>
                <tr><td id="text">Caps lock is ON.</td></tr>
                 <tr>
                    <td>Confirm Password</td>
                    <td><input type="password" name="pwd2"  class="form-control" placeholder="Confirm password"> </td>
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