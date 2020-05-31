<head>
    <style>
        td{
            border-bottom: 1px solid black;
        }
    </style>
</head>
<?php
    include('conn.php');
    

    if(isset($_GET['q'])){
        $name=$_GET['q'];
        $sql = "SELECT * FROM `book` b, `author` a WHERE b.b_author_id=a.a_id AND (b_name LIKE '%$name%' OR a.a_name LIKE '%$name%')";
        $result = mysqli_query($con, $sql);

        echo "<table>";
        if ($result) {
            while ($recode = mysqli_fetch_assoc($result)) {
                $tb = "<tr><td style=\"padding:5px;\"><a href=\"page/user_show_book.php?id=$recode[b_id]\" style=\"text-decoration:none;font-size:16px;color:black;\">$recode[b_name] - $recode[a_name]</a></td></tr>";

                echo $tb;
            }
        }
    }

    /*book id*/

    if(isset($_GET['id'])) {
        $id=$_GET['id'];
        $book_id = "SELECT b_id FROM `book` ORDER by b_id DESC LIMIT 1";
        $book_id_result = mysqli_query($con, $book_id);
        if ($book_id_result) {
            while ($rec = mysqli_fetch_assoc($book_id_result)) {
                echo "Last Book ID  ".$rec['b_id']."<br>";
            }
        } else {
            echo "error";
        }
    }

?>