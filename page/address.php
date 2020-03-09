<?php
    include('conn.php');
    session_start();
    
    if(!isset($_SESSION['id'])){
        header('location:login.php');
    }

    if(isset($_GET['cart_id'])){
        $delete_query="DELETE FROM `address` WHERE address_id='$_GET[cart_id]'";
        $delete_result=mysqli_query($con,$delete_query);
    }

    $query="SELECT * FROM `user` u, `address` a WHERE id='$_SESSION[id]' AND a.user_id=u.id";
    $result=mysqli_query($con,$query);

    if($result){
       $recode_d=mysqli_fetch_assoc($result);
        
    }

    $id=$_SESSION['id'];
    if(isset($_POST['add_address'])){
        $name=$_POST['name'];
        $add_1=$_POST['address_1'];
        $add_2=$_POST['address_2'];
        $city=$_POST['city'];
        $province=$_POST['province'];
        $postal_code=$_POST['postal_code'];
        $num=$_POST['num'];
        
        
        $add_address="INSERT INTO `address` (name,address_1,address_2,city,Province,postal_code,ad_number,user_id) VALUES('{$name}','{$add_1}','{$add_2}','{$city}','{$province}','{$postal_code}','{$num}','{$id}')";
        
        $add_result=mysqli_query($con,$add_address);
        
        if($add_result){
            
        }else{
            echo "query error";
        }
    }
?>

<html>
    <head>
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
        
        <!--        fontawosome-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
<!--for popup box-->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
        
        <style>
            .address{
                margin-top: 50px;
                padding: 30px;
                border-radius: 10px;
                box-shadow:   8px 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.2);
            }
            .pd{
                padding: 7px;
            }
            
            body{
                overflow-x: hidden;
            }
            
            .btn{
                
            }
        </style>
    </head>
    <body>
         <div class="row">
             <div class="col-md-1"></div>
            <div class="col-md-8 address">
                <samp><b>Address</b><a href="" class="btn" style="float:right;background-color:#f0ebeb" data-toggle="modal" data-target="#exampleModalCenter">Add New Adderss</a></samp><hr>
                
            <?php
                $query="SELECT * FROM `user` u, `address` a WHERE id='$_SESSION[id]' AND a.user_id=u.id";
                $result=mysqli_query($con,$query);
                while($recode=mysqli_fetch_assoc($result)){
                   
                 
            ?>    
                <div class="form-row">
                    <div class="col-md-4 pd">
                        <?php echo $recode['name'];?>
                     </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 pd">
                        <?php echo $recode['address_1'];?>
                     </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 pd">
                        <?php echo $recode['address_2'];?>
                     </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 pd">
                        <?php echo $recode['city'];?>
                     </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 pd">
                        <?php echo $recode['Province'];?>
                     </div>
                </div>
                <div class="form-row">
                    <div class="col-md-2 pd">
                        <?php echo $recode['postal_code'];?>
                     </div>
                </div>
                 <div class="form-row">
                    <div class="col-md-2 pd">
                        <?php echo $recode['ad_number'];?>
                     </div>
                </div>
                <div class="form-row">
                    <div class="col-md-2 pd">
                      <a href="address.php?cart_id=<?php echo $recode['address_id'];?>" style="text-decoration:none;">Delete <i class="fa fa-trash"></i></a>
                     </div>
                </div>
            
            
            <?php
                     echo "<div style=\"border-bottom:2px solid black;\"></div><br>";
                 };
                
            ?>
             </div>
            <div class="col-md-1"></div>
        </div>  
        <br>

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
                    
                     <div class="form-group col-md-4">
                        Name with Initials : <input type="text" class="form-control" name="name">
                    </div>
                </div>
              
                <div class="form-row">
                    <div class="form-grop col-md-6">
                        Street Address 1: <input type="text" class="form-control" name="address_1">
                    </div>
                    <div class="form-grop col-md-6">
                        Street Address 2: <input type="text" class="form-control" name="address_2">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-grop col-md-4">
                        City : <input type="text" class="form-control" name="city">
                    </div>
                    <div class="form-grop col-md-4">
                        Province : <input type="text" class="form-control" name="province">
                    </div>
                    <div class="form-grop col-md-4">
                        Postal Code : <input type="text" class="form-control" name="postal_code">
                    </div>
                </div>
                <div class="form-row">
                    
                     <div class="form-group col-md-4">
                        Contact No : <input type="text" class="form-control" name="num">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-8"></div>
                    <div class="form-group col-md-4">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width:48%;">Close</button>
                        <input type="submit" class="btn btn-primary" name="add_address" value="Save" style="width:48%;">
                    </div>
                
                </div>
            </div>
            
           

          </div></div></form></div></div></div>
    </body>
</html>