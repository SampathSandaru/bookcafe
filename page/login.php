<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
     <link href="../css/home_page.css"  rel="stylesheet" type="text/css">
    
    <style>
        img{
            width: 100%;
            
        }
        
         
        .div2{
            background:linear-gradient(rgba(0,0,0,.5),rgba(0,0,0,.5)),url("../img/cXxw3W.jpg");
            background-repeat: no-repeat;
            background-size: 100% 100%;
            background-attachment: fixed;
            height:720px;
        }
        
        .table_1{
            width: 23%;
            height: 290px;
            margin-top:240px;
            margin-left: 560px;
            position: absolute;
            background-color: #edf7f3;
            border-radius: 10px;
            opacity: 0;
            animation-name: box_ani;
            animation-delay: 0.5s;
            animation-duration: 0.8s;
            animation-fill-mode: forwards;
        }
        
         
        @-webkit-keyframes box_ani {
                from {opacity: 0;} 
                to {opacity: 1;}
            }
        
        td{
            border-spacing: 45px;
            padding: 10px;
           
        }
        
        .btn{
            background-color: blueviolet;
            color: wheat;
            width: 48%;
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
        
        <form>
            <table class="table_1">
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
                    <td><input type="password" name="email"  class="form-control" placeholder="password">  </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="submit" value="Login" class="btn">
                        <input type="reset" value="Cansel" class="btn">
                    </td>
                </tr>
                <tr>
                    <td>Forgety Your Password?</td>
                </tr>
            </table>
        </form>
        
    </div>
    
    
</body>
</html>