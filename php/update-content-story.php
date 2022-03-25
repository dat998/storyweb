<?php
    session_start();
    include_once("./connect.php");
    $story = $_SESSION['story_id'];
    $content = $_POST['content'];
    $price = $_POST['price'];
    $sql = "UPDATE stories SET content ='$content',price='$price' where id= '$story'";
    $result = $conn->query($sql);
    $_SESSION['update-content']=1;
    //header("Location:./../html/display.php");
    header('Location:./../html/displayupdate-story.php?storyid='.$_SESSION['storyid'].'');
?>