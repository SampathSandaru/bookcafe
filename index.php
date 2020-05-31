<?php
    include('page/conn.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link href="css/home_page.css"  rel="stylesheet" type="text/css">
    
  <link rel="shortcut icon" type="image/x-icon" href="img/q.png" />
    
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/navbar.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    
      <script>
        $(document).ready(function(){
            var cou=4;
            $("button").click(function(){
                cou=cou+4;
                $("#sql").load("page/load.php",{
                    cou_N:cou
                });
            });
        });
      </script>
    
    <script>
        function showHint(str) {
          var xhttp;
          if (str.length == 0) { 
            document.getElementById("txtHint").innerHTML = "";
            document.getElementById("txtHint").style.display="none";
            return;
          }else{
              document.getElementById("txtHint").style.display="block";
          }
          xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("txtHint").innerHTML = this.responseText;
            }
          };
          xhttp.open("GET", "page/gethint_book.php?q="+str, true);
          xhttp.send();
            
        }
    </script>
    
    <style>
        body{
            
            overflow-x: hidden;
        }
        
        .btn{
            background-color: #0082e6;
            width: 75%;
            margin: 0 25px;
            color: white;
        }
        
        .card:hover{
            transform: scale(1.03);
            transition: 0.4s;
            box-shadow:   0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.2);
        }
        
        img{
                width: 150px;
                height: 350px;
        }
        
        .search{
            margin-top: 200px;
            
        }
        #txtHint{
            background-color: white;
            position: absolute;
            z-index: 99;
            padding: 12px;
            border-radius: 5px;
            border-bottom: 1px solid blue;
            display: none;
        }
       
    </style>    

</head>
<body>
    <!--nav bar-->    
    <?php
        include("css/navbar_home.php");
    ?>
    <!--/nav bar-->
    
    <div class="row">
        <div class="col-md-3"></div>
        
        <div class="col-md-6">
           <input type="search" placeholder="Search Book Name or Author Name" onkeyup="showHint(this.value)" class="form-control search" style="width: 100%;">
            <samp id="txtHint" style="color:black;"> </samp>
        </div>
        
        <div class="col-md-3">
            
        </div>
        
    </div>
    
    
    <div class="row">
        <div class="col-md-2">
            
        </div>
        
        <div class="col-md-9 carousel">
            <?php include('page/carousel.php');?>
        </div>
        
    </div>
    <br>
    <br>
    <div class="container">
        <div class="row">
           
                <div class="row" id="sql">
    
                <?php
                
                  $sql="SELECT * FROM `book` LIMIT 8";
                  $reu=mysqli_query($con,$sql);
                  if($reu){

                      while($recode=mysqli_fetch_assoc($reu)){
                        $id=$recode['b_id'];
                        echo "<a href=\"page/user_show_book.php?id=$id\">";
                        echo "<div class=\"col-lg-3 col-md-6 mb-4\">";
                        echo "<div class=\"card h-100\">";
                        echo "<img class=\"card-img-top\"  src={$recode['img_path']}>";
                        echo "<div class=\"card-body\">";
                        echo "<h4 class=\"card-title\">";
                        echo "$recode[b_name]";
                        echo "</h4>";
                        echo "<p class=\"card-text\">$recode[year]</p>";
                        echo "<h5 style=\"color:red;\">Rs. $recode[price].00</h5>";
                        echo "<p class=\"card-text\">Language - $recode[language]</p>";

                        echo "</div>";
                            echo "<div class=\"card-footer\">";
                          echo "<a href=\"page/user_show_book.php?id=$id\" class=\"btn\">Buy Now</a>";
                             // echo "<small class=\"text-muted\">&#9733; &#9733; &#9733; &#9733; &#9734;</small>";
                            echo "</div>";
                          echo "</div>";
                        echo "</div></a>";
                      }
                  }else{
                      echo "error";
                  }

                ?>
                   
                    
          </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <button type="button" class="btn" style="width:100%;color:white;margin:10px;"> show more</button>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

     <!-- Footer -->
    <?php
        include('page/footer.php');
    ?>
    
</body>
</html>