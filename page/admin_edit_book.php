<?php
    include('conn.php');
    session_start();
    
    if(!isset($_SESSION['id'])){
        header("location:login.php");
    }

    $altScs="none";
    $altReq="none";
    if(isset($_POST['b_id'])){
        $bo_id=$_POST['b_id'];
        $bo_na=$_POST['b_name'];
    }else{
        $bo_id="";
        $bo_na="";
    }
    
    if(isset($_GET['id'])){
        $book_id=$_GET['id'];
    }else{
        $book_id=$_POST['b_id'];
    }
   
    
    
/********************************************************************/

    if(isset($_POST['submit'])){
        $b_id=mysqli_real_escape_string($con,$_POST['b_id']);
        $b_name=mysqli_real_escape_string($con,$_POST['b_name']);
        $a_id=mysqli_real_escape_string($con,$_POST['a_name']);
        $price=mysqli_real_escape_string($con,$_POST['price']);
        $qu=mysqli_real_escape_string($con,$_POST['q']);
        $desc=mysqli_real_escape_string($con,$_POST['desc']);
        $year=$_POST['year'];
        $type=$_POST['type'];
        $lan=$_POST['lan'];
       
                if(isset($_SESSION['book_img'])){
                    $image_path=$_SESSION['book_img'];
                }else{
                    $image=$_FILES["img"]["name"];
                    $Upload_image_folder="../upload/";
                    $folser_db="upload/";
                    move_uploaded_file($_FILES["img"]["tmp_name"],"$Upload_image_folder".$image);
                    $image_path=$folser_db.$image;
                }
                $add_book="UPDATE `book` set b_name='{$b_name}',b_desc='{$desc}',b_author_id='{$a_id}',category_id='{$type}',price='{$price}',language='{$lan}',quantity='{$qu}',year='{$year}',img_path='{$image_path}' WHERE b_id='$b_id'";
                $add_result=mysqli_query($con,$add_book);
                
                if($add_result){
                    $altScs="block";
                }else{
                    $altReq="block";
                }
            }
        
?>

<html>
    <head>
        
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
        <link rel="stylesheet" href="../css/navbar.css">
    
        <!--  dropdown search    -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
        
        <script>
            $(document).ready(function () {
                $('select').selectize({
                    sortField: 'text'
                });
            });
        </script>
        <!-- -->
        <style>
                 
            body{
            }

            .btn{
                width: 48%;
                background-color: #0082e6;
                color: white;
            }
            
            .btn:hover{
                transform: scale(1.02);
                transition: 0.4s;
            }
            
            .box{
                padding: 30px 30px;
                box-shadow:   8px 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.2);
            }
            
            .box:hover{
                transform: scale(1.01);
                transition: 0.4s;
            }
            
            .head{
                background-color:#0082e6;
                width 100%;
                height: 50px;
                border-radius: 7px;
                color: white;
                padding: 8px 60px;
                font-size: 25px;
                margin:0 0 20px;
                margin-top: -20px;
                box-shadow:   0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.2);
                user-select: none;
            }
            
            label{
                user-select: none;
            }
            
        </style>
    </head>
    <body>
        
        <br>
        <br>
        <br>
        <br>
        
       <div class="container">
           
           <div class="head">
               Edit Book 
           </div>
           
            <div class="row alert alert-primary successAlt" style="display: <?php echo $altScs; ?>;">
                        Save Successfully..!
            </div>
            <div class="row alert alert-danger requiredAlt" style="display: <?php echo $altReq; ?>;">
                        Save Unsuccessfully..!
            </div>
           
           
       <div class="box">
        <form method="post" action="admin_edit_book.php?" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Book ID : </label>
                    <input type="text" class="form-control" placeholder="Book id BK***" name="bid" value="<?php echo $book_id;?>" disabled>
                    <input type="hidden"  name="b_id" value="<?php echo $book_id;?>" >
                </div>
                <div class="form-group col-md-4">
                    <label>Author Name : </label>
                    <?php
                        $au_query="SELECT * FROM `author`";
                        $result=mysqli_query($con,$au_query);
                        if($result){
                            echo "<select class=\"form-control\" name=\"a_name\" required>";
                            echo "<option value=\"$_SESSION[a_id]\">$_SESSION[author_name]</option>";
                            while($recode=mysqli_fetch_assoc($result)){
                                echo "<option value=\"$recode[a_id]\">$recode[a_name]</option>";
                            }
                            echo "</select>";
                        }
                    ?>
                </div>
                <div class="form-group col-md-4">
                    <label>Language : </label>
                    <select class="form-control" name="lan">
                         <option value="<?php echo $_SESSION['book_lng'];?>"><?php echo $_SESSION['book_lng'];?></option>
                        <option value="English">English</option>
                        <option value="සිංහල">සිංහල</option>
                        <option value="Tamil">Tamil</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Book Name : </label>
                    <input type="text" class="form-control" placeholder="Book Name" name="b_name" value="<?php echo $_SESSION['book_name'];?>" required>
                </div>
                <div class="form-group col-md-3">
                    <label>Year : </label>
                    <select name="year" class="form-control" required>
                        <option value="<?php echo $_SESSION['book_year'];?>"><?php echo $_SESSION['book_year'];?></option>
                        <option value="2030">2030</option>
                        <option value="2029">2029</option>
                        <option value="2028">2028</option>
                        <option value="2027">2027</option>
                        <option value="2026">2026</option>
                        <option value="2025">2025</option>
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                        <option value="2020">2020</option>
                        <option value="2019">2019</option>
                        <option value="2018">2018</option>
                        <option value="2017">2017</option>
                        <option value="2016">2016</option>
                        <option value="2015">2015</option>
                        <option value="2014">2014</option>
                        <option value="2013">2013</option>
                        <option value="2012">2012</option>
                        <option value="2011">2011</option>
                        <option value="2010">2010</option>
                        <option value="2009">2009</option>
                        <option value="2008">2008</option>
                        <option value="2007">2007</option>
                        <option value="2006">2006</option>
                        <option value="2005">2005</option>
                        <option value="2004">2004</option>
                        <option value="2003">2003</option>
                        <option value="2002">2002</option>
                        <option value="2001">2001</option>
                        <option value="2000">2000</option>
                        <option value="1999">1999</option>
                        <option value="1998">1998</option>
                        <option value="1997">1997</option>
                        <option value="1996">1996</option>
                        <option value="1995">1995</option>
                        <option value="1994">1994</option>
                        <option value="1993">1993</option>
                        <option value="1992">1992</option>
                        <option value="1991">1991</option>
                        <option value="1990">1990</option>
                        <option value="1989">1989</option>
                        <option value="1988">1988</option>
                        <option value="1987">1987</option>
                        <option value="1986">1986</option>
                        <option value="1985">1985</option>
                        <option value="1984">1984</option>
                        <option value="1983">1983</option>
                        <option value="1982">1982</option>
                        <option value="1981">1981</option>
                        <option value="1980">1980</option>
                        <option value="1979">1979</option>
                        <option value="1978">1978</option>
                        <option value="1977">1977</option>
                        <option value="1976">1976</option>
                        <option value="1975">1975</option>
                        <option value="1974">1974</option>
                        <option value="1973">1973</option>
                        <option value="1972">1972</option>
                        <option value="1971">1971</option>
                        <option value="1970">1970</option>
                        <option value="1969">1969</option>
                        <option value="1968">1968</option>
                        <option value="1967">1967</option>
                        <option value="1966">1966</option>
                        <option value="1965">1965</option>
                        <option value="1964">1964</option>
                        <option value="1963">1963</option>
                        <option value="1962">1962</option>
                        <option value="1961">1961</option>
                        <option value="1960">1960</option>
                        <option value="1959">1959</option>
                        <option value="1958">1958</option>
                        <option value="1957">1957</option>
                        <option value="1956">1956</option>
                        <option value="1955">1955</option>
                        <option value="1954">1954</option>
                        <option value="1953">1953</option>
                        <option value="1952">1952</option>
                        <option value="1951">1951</option>
                        <option value="1950">1950</option>
                        <option value="1949">1949</option>
                        <option value="1948">1948</option>
                        <option value="1947">1947</option>
                        <option value="1946">1946</option>
                        <option value="1945">1945</option>
                        <option value="1944">1944</option>
                        <option value="1943">1943</option>
                        <option value="1942">1942</option>
                        <option value="1941">1941</option>
                        <option value="1940">1940</option>
                        <option value="1939">1939</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label>Book Image :<span style="color:red;font-size:11.5px;">(image size must be less than 2MB)</span></label>
                    <input type="file" class="form-control" name="img" value="<?php echo $_SESSION['book_img']?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Book Price : </label>
                    <input type="text" class="form-control" value="<?php echo $_SESSION['book_price'];?>" placeholder="Book Price" name="price" required>
                </div>
                <div class="form-group col-md-4">
                    <label>Book Quantity : </label>
                    <input type="text" class="form-control" value="<?php echo $_SESSION['book_q'];?>"  placeholder="Book Quantity" name="q" required>
                </div>
                <div class="form-group col-md-4">
                    <label>Book Type : </label>
                    <?php
                        $au_query="SELECT * FROM `category`";
                        $result=mysqli_query($con,$au_query);
                        if($result){
                            echo "<select class=\"form-control\" name=\"type\" required>";
                            echo "<option value=\"$_SESSION[cat_id]\">$_SESSION[book_type]</option>";
                            while($recode=mysqli_fetch_assoc($result)){
                                echo "<option value=\"$recode[c_id]\">$recode[c_type]</option>";
                            }
                            echo "</select>";
                        }
                    ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Book Description : </label>
                    <textarea cols="50" rows="2" class="form-control" name="desc" id="b_de" required></textarea>
                    
                </div>
                <div class="form-group col-md-6">
                   
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <input type="reset" class="btn" value="cancel">
                    <input type="submit" class="btn" name="submit" value="Update Book">
                </div>
                <div class="form-group col-md-4"></div>
                <div class="form-group col-md-4"> </div>
            </div>
        </form>
      </div>
      </div>
        <br>
        <br>
        <?php echo "<script>document.getElementById(\"b_de\").value=\"$_SESSION[book_desc]\"</script>";?>
    </body>
</html>