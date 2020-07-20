<?php
    include('conn.php');
    session_start();

    if(!isset($_SESSION['id'])){
        header('location:login.php?ul=profile.php');
    }
?>

<html>
    <head>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        
        <!-- for header-->
        <link rel="stylesheet" href="../Navbar/style.css">
<!--    <script src="https://kit.fontawesome.com/a076d05399.js"></script>-->
<!--        -->
        <style>
            body{
                overflow-x: hidden;
            }
            
            .ifrm{
                border: none;
                width: 100%;
                height: 100vh;
            }
            
             .setting_box{
                 margin-top: 100px;
                padding: 20px;
                box-shadow:   4px 4px 4px 0 rgba(0, 0, 0, 0.1), 0 4px 5px 0 rgba(0, 0, 0, 0.2);
                 background-color: #d4d6d5;
                 
            }
            
            .tb a{
                width: 100%;
                color: black; 
                text-decoration: none;
                font-size:18px;
            }
            
            .tb a:hover{
                    margin-left: 10px;
            }
            
            .tb td{
                padding: 8px;
                border-bottom: 1px solid black;
            }
            
            
            /***************************/
            .navigation2 div{
                width:240px;
                height: 40px;
                padding-top: 8px;
                color:#fff;
                background-color: rgba(0,0,0,0.8);
                border-left: 0px solid red;
                transition: border-left 0.5s;
                text-align: center;
                
            }

            .navigation2 div:hover{

                border-left: 40px solid red;
                transition: border-left 0.4s;

            }

            .navigation2 div a{
                padding-left: 25px;

                text-decoration: blink;
                color:#fff;
            }
            /**************************/
        </style>
    </head>
    <body>
         <?php
            include('../Navbar/header.php');
         ?>
        <div class="row">
           
               <div class="col-sm-3 navigation2" style="margin-top: 150px;">
                    <div class="row"><a href="change_profile.php" target="page">Edit Profile</a></div>
                    <div class="row"><a href="change_pwd.php" target="page">Change Password</a></div>
                    <div class="row"><a href="address.php" target="page">Address</a></div>
                </div>
        
            <div class="col-md-9">
                <iframe class="ifrm" name="page" src="change_profile.php"></iframe>
            </div>
        </div>
        
            <!-- Footer -->
    <?php
        include('footer.php');
    ?> 
    </body>
</html>