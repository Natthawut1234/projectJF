<meta charset = "utf-8">
<?php
require("connection/connect.php");

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

// exit();

    $name_com = $_POST['name_com'];
    $comment = $_POST['comment'];
    $ref_id = $_POST['ref_id'];

    //เพิ่มข้อมูลเข้าตาราง tbl_comments
    $sql = "INSERT INTO tbl_comments(name_com,comment,ref_id) VALUES ('$name_com','$comment',$ref_id)";
    $result = mysqli_query($conn, $sql) or die ("Error in query: $sql" . mysqli_error());

    // mysqli_close($connect);

    if($result){
        echo "<script type='text/javascript'>";
        // echo "alert('เพิ่มเเล้ว');";
        echo "window.location = 'play_VDO.php?id=$ref_id';";
        echo "</script>";
    }else{
        echo "<script type='text/javascript'>";
        echo "alert('Error!!');";
        echo "window.location = 'play_VDO.php?id=$ref_id';";
        echo "</script>";
    }

?>