<?php
    session_start();
    include_once("./connect.php");
    $categoryCard = $_POST['card'];
    $code = $_POST['code'];
    $name = $_POST['name'];
    $point = $_POST['point'];
    $nameCard = $_POST['nameCard'];
    //lấy số tiền có trong tài khoản
    $id = $_SESSION['id'];
    $sql = "SELECT point from users where id='$id'";
    $result = $conn->query($sql);
    $pointUser = $result->fetch_assoc();
    if(empty($_POST['card'])||empty($_POST['code'])||empty($_POST['name'])||empty($_POST['point'])){
        $_SESSION['rut-tien']=3;
        header("Location: ./../html/user/user-edit.php?value=15");
    }
    //kiểm tra xem tài khoản có đủ tiền để rút hay không
    elseif($pointUser['point']<$point){
        
        $_SESSION['rut-tien']=1;
        header("Location: ./../html/user/user-edit.php?value=15");
        return;
    }else{
        if($nameCard==null){
            $pointSub = $pointUser['point'] - $point;
            //cập nhật point user
            $sql  = "UPDATE users set point='$pointSub' where id = '$id'";
            $conn->query($sql);
            //tạo hóa đơn rút tiền chờ admin duyệt
            $sql1 = "INSERT INTO repaymoney(user,value, code_card, name,category_card, status) values('$id','$point','$code','$name','$categoryCard',0)";
            $conn->query($sql1);
            
            $_SESSION['rut-tien']=2;
            header("Location: ./../html/user/user-edit.php?value=15");
        }
        else {
            $pointSub = $pointUser['point'] - $point;
            //cập nhật point user
            $sql  = "UPDATE users set point='$pointSub' where id = '$id'";
            $conn->query($sql);
            //tạo hóa đơn rút tiền chờ admin duyệt
            $sql1 = "INSERT INTO repaymoney(user,value, code_card, name,category_card, status,name_card) values('$id','$point','$code','$name','$categoryCard',0,'$nameCard')";
            $conn->query($sql1);
           
            $_SESSION['rut-tien']=2;
            header("Location: ./../html/user/user-edit.php?value=15");
        }
    }

?>