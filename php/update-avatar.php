<?php
    include_once("./connect.php");
    session_start();
    $imageName = $_FILES["image"]["name"];
    $target_path = "./../image/avatar/";
    $id = $_SESSION['id'];
    $target_file = $target_path.basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    $sql="UPDATE users SET avatar='$imageName' WHERE  id= '$id' ";
    $result = $conn->query($sql);
    $_SESSION['avatar'] = $imageName;
    header("Location:./../html/user/user-edit.php");
    
?>
