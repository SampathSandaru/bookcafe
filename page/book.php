<?php
    include('conn.php');
    
?>

<html>
    <head>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
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
          xhttp.open("GET", "admin_gethint_book.php?q="+str, true);
          xhttp.send();
            
        }
    </script>
        
        <style>
            .head{
                background-color:#0082e6;
                width 100%;
                height: 50px;
                border-radius: 7px;
                color: white;
                padding: 5px 60px;
                font-size: 25px;
                margin:0 -20px 20px;
                margin-top: 60px;
                box-shadow:   0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.2);
                user-select: none;
            }
            
            img{
                width: 300px;
                height: 350px;
            }
            
            .card{
                user-select: auto;
                box-shadow:   0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.2);
            }
            .card:hover{
                transform: scale(1.03);
                transition: 0.5s;
            }
            .btn{
                background-color: #0082e6;
                color: white;
            }
            
            input[type:search]:focus{
                width: 100%;
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
        <br>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="head">
                        Book

                    </div>
                </div> 
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <input type="text" class="form-control" placeholder="Search Book Name , Author Name or Book ID" onkeyup="showHint(this.value)">
                        
                          <samp id="txtHint" style="color:black;"> </samp>
                    </div>
                </div> 
            </div>
            <br>
            <br>
        <div class="row">
           
                <div class="row" id="sql">
    
                <?php
                    
                if(isset($_POST['submit'])){
                    $bname=$_POST['book_name'];
                    $sql="SELECT * FROM `book` WHERE b_name='$bname'";
                    $css="col-lg-10";
                    $card_width="<div class=\"card h-100\" style=\"width:280px;\">";
                }else{
                    $sql="SELECT * FROM `book`";
                    $css="col-lg-3";
                    $card_width="<div class=\"card h-70\">";
                }  
                    
                  
                  $reu=mysqli_query($con,$sql);
                  if($reu){

                      while($recode=mysqli_fetch_assoc($reu)){
                        $id=$recode['b_id'];
                        echo "<div class=\"$css col-md-6 mb-4\">";
                        echo "$card_width";
                          $im=$recode['img_path'];
                        echo "<img class=\"card-img-top\"  src=\"../$im\">";
                        echo "<div class=\"card-body\">";
                        echo "<h4 class=\"card-title\">";
                        echo "$recode[b_name]";
                        echo "</h4>";
                        echo "<p class=\"card-text\">$recode[year]</p>";
                        echo "<p class=\"card-text\">Book ID - $recode[b_id]</p>";
                        echo "<h5 style=\"color:red;\">Rs. $recode[price].00</h5>";
                        echo "<p class=\"card-text\">Quantity - $recode[quantity]</p>";
                        echo "<p class=\"card-text\">Language - $recode[language]</p>";
                        //echo "<p class=\"card-text\">$recode[b_desc]</p>";

                        echo "</div>";
                            echo "<div class=\"card-footer\">";
                          echo "<a href=\"admin_show_book.php?id=$id\"  class=\"btn\">View Book</a>";
                             // echo "<small class=\"text-muted\">&#9733; &#9733; &#9733; &#9733; &#9734;</small>";
                            echo "</div>";
                          echo "</div>";
                        echo "</div>";
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
<!--                <button type="button" class="btn" style="width:100%;color:white;margin:10px;"> show more</button>-->
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
        
    </body>
</html>