<?php
include_once("./connect.php");
session_start();



$author =$_POST['authorName'];

if ($conn->connect_error) {
    die("Không kết nối :" . $conn->connect_error);
    exit();
}
if($author==""){
    //chưa nhập quay lại nhập
    $_SESSION['add-author'] = 1;
     header("Location:./../html/user/user-edit.php?value=3");
}
else{
    $sql = "SELECT count(id) as count from author where author_name= '$author'";
    $result = $conn->query($sql);
    if($result!=false){
        while($row = $result->fetch_assoc()){
            if($row['count']>0){
                $_SESSION['add-author'] = 2;
                 header("Location:./../html/user/user-edit.php?value=3");
            }else{
                $id = $_SESSION['id'];
                $sql = "INSERT INTO author(userName,author_name) VALUES ('$id','$author')";
                $result = $conn->query($sql);
                $_SESSION['add-author'] = 3;
                 header("Location:./../html/user/user-edit.php?value=3");
                //header("Location: ../index.php");
            }
        }
    }
}




?>