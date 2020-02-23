
<?php
    include('conn.php');
    
    $name=$_GET['q'];
    
    //$sql="SELECT * FROM `book` WHERE b_name LIKE '$name%' ";
    $sql="SELECT * FROM `book` b, `author` a WHERE b.b_author_id=a.a_id AND (b_name LIKE '%$name%' OR a.a_name LIKE '%$name%')";
    $result=mysqli_query($con,$sql);

    if($result){
        while($recode=mysqli_fetch_assoc($result)){
            echo "<a href=\"page/user_show_book.php?id=$recode[b_id]\" style=\"text-decoration:none;font-size:20px;color:black;\">$recode[b_name] - $recode[a_name]</a>"."<br>";
        }
    }
?>