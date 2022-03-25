<?php
    include_once("../php/connect.php");
    session_start();

    $email= $_POST['email']??'';
    $password= $_POST['password']??'';
    if($conn->connect_error){
        echo"123";
        die("cannot connect!");
        
    }else{
        $pass = md5($password);
        $sql = "SELECT id,userName,password,role,email,phoneNumber,avatar,point FROM users where email='$email' and password='$pass'";
        $result = $conn->query($sql);
        var_dump( $result);
        $row = $result->fetch_assoc();
        if (!isset($row)) {
            $_SESSION['user-dangnhap'] = 2;
            header ("location:./../index.php");
        }
        else{
            $_SESSION['userName'] = $row['userName'];
            $_SESSION['id']=$row['id'];
            $_SESSION['role']=$row['role'];
            $_SESSION['avatar'] = $row['avatar'];
            $_SESSION['point'] = $row['point'];
            //$_SESSION['user-dangnhap'] = 1;
            header ("location:./../index.php");
        }
    }
?>