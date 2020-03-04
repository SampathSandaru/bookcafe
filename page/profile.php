<?php
    include('conn.php');
    session_start();


    $query="SELECT * FROM `user` WHERE id='$_SESSION[id]'";
    $result=mysqli_query($con,$query);

    if($result){
        $recode=mysqli_fetch_assoc($result);
        
    }
?>

<html>
    <head>
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
        
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
        <style>
            .head{
                background-color:#0082e6;
                width 100%;
                color: white;
                padding:12px;
                font-size: 25px;
                margin:0 0 20px 0;
/*                margin-top:-50px;*/
                box-shadow:   0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.2);
                user-select: none;
            }
            
             .address{
                margin-top: 50px;
                padding: 30px;
                border-radius: 10px;
                box-shadow:   8px 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.2);
            }
            .pd{
                padding: 7px;
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
        
        
         <div class="row">
            <div class="col-md-3"></div>
            
            <div class="col-md-6 address">
                <samp><b> </b></samp><hr> 

                <div class="form-row">
                    <div class="col-md-2 pd">
                        <?php echo $recode['fname']." ".$recode['lname'];?>
                     </div>
                </div>
                <div class="form-row">
                    <div class="col-md-2 pd">
                        <?php echo $recode['number'];?>
                     </div>
                </div>
                <div class="form-row">
                    <div class="col-md-2 pd">
                        <?php echo $recode['email'];?>
                     </div>
                </div>
            </div>
            
             
             
            <div class="col-md-1"></div>
        </div>
        
        <div class="row">
            <div class="col-md-3"></div>
            
            <div class="col-md-6 address">
                <samp><b>Address</b><a href="" class="btn" style="float:right;background-color:#f0ebeb" data-toggle="modal" data-target="#exampleModalCenter">Add New Adderss</a></samp><hr> 

                <div class="form-row">
                    <div class="col-md-2 pd">
                        <?php echo $recode['fname']." ".$recode['lname'];?>
                     </div>
                </div>
                <div class="form-row">
                    <div class="col-md-2 pd">
                        <?php echo $recode['number'];?>
                     </div>
                </div>
                <div class="form-row">
                    <div class="col-md-2 pd">
                        <?php echo $recode['email'];?>
                     </div>
                </div>
            </div>
            
             
            <div class="col-md-1"></div>
            
        

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">New Address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <form method="post">
      <div class="modal-body">
<!--        ...-->
          
          <div class="row">
         
            
            <div class="col-md-12">
               
              
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
            
           

        </div>
<!--        ...-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Save">
        
      </div>
    </form>
    </div>
  </div>
</div>
            
<!--        -->
        </div>
        
    </body>
</html>