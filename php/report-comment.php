<?php
    session_start();
    include_once('./connect.php');
    $errorComment = $_POST['errorComment'];
    $reportCommentId= $_POST['reportCommentId'];
    $idUserReport = $_SESSION['id'];
    echo($errorComment.''.$reportCommentId);
    
    $sqlInsert = "INSERT INTO reportcomment(user_report,error,id_comment,status) values('$idUserReport','$errorComment','$reportCommentId','0')";
    $conn->query($sqlInsert);

    header("Location:./../html/readStory.php?story-name=".$_SESSION['story_name']."&&chap-number=1");
?>