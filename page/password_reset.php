<?php
    include('conn.php');
    session_start();

    $en_email=$_GET['email'];
    $email1=base64_decode($en_email);
    $email=base64_decode($email1);
//    echo $email;
    $succ="none";
    $error2="none";
    if(isset($_POST['submit'])){
        $pwd1=$_POST['pwd1'];
        $pwd2=$_POST['pwd2'];
        
        if($pwd1==$pwd2){
            $sql="SELECT * from `user` WHERE email='$email'";
            $result=mysqli_query($con,$sql);
            if($result){
                if(mysqli_num_rows($result)==1){
                    $update_pwd="UPDATE `user` SET password='$pwd1' WHERE email='$email'";
                    $update_result=mysqli_query($con,$update_pwd);
                    if($update_result){
                        $succ="block";
                    }else{
//                        echo "pwd change error";
                    }
                }
            }
        }else{
            $error2="block";
            //pwd dosen't match
        }
    }

?>

<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        
        <style>
/*
            body{background:linear-gradient(rgb(0,0,0,0.7),rgb(0,0,0,0.7)),url(../img/pwd.jpg);
			background-size: 100% 100%;}
*/
            
            .box{
                margin-top: 200px;
                background-color: rgb(0,0,0,0.7);
                color: white;
                padding: 10px;
                width: 80%;
                border-radius: 8px;
            }
            .btn{
                width: 48%;
            }
        </style>
    </head>
    <body>
        <div class="container">
             <form method="post">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-5 box">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                           <div class="alert alert-primary" style="display: <?php echo $succ;?>" role="alert">
                              passowrd change successfully.
                            </div>
                            <div class="alert alert-danger"  style="display: <?php echo $error2;?> "role="alert">
                              password not match.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>New Password</label>
                            <input type="password" class="form-control" name="pwd1" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" name="pwd2" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input type="reset" class="btn btn-outline-danger">
                            <input type="submit" name="submit" class="btn btn-outline-primary" value="Save">
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
            </form>
        </div>
    </body>
</html>