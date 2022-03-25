<?php
    session_start();
    include_once("./connect.php");
    $point = $_POST['point'];
    $idStory = $_SESSION['story_id'];
   
   
    //lấy user nhận tiền
    $sql = "SELECT user from stories where id= '$idStory'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $userReceive = $row['user'];
    
    //user trả tiền
    $userPay= $_SESSION['id'];
    
    // trừ tiền của người donate và cộng tiền cho người đăng truyện
    $sql1 = "SELECT point from users where id ='$userPay'";
    $result = $conn->query($sql1);
    $row1 = $result->fetch_assoc();

    //kiểm tra xem người donate có đủ tiền để donate hay không
    if($row1['point']<$point){
        $_SESSION['donate'] =1;
         header("Location: ./../html/introStory.php");
    }
    else {
        $pointx = $row1['point'];
        $pointSub = $pointx - $point;
        echo($pointx.' '.$pointSub.' '.$point);
        $sqlUpdate1 = "UPDATE users set point = '$pointSub' where id = '$userPay'";
        $conn->query($sqlUpdate1);

        //lấy giá trị tiền của người đăng truyện để cộng thêm
        $sql = "SELECT point from users where id ='$userReceive'";
        $result = $conn->query($sql);
        $row2 = $result->fetch_assoc();
        $pointAdd = $row2['point']+$point;
        echo($pointAdd);
        $sqlUpdate2 = "UPDATE users set point = '$pointAdd' where id = '$userReceive'";
        $conn->query($sqlUpdate2);
        //chèn thêm mới vào bảng donate để lưu lịch sử
        $sqlInsert = "INSERT INTO donate(user_donate,user_receive,point,story) values('$userPay','$userReceive','$point','$idStory')";
        $conn->query($sqlInsert);
        $_SESSION['donate'] =2;
        header("Location: ./../html/introStory.php");

    }

?>

