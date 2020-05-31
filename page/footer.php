<?php
 include('conn.php');

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $msg=$_POST['msg'];
    
    require 'email/PHPMailerAutoload.php';
    $credential = include('email/credential.php');   //credentials import
                $e='lahirusampathsadaruwan@gmail.com';
                $mail = new PHPMailer;

                //$mail->SMTPDebug = 3;                               // Enable verbose debug output

                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = $credential['user'];           // SMTP username
                $mail->Password = $credential['pass'];                           // SMTP password
                $mail->SMTPSecure = 'tls';                          // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                $mail->setFrom($e);
                $mail->addAddress($e);             // Name is optional

                $mail->addReplyTo('hello');
                        
                $mail->isHTML(true);                                  // Set email format to HTML
                
                
                $mail->Subject = "New Message";
                $mail->Body    = "Name : $name"."<br>";
                $mail->Body    .= "Email : $email"."<br><br>";
                $mail->Body    .= "  $msg"."<br>";
                $mail->AltBody = 'If you see this mail. please reload the page.';

                if(!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    echo "<script>alert('sent Email')</script>";
                }
}

?>



<head>
    
</head>
<footer class="page-footer font-small unique-color-dark">

  <div style="background-color: #6351ce;">
    <div class="container">

      <!-- Grid row-->
      <div class="row py-4 d-flex align-items-center">

        <!-- Grid column -->
        <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
          <h6 class="mb-0"></h6>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-6 col-lg-7 text-center text-md-right">

          <!-- Facebook -->
          <a class="fb-ic">
            <i class="fab fa-facebook-f white-text mr-4"> </i>
          </a>
          <!-- Twitter -->
          <a class="tw-ic">
            <i class="fab fa-twitter white-text mr-4"> </i>
          </a>
          <!-- Google +-->
          <a class="gplus-ic">
            <i class="fab fa-google-plus-g white-text mr-4"> </i>
          </a>
          <!--Linkedin -->
          <a class="li-ic">
            <i class="fab fa-linkedin-in white-text mr-4"> </i>
          </a>
          <!--Instagram-->
          <a class="ins-ic">
            <i class="fab fa-instagram white-text"> </i>
          </a>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row-->

    </div>
  </div>

  <!-- Footer Links -->
  <div class="container text-center text-md-left mt-5">

    <!-- Grid row -->
    <div class="row mt-3">

      <!-- Grid column -->
      <div class="col-md-6 col-lg-4 col-xl-3  mb-4">

        <!-- Content -->
        <h6 class="text-uppercase font-weight-bold">BOOK CAFE</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <form method="post">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label>Name</label>  
                </div>
                <div class="form-group col-md-9">
                    <input type="text" class="form-control" placeholder="your name" name="name">  
                </div>
            </div>
              <div class="form-row">
                <div class="form-group col-md-3">
                    <label>Email</label>  
                </div>
                <div class="form-group col-md-9">
                    <input type="email" class="form-control" placeholder="your email address" name="email">  
                </div>
            </div>
              <div class="form-row">
                <div class="form-group col-md-3">
                    <label>Message</label>  
                </div>
                <div class="form-group col-md-9">
                    <textarea cols="20" rows="3" class="form-control" name="msg"></textarea>  
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                </div>
                <div class="form-group col-md-9">
                   <input type="submit" class="btn" value="send" style="background-color:blue;width:50%;color:white;" name="submit"> 
                </div>
            </div>
          </form>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

        <!-- Links -->
        <!-- <h6 class="text-uppercase font-weight-bold">Products</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a href="#!">MDBootstrap</a>
        </p>
        <p>
          <a href="#!">MDWordPress</a>
        </p>
        <p>
          <a href="#!">BrandFlow</a>
        </p>
        <p>
          <a href="#!">Bootstrap Angular</a>
        </p> -->

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Contact</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <i class="fas fa-home mr-3"></i>N0 80,Kamburupitiya, Matara</p>
        <p>
          <i class="fas fa-envelope mr-3"></i> bookcafe@gmail.com</p>
        <p>
          <i class="fas fa-phone mr-3"></i> 0763304183</p>
        <p>
          <i class="fas fa-print mr-3"></i>0703029153</p>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="../index.php"> bookcafe.lk</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
