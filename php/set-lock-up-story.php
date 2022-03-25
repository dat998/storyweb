<?php
    include_once("./connect.php");
    session_start();
    $status = $_GET['status'];
    $id  = $_SESSION['storyid'];
    echo $id;
    
    $sql  = "UPDATE  stories set status = '$status'  Where id='$id'";
    $result = $conn->query($sql);
    $_SESSION['update-status-story'] = 0;
    //include_once('./../html/display.php');
    //header('Location:./../html/display.php');
    header('Location: ./../html/displayupdate-story.php?storyid='.$id);