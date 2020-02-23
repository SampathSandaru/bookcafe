<?php
    //include('../page/onn.php');
    //session_start();
    $name="";
    if(isset($_SESSION['id']) && ($_SESSION['role'])=='user'){
        $val="<a href=\"page/logout.php\" style=\"text-decoration: none;\">Log out</a>";
        $name="Welcome "."$_SESSION[name]";
    }else if(isset($_SESSION['id']) && ($_SESSION['role'])=='admin'){
        $val="<a href=\"logout.php\" style=\"text-decoration: none;\">Log out</a>";
    }else{
       $val="<a href=\"page/login.php\" style=\"text-decoration: none;\">Log in</a>"; 
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="navbar.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      
      <style>
          #navbar{
              overflow: hidden;
              padding:95px 15px;
              transition: 0.4s;
              position: fixed;
              width: 100%;
              top: 0;
              z-index: 99;
              transition: 0.5s;
          }
          
          #logo{
             transition: 0.5s; 
          }
      </style>
      
  </head>
  <body>
    <nav class="fixed-top" id="navbar">
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo" id="logo">BOOK CAFE</label>
      <ul id="li">
        <li style="color: white;font-size: 25px;"><?php echo $name;?></li>
        <li><a href="add_book.php" style="text-decoration: none;">Add New Book</a></li>
        <li><a href="#" style="text-decoration: none;">Services</a></li>
        <li><a href="#" style="text-decoration: none;">Contact</a></li>
        <li><a href="#" style="text-decoration: none;">Feedback</a></li>
        <li><?php echo $val;?></li>  
      </ul>
    </nav>
    
      
      <script>
// When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById("navbar").style.padding = "5px 10px";
    document.getElementById("logo").style.fontSize = "25px";
  } else {
    document.getElementById("navbar").style.padding = "95px 10px";
    document.getElementById("logo").style.fontSize = "35px";
  }
}
</script>
      
  </body>
</html>
