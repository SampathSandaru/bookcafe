<?php
    include('conn.php');
    session_start();
    $succ="none";
    $error="none";
    $error2="none";
    if(isset($_POST['submit'])){
        $c_pwd=$_POST['current_pwd'];
        $pwd1=$_POST['pwd1'];
        $pwd2=$_POST['pwd2'];
        
        if($pwd1==$pwd2){
            $curr_pwd_query="SELECT * FROM `user` WHERE id='$_SESSION[id]' and password='$c_pwd'";
            $pwd_result=mysqli_query($con,$curr_pwd_query);
            if($pwd_result){
                if(mysqli_num_rows($pwd_result)==1){
                    
                    $pwd_query="UPDATE `user` set password='$pwd2' WHERE id='$_SESSION[id]'";
                    $pwd_result=mysqli_query($con,$pwd_query);
                    if($pwd_result){
                         $succ="block";
                    }
                   
                }else{
                    $error="block";
                }
            }else{
                //query error
            }
        }else{
           $error2="block";
        }
    }
    
?>

<html>
    <head>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        
        <style>
            .pwd_box{
                margin-top: 100px;
                padding: 20px;
                border-radius: 10px;
                box-shadow:   4px 4px 4px 0 rgba(0, 0, 0, 0.1), 0 4px 5px 0 rgba(0, 0, 0, 0.2);
            }
            .btn{
                width:48%;
            }
            
            .r_btn{
                background-color: red;
                color: white;
            }
            .s_btn{
                background-color:dodgerblue;
                color: white;
            }
            body{
                overflow-x: hidden;
            }
            
        </style>
    </head>
    <body>
        <div class="row">
            <div class="col-md-1"></div>
            
            <div class="col-md-7">
                <form method="post">
                <div class="pwd_box">
                    <div class="form_row">
                       <div class="form-group col-md-12">
                            <div class="alert alert-primary" style="display: <?php echo $succ;?>" role="alert">
                              passowrd change successfully.
                            </div>
                           <div class="alert alert-danger"  style="display: <?php echo $error;?> "role="alert">
                              incurrect current password.
                            </div>
                           <div class="alert alert-danger"  style="display: <?php echo $error2;?> "role="alert">
                              password not match.
                            </div>
                        </div> 
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label>Current password</label>
                        </div>
                        <div class="form-group col-md-7">
                            <input type="password" class="form-control" name="current_pwd" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label>New password</label>
                        </div>
                        <div class="form-group col-md-7">
                            <input type="password" class="form-control" name="pwd1" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label>Confirm password</label>
                        </div>
                        <div class="form-group col-md-7">
                            <input type="password" class="form-control" name="pwd2" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3"></div>
                        <div class="form-group col-md-7">
                            <input type="submit" name="submit" class="btn s_btn" value="change password">
                            <input type="reset" class="btn r_btn" value="cancel">
                        </div>
                    </div>
                </div>
                </form>
            </div>
            
        </div>
    </body>
</html>