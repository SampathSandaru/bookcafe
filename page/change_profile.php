<?php
    include('conn.php');
    session_start();
    $succ="none";
    $error="none";
    $error2="none";

    $user_query="SELECT * FROM `user` WHERE id='$_SESSION[id]'";
    $user_result=mysqli_query($con,$user_query);
        
    if($user_result){
         $recode=mysqli_fetch_assoc($user_result);
    }

    if(isset($_POST['submit'])){
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $number=$_POST['p_num'];
        
        $curr_pwd_query="UPDATE `user` set fname='$fname', lname='$lname' , email='$email', number='$number' WHERE id='$_SESSION[id]'";
        $pwd_result=mysqli_query($con,$curr_pwd_query);
        
        if($pwd_result){
            $succ="block";
        }else{
            //query error
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
                              change successfully.
                            </div>
                           
                        </div> 
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label>first Name</label>
                        </div>
                        <div class="form-group col-md-7">
                            <input type="text" class="form-control" name="fname" value="<?php echo $recode['fname'];?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label>Last Name</label>
                        </div>
                        <div class="form-group col-md-7">
                            <input type="text" class="form-control" name="lname" value="<?php echo $recode['lname'];?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label>Email</label>
                        </div>
                        <div class="form-group col-md-7">
                            <input type="email" class="form-control" name="email" value="<?php echo $recode['email'];?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label>Contact Number</label>
                        </div>
                        <div class="form-group col-md-7">
                            <input type="text" class="form-control" name="p_num" value="<?php echo $recode['number'];?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3"></div>
                        <div class="form-group col-md-7">
                            <input type="submit" name="submit" class="btn s_btn" value="Save">
                            <input type="reset" class="btn r_btn" value="cancel">
                        </div>
                    </div>
                </div>
                </form>
            </div>
            
        </div>
    </body>
</html>