<?php
 include_once("./connect.php");
 session_start();
    $id = $_GET['chap-id'];
    
    echo $id;
    $sql = "DELETE From chaps WHERE id='$id'";
    $result =  $conn->query($sql);
    $_SESSION['delete-chap']=1;
    //header('Location:./../html/display.php');
    header('Location:./../html/displayupdate-story.php?storyid='.$_SESSION['storyid'].'');
?>