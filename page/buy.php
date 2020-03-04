<?php
    $item_qnt=$_POST['number_cart'];
    $item_id=$_GET['id'];
    
    

?>


<html>
    <head>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
        <style>
            .head{
                background-color:#0082e6;
                width 100%;
                color: white;
                padding:15px;
                font-size: 25px;
                margin:0 0 20px 0;
                margin-top:0px;
                box-shadow:   0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.2);
                user-select: none;
            }
            
            .address{
                margin-top: 50px;
                padding: 20px;
                border-radius: 10px;
                box-shadow:   8px 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.2);
            }
        </style>
    </head>
    <body>
        
        <div class="head">
            <div class="row"> 
                   <div class="col-md-4"> 
                        BOOK CAFE
                    </div>   
                <div class="col-md-4"> </div>
                <div class="col-md-4"> 
                    <ul style="float:right;">
                        
                        <li><a href="../index.php" style="color:white;text-decoration:none;">Home</a></li>
                    </ul>
                </div>
            </div>
         </div> 
        
<!--  defalit address -->
        
        <div class="row">
            <div class="col-md-2"></div>
            
            <div class="col-md-7 address">
                <samp><b>Assress</b></samp><hr>
                
            </div>
            
            <div class="col-md-1"></div>
        </div>
        
        
<!--        -->
        
        
        
        <div class="row">
            <div class="col-md-2"></div>
            
            <div class="col-md-7 address">
                <samp><b>Assress</b></samp><hr>
                <div class="form-row">
                    <div class="form-grop col-md-6">
                        First Name : <input type="text" class="form-control">
                    </div>
                    <div class="form-grop col-md-6">
                        Last Name : <input type="text" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-grop col-md-6">
                        Street Address : <input type="text" class="form-control">
                    </div>
                    <div class="form-grop col-md-6">
                        Street Address : <input type="text" class="form-control">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-grop col-md-4">
                        City : <input type="text" class="form-control">
                    </div>
                    <div class="form-grop col-md-4">
                        Province : <input type="text" class="form-control">
                    </div>
                    <div class="form-grop col-md-4">
                        Postal Code : <input type="text" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        Email : <input type="email" class="form-control">
                    </div>
                     <div class="form-group col-md-4">
                        Contact No : <input type="text" class="form-control">
                    </div>
                </div>
            </div>
            
            <div class="col-md-1"></div>

        </div>
    </body>
</html>