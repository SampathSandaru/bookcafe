<?php
    include('conn.php');
?>

<html>
    <head>
        
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
        <style>
            
            .head{
                background-color:#0082e6;
                width 100%;
                height: 50px;
                border-radius: 7px;
                color: white;
                padding: 5px 50px; 
                font-size: 25px;
                margin:0 0 20px;
                margin-top: 20px;
                box-shadow:   0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.2);
                user-select: none;
            }
            
            .card:hover{
                transform: scale(1.02);
                transition: 0.4s;
            }
            
            .card{
                text-align: center;
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
         </div>
         <script>
        setInterval(digiclock,1000);
        
        function digiclock(){
            
            var mytime= new Date();
            var h=mytime.getHours();
            var m=mytime.getMinutes();
            var s=mytime.getSeconds();
            
            if(s<10){s="0"+s;}
            if(m<10){m="0"+m;}
            if(h<10){h="0"+h;}
            
            var myclock=h + ":" + m + ":" + s;
            document.getElementById("clock").innerHTML=myclock;
        }
    </script>
    </body>
</html>