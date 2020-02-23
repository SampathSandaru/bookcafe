<?php
    include('conn.php');
    session_start();
    
    if(!isset($_SESSION['id'])){
        header("location:login.php");
    }

    $altScs="none";
    $altReq="none";
    $id=$_GET['id'];
    if(isset($_POST['submit'])){
        $a_name=mysqli_real_escape_string($con,$_POST['name']);
        
       
        $au_query="UPDATE `author` SET a_name='$a_name' WHERE a_id='$id'";
        $au_rwsult=mysqli_query($con,$au_query);

        if($au_rwsult){
            $altScs="block";
            $altReq="none";
        }else{
            $altScs="none";
            $altReq="block";
        }
            
    }
?>

<html>
    <head>
        
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
        <link rel="stylesheet" href="../css/navbar.css">
        
        <style>
                 
            body{
            }

            .btn{
                width: 80%;
                background-color: #0082e6;
                color: white;
                margin-top: 31px;
            }
            
            .btn:hover{
                transform: scale(1.02);
                transition: 0.4s;
            }
            
            .box{
/*
                background-color: rgba(0,0,0,0.5);
                width: 100%;
                height: 450px;
                border-radius: 10px;
                color: white;*/
                padding: 30px 30px;
                box-shadow:   8px 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.2);
            }
            
            .box:hover{
                transform: scale(1.01);
                transition: 0.4s;
            }
            
            .head{
                background-color:#0082e6;
                width 100%;
                height: 50px;
                border-radius: 7px;
                color: white;
                padding: 8px 60px;
                font-size: 25px;
                margin:0 0 20px;
                margin-top: -20px;
                box-shadow:   0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.2);
                user-select: none;
            }
            
            label{
                user-select: none;
            }
            
        </style>
        
    </head>
    <body>
        
        <br>
        <br>
        <br>
        <br>
        
       <div class="container">
           
           <div class="head">
               Update Author
           </div>
           
            <div class="row alert alert-primary successAlt" style="display: <?php echo $altScs; ?>;">
                        Save Successfully..!
            </div>
            <div class="row alert alert-danger requiredAlt" style="display: <?php echo $altReq; ?>;">
                        Save Unsuccessfully..!
            </div>
           
           
       <div class="box">
        <form method="post" class="f">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Author Name : </label>
                    <input type="text" name="name" class="form-control" value="<?php echo $_GET['name'];?>"> 
                </div>
                <div class="form-group col-md-3">
                    <input type="submit" class="btn" name="submit" value="Update">
                </div>
                <div class="form-group col-md-3">
                    <input type="reset" class="btn" value="cancel">
                </div>
            </div>
            
        </form>
      </div>
      
        <br>
       </div> 
    </body>
</html>