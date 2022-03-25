<?php
    include_once("./connect.php");
    session_start();
    $id = $_POST['id'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $phoneNumber = $_POST['phoneNumber'];
    $point = $_POST['point'];
    if($email==""||$role==""||$phoneNumber==""){
        //echo'khong được để rỗng quay lại trang update';
        $_SESSION['status-admin-update-user']=3;
        header('Location:./../html/user/user-edit.php?value=2');
       
    }
    elseif(strlen($phoneNumber)!=10){
        // echo("phải sđt = 10");
        // echo '<br><a href="../html/user/user-edit.php?value=2">quay lại trang update</a>';
        $_SESSION['status-admin-update-user']=1;
        header('Location:./../html/user/user-edit.php?value=2');
    }
    else{
        $sql="UPDATE users SET  email= '$email', role = '$role', phoneNumber = '$phoneNumber',point='$point' WHERE id='$id'";
        $result=$conn->query($sql);
        
        $_SESSION['status-admin-update-user']=2;
        header('Location:./../html/user/user-edit.php?value=2');
        //echo '<a href="../html/display-update-user.php">quay lại trang update</a>';
    }
?>