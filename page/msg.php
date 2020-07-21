<?php
    include('conn.php');
    session_start();

    
    
?>

<html>
    <head>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      
<!--        fontawosome-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        
        <!-- for header-->
        <link rel="stylesheet" href="../Navbar/style.css">
<!--    <script src="https://kit.fontawesome.com/a076d05399.js"></script>-->
<!--        -->

        <style>
            
            .msg_tb{
                width: 50%;
                text-align: center;
                margin-top:80px;
                padding: 10px 15px;
                box-shadow:   0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.2);
                margin-left: 400px;
            }
            
            .msg_tb th{
                padding: 15px;
                background-color: brown;
                color: aliceblue;
            }
            
            .msg_tb td{
                padding: 10px;
                background-color: azure;
                text-align: center;
            }
           
        </style>
        
        
        
    </head>
    <body>
          <?php
            include('../Navbar/header.php');
        ?>
            
        
        <table class="msg_tb">
                <?php
                    $m_qu="SELECT * FROM `msg`";
                    $m_resu=mysqli_query($con,$m_qu);
                
                    if($m_resu){
                       if(mysqli_num_rows($m_resu)>=1){
                           echo "<tr>";
                           echo "<th>Subject</th>";
                           echo "<th>Message</th>";
                           echo "<th>Date</th>";
                           echo "</tr>";
                           while($recode=mysqli_fetch_assoc($m_resu)){
                               $tb="<tr>";
                               $tb.="<td>$recode[subject]</td>";
                               $tb.="<td style=\"\">$recode[message]</td>";
                               $tb.="<td style=\"text-align:center;\">$recode[date]</td>";
                               
                               $tb.="</tr>";
                               
                               echo $tb;
                           }
                       } 
                    }
                ?>
            </table>
            <br>
            <br>
        
        
         <!-- Footer -->
    <?php
        include('footer.php');
    ?>
    </body>
</html>