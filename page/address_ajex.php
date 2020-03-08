<?php

    include('conn.php');

    session_start();
    $name=$_GET['name'];

    $query="SELECT * FROM `address` WHERE name LIKE '$name'";
    $result=mysqli_query($con,$query);

    if($result){
        $recode=mysqli_fetch_assoc($result);
        
          echo $recode['name']."<br>".$recode['address_1']."<br>".$recode['address_2']."<br>".$recode['city']."<br>".$recode['postal_code']."<br>".$recode['Province']."<br>".$recode['ad_number'];
    }

  

?>