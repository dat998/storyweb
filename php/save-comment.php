<?php
    include_once("./connect.php");
    session_start();
    $storyid = $_SESSION['story_id'];
    $content = $_GET['content-comment'];
    if(isset($userComment)){
        echo'Bạn chưa đăng nhập không thể bình luận!';

    }else{
        $userComment = $_SESSION['id'];
        if($content==""){
           
            $_SESSION['comment'] = 2;
            header("Location: ./../html/readStory.php?chap-number=".$_SESSION['chap']."");
        }
        
        else{
           // echo $storyid.$userComment.$content;
           
                $sql = "INSERT into comment(story,user_comment,value,status) values('$storyid','$userComment','$content',1)";
                $result = $conn->query($sql);
                $_SESSION['comment'] = 1;
                header("Location: ./../html/readStory.php?chap-number=".$_SESSION['chap']."");
           
            
        }
    }
  
?>