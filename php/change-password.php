<?php
    session_start();
    include("./connect.php");
    $id  = $_SESSION['id'];
    $password = $_POST['password'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $sqlSelectPass = "SELECT password from users where id = '$id'";
    $result = $conn->query($sqlSelectPass);
    $pass = $result->fetch_assoc();
    $passmd5 = md5($password);
    if($password==""||$password1==""||$password2==""){
        $_SESSION['change-password']=0;
        header("Location:./../html/user/user-edit.php");
    }
    if($passmd5!=$pass['password']) {
        $_SESSION['change-password']=2;
        header("Location:./../html/user/user-edit.php");
    }if($password1!=$password2) {
        $_SESSION['change-password']=1;
        header("Location:./../html/user/user-edit.php");
    }
    //update pass
    $passnew = md5($password1);
    $sqlUpdate = "UPDATE users set password='$passnew' where id = '$id'";
    $conn->query($sqlUpdate);
    $_SESSION['change-password']=3;
    header("Location:./../html/user/user-edit.php");
    
?>