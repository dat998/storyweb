<?php
include_once("./connect.php");
session_start();

$chapNumber = $_POST['chapNumber'];
$nameChap = $_POST['nameChap'];
$content = $_POST['content'];
if ($conn->connect_error) {
    die("Không kết nối :" . $conn->connect_error);
    exit();
}
if($chapNumber==""||$nameChap==""||$content==""){
    
    $_SESSION['add-chap'] = 3 ;
    header('Location:./../html/displayupdate-story.php?storyid='.$_SESSION['storyid'].'');
    //header("Location: ../html/display-select-story.php");
}
else{
    $sql = "SELECT count(id) as count from chaps where name_chap= '$nameChap'";
    $result = $conn->query($sql);
    if($result!=false){
        while($row = $result->fetch_assoc()){
            if($row['count']>0){
                echo $row['count'];
                $_SESSION['add-chap'] =1 ;
                header('Location:./../html/displayupdate-story.php?storyid='.$_SESSION['storyid'].'');
            }
            else{
                
                $id = $_SESSION['id'];
                $user = $_SESSION['userName'];
                $storyName = $_SESSION['story'];
                //echo $chapNumber. $nameChap . $user.$storyName.$content;
                $sql = "INSERT INTO chaps(chap_number,name_chap,user,story_name,content) VALUES ('$chapNumber','$nameChap','$id','$storyName','$content') ";
                $result = $conn->query($sql);
                //lấy temp để cập nhật giữa 0 và 1 để update thời gian rằng chap này đã update
                $sql = "SELECT temp from stories where story_name='$storyName'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $temp = $row['temp'];
                if($row['temp']==1){
                    $temp =0;
                }else {
                    $temp =1;
                }
                $sql = "UPDATE stories set temp = '$temp' where story_name = '$storyName'";
                $conn->query($sql);
                $_SESSION['add-chap'] =2 ;
                header('Location:./../html/displayupdate-story.php?storyid='.$_SESSION['storyid'].'');
            }
        }
    }
}



?>
