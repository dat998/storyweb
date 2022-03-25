<?php
    session_start();
    include_once("./connect.php");
    include_once("./controller.php");
    $idstory= $_SESSION['story_id'];
    $sql = "SELECT price, user,revenue,buy_turn FROM stories where id= '$idstory'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    // echo($row['price'].''.$row['user']);
    $id = $_SESSION['id'];
    $sql2 = "SELECT point,id from users where id='$id'";
    $result = $conn->query($sql2);
    $row1= $result->fetch_assoc();
    if($row1['point']<$row['price']){
        $_SESSION['pay-story'] = 1;
        header("location: ./../html/introStory.php");
    }else {
        $point = $row1['point'] - $row['price'];
        $userPay = $row1['id'];
        $_SESSION['point'] = $point;
        $sql = "UPDATE users set point = '$point' where id = '$id'";
        $conn->query($sql);

        $sql = "INSERT INTO paystory(id_user,id_story) values('$userPay','$idstory')";
        $conn->query($sql);
        $id = $row['user'];

        $sql = "SELECT point FROM users where id = '$id'";
        $result = $conn->query($sql);
        $row2 = $result->fetch_assoc();
        $point = $row2['point'] + $row['price'];

        $sql = "UPDATE users set point = '$point' where id = '$id'";
        $conn->query($sql);
        $_SESSION['pay-story'] = 2;
        //cập nhật tổng thu nhập cho truyện
        $revenue = $row['revenue'] + $row['price'];
        $buyTurn = $row['buy_turn']+1;
        echo($buyTurn);
        $sql = "UPDATE stories set revenue='$revenue',buy_turn='$buyTurn' where id = '$idstory'";
        $conn->query($sql);
        
        header("location: ./../html/introStory.php");

    }

?>