<?php
     include('conn.php');
    session_start();
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
        
        <style>
            .box{
                width: 100%;
                height: 130px;
                background-color: darkgreen;
                color: white;
                margin-top: 160px;
                border-radius: 8px;
                text-align: center;
                padding: 27px;
            }
            
            .tb{
                color: white;
                font-size: 35px;
                width: 100%;
            }
            
            .fa{
                font-size: 2.5em;
            }
        </style>
    </head>
    
    <body>
    <?php
            include('../Navbar/header.php');
    ?>
        
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="box">
                    <table class="tb">
                        <tr> 
                            <td><i class="fa fa-check-circle-o" aria-hidden="true"></i> </td>
                            <td>Your Order Success!</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
        
    </body>
</html>