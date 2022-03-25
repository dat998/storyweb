<?php
    include_once("./connect.php");
    session_start();


    $id = $_POST['id'];
    $status = $_POST['status'];

    $sql="UPDATE stories SET status='$status' WHERE id='$id'";
    $result = $conn->query($sql);
    echo"đổi trạng thái thành công<br>";
    echo'<button><a href="../html/display-story-status.php">quay về trang trạng thái</a></button>';
?>