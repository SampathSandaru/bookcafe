<?php
    include('conn.php');
    session_start();

    if(!isset($_SESSION['id'])){
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      
      <link rel="shortcut icon" type="image/x-icon" href="../img/q.png" />
      
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      <style>
          .ifr{
              height: 100vh;
          }
      </style>
      
     
  </head>
  <body>
<div class="row"> 
    <div class="col-md-2">
<!--    <input type="checkbox" id="check" checked>-->
<!--
    <label for="check">
      <i class="fas fa-bars" id="btn"></i>
      <i class="fas fa-times" id="cancel"></i>
    </label>
-->
        <div class="sidebar">
        <header>BOOK CAFE</header>
          <ul>
            <li><a href="dashboard.php" target="p" style="text-decoration:none;"><i class="fas fa-qrcode"></i>Dashboard</a></li>
            <li><a href="book.php" target="p" style="text-decoration:none;"><i class="fas fa-book"></i>Book</a></li>
            <li><a href="add_book.php" target="p" style="text-decoration:none;"><i class="fas fa-book-medical"></i>Add Book</a></li>
            <li><a href="add_author.php" target="p" style="text-decoration:none;"><i class="fas fa-user-tie"></i>Add New Author</a></li>
            <li><a href="add_category.php" target="p" style="text-decoration:none;"><i class="fas fa-stream"></i>Add Category</a></li>
            <li><a href="new_order.php" target="p" style="text-decoration:none;"><i class="far fa-question-circle"></i>New Order</a></li>
            <li><a href="order_history.php" target="p" style="text-decoration:none;"><i class="fas fa-sliders-h"></i>Order History</a></li>
            <li><a href="users.php" target="p" style="text-decoration:none;"><i class="far fa-envelope"></i>User</a></li>
            <li><a href="logout.php" style="text-decoration:none;"><i class="fas fa-sign-out-alt"></i>Log out</a></li>
          </ul>
        </div>
        </div>
    <div class="col-md-10">
        <iframe class="ifr" name="p" src="dashboard.php">
        </iframe>
    </div>
</div>
<!-- <section></section>-->
 <script type="text/javascript">
          function preventBack(){
              window.history.forward();
          }
          setTimeout("preventBack()",0);
          window.onunload=function () {null};
      </script>
  </body>
</html>
