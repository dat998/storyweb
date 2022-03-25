<?php
    include_once("../connect.php");
    session_start();
    $userName = $_POST['userName'];
    // $password= $_POST['password'];
    $email=$_POST['email'];
    $phoneNumber=$_POST['phoneNumber'];
    $id = $_SESSION['id'];

  

    
    if($userName==""||$email==""||$phoneNumber==""){
        // echo$userName.$password.$email.$phoneNumber;
        echo "Bạn vui lòng nhập đủ thông tin";  
        $_SESSION['status-update-user']=1;
         header('Location: ../../html/user/user-edit.php');
    }
    elseif(strlen($phoneNumber)!=10){
        $_SESSION['status-update-user']=2;
        header('Location: ../../html/user/user-edit.php');
    }else{
        $sql = "SELECT userName,email,phoneNumber from users where id= '$id'";
        $result = $conn->query($sql);
        if($result!=false){
            $row = $result->fetch_assoc();
            $sql1 = "SELECT userName,email,phoneNumber from users where id!='$id'";
            $result1 = $conn->query($sql1);
            while($row1= $result1->fetch_assoc())
            {
                if($userName==$row1['userName']){
                    echo'tài khoản đã tồn tại vui lòng đặt tên khác';
                    $_SESSION['status-update-user']=3;
                    header('Location: ../../html/user/user-edit.php');
                }elseif($phoneNumber==$row1['phoneNumber']){
                    $_SESSION['status-update-user']=5;
                    echo'Số điện thoại đã tồn tại vui lòng nhập số điện thoại khác';
                    header('Location: ../../html/user/user-edit.php');
                }
            }

            $sql="UPDATE users SET phoneNumber='$phoneNumber',email='$email',userName='$userName' WHERE  id= '$id' ";
            $result = $conn->query($sql);
            echo  '<img src="../../image/avatar/'.$target_file.'" alt="">';
            $_SESSION['status-update-user']=6;
            echo'update';
            header('Location: ../../html/user/user-edit.php');
        }
    }
?>
