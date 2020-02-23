<?php
    include('conn.php');
    session_start();
    
    if(!isset($_SESSION['id'])){
        header("location:login.php");
    }

    $altScs="none";
    $altReq="none";
    $sty="none";

    if(isset($_POST['submit'])){
        $c_name=mysqli_real_escape_string($con,$_POST['name']);
        
        $query="SELECT * FROM `category` WHERE c_type='$c_name'";
        $re=mysqli_query($con,$query);
        
         if($re){
            if(mysqli_num_rows($re)>=1){
                $sty="block";
            }else{
                $au_query="INSERT INTO `category` (c_type) VALUES('{$c_name}')";
                $au_rwsult=mysqli_query($con,$au_query);

                if($au_rwsult){
                    $altScs="block";
                    $altReq="none";
                }else{
                    $altScs="none";
                    $altReq="block";
                }
            }
         }
    }

    
    /*delete category**************/
    if(isset($_GET['id'])){
        $delete="DELETE FROM `category` WHERE c_id='$_GET[id]'";
        $delete_result=mysqli_query($con,$delete);
        if($delete_result){
            
        }
    }else{
        //echo "no";
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
            
            .tb{
                width:100%;
            }
            
            .tb th{
                font-size: 20px;
                padding: 15px;
                background-color: antiquewhite;
            }
            
            .tb td{
                font-size: 17px;
                padding: 15px;
                border-bottom: 1px solid black;
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
               New Book Category
           </div>
           
            <div class="row alert alert-primary successAlt" style="display: <?php echo $altScs; ?>;">
                        Save Successfully..!
            </div>
            <div class="row alert alert-danger requiredAlt" style="display: <?php echo $altReq; ?>;">
                        Save Unsuccessfully..!
            </div>
           <div class="row alert alert-danger requiredAlt" style="display: <?php echo $sty; ?>;">
                <?php
                    echo "$c_name $lan already exist";        
                ?>
            </div>
           
           
       <div class="box">
        <form method="post" class="f">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Category Name : </label>
                    <input type="text" name="name" class="form-control" placeholder="Category Name"> 
                </div>
                <div class="form-group col-md-6">
                    
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <input type="submit" class="btn" name="submit" value="Add Category">
                </div>
                <div class="form-group col-md-3">
                    <input type="reset" class="btn" value="cancel">
                </div>
            </div>
            
        </form>
      </div>
      
        <br>
        <br>
        <br>
        <div class="head">
               Book Category
           </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10 box">
                <table class="tb">
                    <tr>
                        <th>No</th>
                        <th>Category</th>
                        <th>Delete</th>
                    </tr>
                    <?php
                    $c=1;
                        $au_query="SELECT * FROM `category`";
                        $result=mysqli_query($con,$au_query);
                        if($result){
                            while($recode=mysqli_fetch_assoc($result)){
                                $tb="<tr>";
                                $tb.="<td>$c</td>";
                                $tb.="<td>$recode[c_type]</td>";
                                 $tb.="<td><a href=\"add_category.php?id=$recode[c_id]\">Delete</a></td>";
                                $tb.="</tr>";
                                $c++;
                                echo $tb;    
                            }
                        }
                    ?>
                </table>
            </div>
        </div>
       </div>
        <br>
    </body>
</html>