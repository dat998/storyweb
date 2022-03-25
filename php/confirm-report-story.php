<?php
    include_once("./connect.php");
    session_start();
    $report = $_GET['report'];
    $id = $_GET['id'];
    echo($report);
    //admin xác nhận rằng báo cáo là đúng
    if($report==1){
        $story = $_GET['story'];
        //cập nhật status  = 1 là báo  cáo  chính xác
        $sql = "UPDATE reportstory set status = 1 where id='$id'";
        $conn->query($sql);
        //thực hiện khóa truyện lại vì vi phạm 
        $sql = "UPDATE stories set status =5 where id = '$story'";
        $conn->query($sql);
        $_SESSION['confirm-report'] = 1;
        header("location:./../html/user/user-edit.php?value=9");
    }
    //admin xác nhận báo cáo không đúng
    else{
        //cập nhật status  = 2 là báo  cáo không chính xác
        $sql = "UPDATE reportstory set status = 2 where id='$id'";
        $conn->query($sql);
        $_SESSION['confirm-report'] = 2;
        header("location:./../html/user/user-edit.php?value=9");
    }
?>