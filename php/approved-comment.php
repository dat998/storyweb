<?php
    include_once('./connect.php');
    session_start();
    $idCmt = $_GET['idCmt'];
    $idReport = $_GET['idReport'];
    if($_GET['value']==1){
        //cập nhật trạng thái cmt là bị khóa 0
        $sql1 = "UPDATE comment set status='0' where id_comment='$idCmt'";
        $conn->query($sql1);
        //cập nhật trạng thái report là đúng 1
        $sql = "UPDATE reportcomment set status='1' where id='$idReport'";
        $conn->query($sql);
        header('location:./../html/user/user-edit.php?value=5');
    }elseif ($_GET['value']==2) {
        //cập nhật trạng thái report là sai 2
        $sql = "UPDATE reportcomment set status='2' where id='$idReport'";
        $conn->query($sql);
        header('location:./../html/user/user-edit.php?value=5');

    }
?>