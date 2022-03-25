<?php
    include_once("./connect.php");
    session_start();
    
    // $chapNumber = $_POST['chapNumber'];
    $nameChap = $_POST['nameChap'];
    $content = $_POST['content'];

    $idchap = $_SESSION['idchap'];

    $sql = "UPDATE chaps SET name_chap='$nameChap',content='$content' WHERE id='$idchap'";
    $conn->query($sql);
    $_SESSION['update-chap']=1;
    header('Location:./../html/displayupdate-story.php?storyid='.$_SESSION['storyid'].'');
?>