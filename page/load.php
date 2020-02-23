<?php
include ('conn.php');
$cou_N= $_POST['cou_N'];
              $sql="SELECT * FROM `book` LIMIT $cou_N";
              $reu=mysqli_query($con,$sql);
              if($reu){
                  while($recode=mysqli_fetch_assoc($reu)){
                    $id=$recode['b_id'];
                    echo "<div class=\"col-lg-3 col-md-6 mb-4\">";
                    echo "<div class=\"card h-100\">";
                    echo "<a href=\"#\"><img class=\"card-img-top\"  src={$recode['img_path']} ></a>";
                    echo "<div class=\"card-body\">";
                    echo "<h4 class=\"card-title\">";
                    echo "$recode[b_name]";
                    echo "</h4>";
                    echo "<p class=\"card-text\">$recode[year]</p>";
                    echo "<h5 style=\"color:red;\">Rs. $recode[price].00</h5>";
                    echo "<p class=\"card-text\">Language - $recode[language]</p>";
                         
                    echo "</div>";
                        echo "<div class=\"card-footer\">";
                      echo "<a href=\"page/user_show_book.php?id=$id\"  class=\"btn\">Buy Now</a>";
//                         echo "<input type=\"submit\" name=\"cart\" class=\"btn a\" value=\"Add to Cart\">";
                         // echo "<small class=\"text-muted\">&#9733; &#9733; &#9733; &#9733; &#9734;</small>";
                        echo "</div>";
                      echo "</div>";
                    echo "</div>";
                  }
              }
           
            ?> 