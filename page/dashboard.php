<?php
    include('conn.php');
?>
<?php

    $sql = "DELETE FROM `msg` WHERE expir_date <= CURDATE()";
    $result=mysqli_query($con,$sql);

    if(isset($_POST['subnmit'])){
        $sub=$_POST['sub'];
        $msg=$_POST['msg'];
        $date=date("Y-m-d");
        $expire_date=date("Y-m-d",strtotime("+10 day"));
        
        $msg_query="INSERT INTO `msg` (subject,message,date,expir_date) VALUE('{$sub}','{$msg}','{$date}','{$expire_date}')";
        $result=mysqli_query($con,$msg_query);
    }

    if(isset($_GET['m_id'])){
       $delete_qu="DELETE FROM `msg` WHERE msg_id='$_GET[m_id]'";
        $dele_resu=mysqli_query($con,$delete_qu);
    }
?>
<html>
    <head>
        
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
           <!--        fontawosome-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <style>
            
            .head{
                background-color:#0082e6;
                width 100%;
                height: 50px;
              
                color: white;
                padding: 5px 50px; 
                font-size: 25px;
                margin:0 0 20px;
                margin-top: 20px;
                box-shadow:   0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.2);
                user-select: none;
            }
            
            .msg{
                
                 padding: 15px 50px; 
                 box-shadow:   0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.2);
            }
            .card:hover{
                transform: scale(1.02);
                transition: 0.4s;
            }
            
            .card{
                text-align: center;
            }
            
            .btn{
                width: 48%;
            }
            
            .btn_r{
                background-color:red;
                color: aliceblue;
            }
            
            .btn_s{
                background-color:#0082e6;
                color: aliceblue;
            }
            
            .not{
                padding: 15px;
                font-size: 27px;
                user-select: none;
            }
            
            .msg_tb{
                width: 100%;
                text-align: center;
                margin-top:80px;
                padding: 10px 15px;
                box-shadow:   0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.2);
            }
            
            .msg_tb th{
                padding: 15px;
                background-color: brown;
                color: aliceblue;
            }
            
            .msg_tb td{
                padding: 10px;
                background-color: azure;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div style="float:right;padding:8px;color:white;" id="clock">
            00:00:00
            </div>
        <div class="head">
            Admin Dashboard
        </div>
        <div class="row">
        <div class="col-md-4">
                  <a href="book.php">  <div class="card img-fluid border-warning mb-3" style="width: 18rem;height: 10rem;box-shadow: 4px 4px 4px rgba(130,138,145, 0.5);">
                        <div class="card-body card-img-overlay text-warning">
                            <h4 class='card-title'>Book</h4>
                            <h1>
                                   <?php
                                        $book="SELECT count(b_id) as b_c FROM `book`";
                                        $b_result=mysqli_query($con,$book);
                                        if($b_result){
                                            $recode_b=mysqli_fetch_assoc($b_result);
                                            echo $recode_b['b_c'];
                                        }
                                    ?>
                            </h1>
                        </div>
                    </div></a>
            </div>
            
            <div class="col-md-4">
                  <a href="new_order.php">  <div class="card img-fluid border-warning mb-3" style="width: 18rem;height: 10rem;box-shadow: 4px 4px 4px rgba(130,138,145, 0.5);">
                        <div class="card-body card-img-overlay text-warning">
                            <h4 class='card-title'>New Order</h4>
                            <h1>
                                   <?php
                                        $book="SELECT count(id)  as c FROM `order`  WHERE is_order='1'";
                                        $b_result=mysqli_query($con,$book);
                                        if($b_result){
                                            $recode_b=mysqli_fetch_assoc($b_result);
                                            echo $recode_b['c'];
                                        }
                                    ?>
                            </h1>
                        </div>
                    </div></a>
            </div>
            
            <div class="col-md-4">
                    <div class="card img-fluid border-warning mb-3" style="width: 18rem;height: 10rem;box-shadow: 4px 4px 4px rgba(130,138,145, 0.5);">
                        <div class="card-body card-img-overlay text-warning">
                            <h4 class='card-title'>User</h4>
                            <h1>
                                   <?php
                                        $book="SELECT count(id) as u_c FROM `user`";
                                        $b_result=mysqli_query($con,$book);
                                        if($b_result){
                                            $recode_b=mysqli_fetch_assoc($b_result);
                                            echo $recode_b['u_c'];
                                        }
                                    ?>
                            </h1>
                        </div>
                    </div>
            </div>
         </div>
            
            <div class="not">
             Add  Notice
            </div>
                <form method="post" class="msg">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Subject</label>
                        <input type="text" class="form-control" name="sub" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Massage</label>
                        <textarea cols="30" rows="5" class="form-control" name="msg" required></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="reset" class="btn btn_r">
                        <input type="submit" class="btn btn_s" name="subnmit">
                        
                    </div>
                </div>
            </form>
            
            <table class="msg_tb">
                <?php
                    $m_qu="SELECT * FROM `msg`";
                    $m_resu=mysqli_query($con,$m_qu);
                
                    if($m_resu){
                       if(mysqli_num_rows($m_resu)>=1){
                           echo "<tr>";
                           echo "<th>Subject</th>";
                           echo "<th>Message</th>";
                           echo "<th>Date</th>";
                           echo "<th>Delete message</th>";
                           echo "</tr>";
                           while($recode=mysqli_fetch_assoc($m_resu)){
                               $tb="<tr>";
                               $tb.="<td>$recode[subject]</td>";
                               $tb.="<td style=\"text-align:left;\">$recode[message]</td>";
                               $tb.="<td style=\"text-align:left;\">$recode[date]</td>";
                               $tb.="<td><a href=\"dashboard.php?m_id=$recode[msg_id]\"><i class=\"fa fa-trash\"></i></a></td>";
                               $tb.="</tr>";
                               
                               echo $tb;
                           }
                       } 
                    }
                ?>
            </table>
            <br>
            <br>
            <br>
         </div>
         <script>
        setInterval(digiclock,1000);
        
        function digiclock(){
            
            var mytime= new Date();
            var h=mytime.getHours();
            var m=mytime.getMinutes();
            var s=mytime.getSeconds();
            var a="am";
            
            if(s<10){s="0"+s;}
            if(m<10){m="0"+m;}
            
            if(h>12){
                h=h-12;
                a="pm";
            }
            if(h<10){h="0"+h;}
            
            var myclock=h + ":" + m + ":" + s +" "+a;
            document.getElementById("clock").innerHTML=myclock;
        }
    </script>
    </body>
</html>

