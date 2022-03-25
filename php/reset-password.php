<?php
    include('./connect.php');
    session_start();
    $id = $_GET['id'];
    $pass = md5('password');
    $sql = "UPDATE users set password='$pass' where id='$id'";
    $conn->query($sql);
    $_SESSION['status-admin-update-user']=4;
    header('Location:./../html/user/user-edit.php?value=2');
?>