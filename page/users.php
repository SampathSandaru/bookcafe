<?php
    include('conn.php');
    session_start();

    if(!isset($_SESSION['id'])){
        header("location:login.php");
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
                text-align:left;
            }
            
           .tb1 td{
                padding: 10px;
                background-color: #f7fafa;
                border-bottom: 1px solid black;
                text-align:left;
            }
            
        </style>
    </head>
    <body>
        
        <div class="head">
            Order History
        </div>
        
        <div class="row">
<!--            <div class="col-md-12"></div>-->
            <div class="col-md-11">
                <table class="tb1">
                        <tr>
                            <th>First Name</th>
                            <th>Email</th>
                            <th>Contact Number</th>
                            
                        </tr>
                        
                        <?php
                            $user_id=$_SESSION['id'];
            
                            $q="SELECT * FROM `user`";
                            $q_result=mysqli_query($con,$q);

                            if($q_result){
                                 while($b_id_recode=mysqli_fetch_assoc($q_result)){
                                     
                                     $tb1="<tr>";
                                     $tb1.="<td>$b_id_recode[fname] $b_id_recode[lname]</td>";
                                     $tb1.="<td>$b_id_recode[email]</td>";
                                     $tb1.="<td>$b_id_recode[number]</td>";
                                     
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