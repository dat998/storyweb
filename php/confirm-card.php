<?php
    include("./connect.php");
    session_start();
    $status = $_GET['value'];
    $money = $_GET['money'];
    $id = $_GET['id'];
    $user = $_GET['user'];
    echo($status);
    if($status ==1){
        $sql = "UPDATE card set status=1 where id = '$id'";
        $result = $conn->query($sql);
        
        $pointPlus = 0;
        switch($money){
            case 1: $pointPlus=10000;break;
            case 2: $pointPlus=20000;break;
            case 3: $pointPlus=50000;break;
            case 4: $pointPlus=100000;break;
            case 5: $pointPlus=200000;break;
            case 6: $pointPlus=500000;break;
            case 7: $pointPlus=1000000;break;

        }
        $sql = "SELECT point from users where id = '$user'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        $point = $row['point']+$pointPlus;
        $sql = "UPDATE users set point = '$point' where id = '$user'";
        $result = $conn->query($sql);
        $_SESSION['update-pay-card']  = 1;
        header("location:./../html/user/user-edit.php?value=8");
    }elseif($status ==2){
        $sql = "UPDATE card set status=2 where id = '$id'";
        $result = $conn->query($sql);
        $_SESSION['update-pay-card']  = 2;
        header("location:./../html/user/user-edit.php?value=8");
    }

?>