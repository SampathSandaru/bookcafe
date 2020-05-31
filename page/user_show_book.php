<?php
    include('conn.php');
    session_start();

     if(!isset($_SESSION['id'])){
        header("location:login.php");
    }
    $user_id=$_SESSION['id'];
    $b_id=$_GET['id'];
    $_SESSION['book_id']=$_GET['id'];

    $book_query="SELECT * FROM `book` WHERE b_id='$b_id'";
    $result=mysqli_query($con,$book_query);

    if($result){
        $recode=mysqli_fetch_assoc($result);
        $b_name=$_SESSION['book_name']=$recode['b_name'];
        $img=$_SESSION['book_img']=$recode['img_path'];
        $lng=$_SESSION['book_lng']=$recode['language'];
        $price=$_SESSION['book_price']=$recode['price'];
        $q=$_SESSION['book_q']=$recode['quantity'];
        $desc=$_SESSION['book_desc']=$recode['b_desc'];
        $a_id=$_SESSION['a_id']=$recode['b_author_id'];
        $category_id=$_SESSION['cat_id']=$recode['category_id'];
        $year=$_SESSION['book_year']=$recode['year'];
        
        $author_name="SELECT * FROM `author` WHERE a_id='$a_id'";
        $category_name="SELECT * FROM `category` WHERE c_id='$category_id'";
        $result_a=mysqli_query($con,$author_name);
        $result_cat=mysqli_query($con,$category_name);
        if(($result_a)&&($result_cat)){
            $reco_a=mysqli_fetch_assoc($result_a);
            $reco_category=mysqli_fetch_assoc($result_cat);
            $a_name=$_SESSION['author_name']=$reco_a['a_name'];
            $category=$_SESSION['book_type']=$reco_category['c_type'];
        }else{
            echo "error";
        }
    }

///********************************************///

    function cou($user_id,$con){
        $count_query="SELECT sum(c_quantity) as num from `cart` WHERE user_id='$user_id' GROUP by (user_id)";
        $count_result=mysqli_query($con,$count_query);
        if($count_result){
            $rec=mysqli_fetch_assoc($count_result);
            $cart_num=$rec['num'];
            
        }
         return $cart_num;
    }

    cou($user_id,$con);

    if(isset($_POST['cart'])){
        $num=$_POST['quantity'];
        
        $cart_query="INSERT INTO `cart` (b_id,c_quantity,user_id) VALUE('{$b_id}','{$num}','{$user_id}')";
        $cart_result=mysqli_query($con,$cart_query);
        if($cart_result){
            cou($user_id,$con);
        }
    }
?>

<html>
    <head>
        
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="shortcut icon" type="image/x-icon" href="../img/q.png" />
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        
        
        <!--poup box link-->
                
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!--poup box link-->
       
        <!-- for header-->
        <link rel="stylesheet" href="../Navbar/style.css">
<!--    <script src="https://kit.fontawesome.com/a076d05399.js"></script>-->
<!--        -->
        
        <script>
            function showSizeDetails(id){
                var xhttp;
                if(id == ""){
                    document.getElementById("d").innerHTML="ghdfgh";
                    return;
                }
                
                xhttp = new XMLHttpRequest();
                var input = document.getElementById("quantity").value;
                xhttp.onreadystatechange = function() {
                    
                   if(this.readyState == 4 && this.status == 200) {
                        var input = document.getElementById("quantity").value;
                      // var rs = JSON.parse(this.responseText);
                      //document.getElementById("price").innerHTML = this.responseText;
                    }
                };
                
                xhttp.open("GET","cart_ajex.php?qua=" + input, true);
                xhttp.send();   
            }
            
         /*********************************************************************/   
        </script>
        
        
        <style>
            
            
            img{
                width:300px;
                height: 400px;
                
            }
            
            .tab{
                margin-top: 16px;
                font-size: 19px;
            }
            .tab th{
                padding:15px 0;
            }
            
            .tab td{
                padding:8px 0;
            }
            .sub_btn{
                background-color: red;
                color: white;
            }
            .sub_btn:hover{
                transform: scale(1.02);
                transition: 0.4s;
            }
            
            .card{
                width: 90%;
                height: 300px;
                margin-top: 20px;
                position: relative;
                box-shadow:   8px 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.2);
                padding: 10px;
            }
            
            .tb_card{
                width: 100%;     
            }
            
            .tb_card th{
                padding: 8px;
            }
            
            .tb_card td{
                padding: 12px;
            }
            
        </style>
    </head>
    <body>
        <?php
            include('../Navbar/header.php');
        ?>
        <br>
        <div class="container">
            
            <div class="row">
<!--                <div class="col-md-1"></div>-->
                <div class="col-md-3">
                    <?php
                        echo "<img src=\"../$img\" class=\"img-fluid\">";
                    ?>
                </div>
                <div class="col-md-6">
                    <div class="">
                        <table class="tab">
                            <form method="post" action="buy.php?id=<?php echo $b_id;?>&price=<?php echo $price;?>">
                        <?php
                            $tb="<tr><th>$b_name</th></tr>";
                            $tb.="<tr><td>Language - $lng</td></tr>";
                            $tb.="<tr><td>Author - $a_name</td></tr>";
                            $tb.="<tr><td>Year - $year</td></tr>";
                            $tb.="<tr><td>Type - $category</td></tr>";
                            $tb.="<tr><td style=\"color:red;\">Rs.$price</td></tr>";
                            $tb.="<tr><td>Quantity  <input type=\"number\" id=\"quantity\" name=\"quantity\" style=\"width:18%;margin-top:5px;border-radius:8px;text-align:center;borde:none;\" value=\"1\" min=\"1\" max=\"$q\" > <samp style=\"font-size:15px;\">$q available</samp></td></tr>";
                            $tb.="<tr><td>
                            <input type=\"submit\" class=\"btn sub_btn\" value=\"Buy Now\" style=\"width:40%;margin:3px;\" ><button type=\"button\" value=\"$b_id\" onclick='showSizeDetails(this.value)' class=\"btn\" style=\"width:45%;background-color:orange;height:36px;\" data-toggle=\"modal\" data-target=\"#exampleModal\">Add to Cart</button></td></tr>";
                            echo $tb;
                        ?>
                                </form>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab">
                <h4>Book Description</h4>
                <?php echo $desc;?>
            </div>
            <br>
        </div>

        <!--poup box-->
                 <div class="modal" tabindex="-1" role="dialog">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p>Modal body text goes here.</p>
                      </div>
        
                      <div class="modal-footer">
                      </div>
        
                    </div>
                  </div>
                </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
               Item Added to Cart.!
              </div>
              <div class="modal-footer">
              </div>
            </div>
          </div>
        </div>

<!--poup box-->
         <!-- Footer -->
    <?php
        include('footer.php');
    ?>

    </body>
</html>