<head>
    <style>
        td{
            border-bottom: 1px solid black;
        }
    </style>
</head>
<?php
    include('conn.php');
    
    $name=$_GET['q'];
    
    $sql="SELECT * FROM `book` b, `author` a WHERE b.b_author_id=a.a_id AND (b_name LIKE '%$name%' OR a.a_name LIKE '%$name%' or b.b_id LIKE '%$name%')";
    $result=mysqli_query($con,$sql);

    echo "<table>";
    if($result){
        while($recode=mysqli_fetch_assoc($result)){
            $tb="<tr><td style=\"padding:5px;\"><a href=\"admin_show_book.php?id=$recode[b_id]\" style=\"text-decoration:none;font-size:16px;color:black;\">$recode[b_id] $recode[b_name] - $recode[a_name]</a></td></tr>";
            
            echo $tb;
        }
    }
?>