<?php
    include('conn.php');
    session_start();

    $b_id=$_GET['id'];

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
?>

<html>
    <head>
        
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
        <style>
             .head{
                background-color:#0082e6;
                width 100%;
/*                height: 50px;*/
                border-radius: 7px;
                color: white;
                padding:20px;
                font-size: 25px;
                margin:0 10px 20px 15px;
                margin-top: 60px;
                box-shadow:   0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.2);
                user-select: none;
            }
            
            img{
                width:300px;
                height: 400px;
                
            }
            
            .tab{
                margin-top: 16px;
                font-size: 19px;
/*                font-style: italic;*/
            }
            .tab th{
                padding:15px 0;
            }
            
            .tab td{
                padding:8px 0;
            }
        </style>
    </head>
    <body>
        <div class="head">
            <?php echo strtoupper($b_name);?>
        </div>
        <div class="container">
            <div class="row">
<!--                <div class="col-md-1"></div>-->
                <div class="col-md-4">
                    <?php
                        echo "<img src=\"../$img\" class=\"img-fluid\">";
                    ?>
                </div>
                <div class="col-md-7">
                    <div class="">
                        <table class="tab">
                        <?php
                            $tb="<tr><th>$b_name</th></tr>";
                            $tb.="<tr><td>$b_id</td></tr>";
                            $tb.="<tr><td>Rs.$price</td></tr>";
                            $tb.="<tr><td>Language - $lng</td></tr>";
                            $tb.="<tr><td>Quentity - $q</td></tr>";
                            $tb.="<tr><td>Author - $a_name</td></tr>";
                            $tb.="<tr><td>Year - $year</td></tr>";
                            $tb.="<tr><td>Type - $category</td></tr>";
                            $tb.="<tr><td><a href=\"admin_edit_book.php?id=$b_id\">Edit Book</a></td></tr>";
                            
                            echo $tb;
                        ?>
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
    </body>
</html>