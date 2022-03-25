<?php
    session_start();
    include_once("./connect.php");
    $status = $_GET['status'];
    $id = $_GET['id'];
    echo($status);
   
    if($status==1){
        //cập nhật trạng thái thành công là 1
        $sql = "UPDATE repaymoney set status = 1 where id ='$id'";
        $conn->query($sql);
        $_SESSION['repay-money'] =1;
        header("Location:./../html/user/user-edit.php?value=16 ");
    }else {
        //lấy id  của user rút tiền
        $sql = "SELECT user,value from repaymoney where id = '$id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $value= $row['value'];
        //lấy số tiền  của user rút tiền
        $idUser = $row['user'];
        $sql = "SELECT point from users where id='$idUser'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $point = $row['point'];

        //cập nhật trạng thái là thất bại 2 
        $sql = "UPDATE repaymoney set status = 2 where id ='$id'";
        $conn->query($sql);
        //cập nhật số tiền của user là số tiền trong tk + số tiền rút
        $pointAdd = $point + $value;
        $sql = "UPDATE users set point ='$pointAdd' where id ='$idUser'";
        $conn->query($sql);
        $_SESSION['repay-money'] =2;
        header("Location:./../html/user/user-edit.php?value=16 ");
    }
?>