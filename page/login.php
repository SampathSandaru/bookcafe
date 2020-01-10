<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
     <link href="../css/login_page.css"  rel="stylesheet" type="text/css">
    
    <script src="../css/jquery-3.4.1.js"></script>
    
    <style>
        .btn_l{border: none;
            background-color:#edf7f3;
            width: 49%;
            height: 40px;
        }
        
    </style>
    
</head>
<body>
    
    <!--nav bar-->

    <nav class="navbar navbar-expand-lg navbar-light bg fixed-top">
    <a class="navbar-brand" href="#" style="color: aliceblue;">BOOK CAFE</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav ml-auto co">
      <li class="nav-item active">
        <a class="nav-link" href="../index.php" style="color: aliceblue;">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" style="color: aliceblue;">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" style="color: aliceblue;">Pricing</a>
      </li>
        </ul>
     </div>
    </nav>


    <!--end of nav bar-->
    
    <div class="div2">
        
        <form method="post">
            <table class="table_1" id="log_tb">
                <tr>
                    <td>User Name</td>
                </tr>
                <tr>
                    <td><input type="text" name="email"  class="form-control" placeholder="Email"> </td>
                </tr>
                <tr>
                    <td>Password</td>
                </tr>
                <tr>
                    <td><input type="password" name="password"  class="form-control" placeholder="password">  </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="submit" value="Login" class="btn">
                        <input type="reset" value="Cansel" class="btn">
                    </td>
                </tr>
                <tr>
                    <td>Forget Your Password?</td>
                </tr>
                 <tr>
                    <td> Don't have an account! <a href="#" id="sing_in">Sign Up Here</a></td>
                </tr>
            </table>
        </form>
        <!--user register form-->
        <form method="post">
            <table class="table2" id="rge_tb">
                <tr>
                   <td>First Name</td>
                   <td><input type="text" name="fname"  class="form-control" placeholder="First Name"></td>
                </tr>
                 <tr>
                   <td>Last Name</td>
                   <td><input type="text" name="lname"  class="form-control" placeholder="Last Name"></td>
                </tr>
                  <tr>
                   <td>Contact Number</td>
                   <td><input type="text" name="lname"  class="form-control" placeholder="0711234567"></td>
                </tr>
                <tr>
                   <td>Email Address</td>
                   <td><input type="email" name="email"  class="form-control" placeholder="email Address"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="pwd1"  class="form-control" placeholder="password"> </td>
                </tr>
                 <tr>
                    <td>Confirm Password</td>
                    <td><input type="password" name="pwd2"  class="form-control" placeholder="Confirm password"> </td>
                </tr>
                
                 <tr>
                     <td></td>
                     <td>
                        <input type="submit" name="submit" value="Register" class="btn">
                        <input type="reset" value="Cansel" class="btn">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>Do you have an account? <a href="#" id="log">Log in</a> </td>
                </tr>
            </table>
        </form>
        <!---->
    </div>
    
    <script>
        $(document).ready(function(){
           $("#sing_in").click(function(){
            $("#log_tb").fadeOut("3000");
            $("#rge_tb").fadeIn("3000");
            });
            
             $("#log").click(function(){
                $("#rge_tb").fadeOut("3000");
                 $("#log_tb").fadeIn("3000");
             });
        });
    </script>
</body>
</html>