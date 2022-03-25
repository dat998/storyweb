<?php
    session_start();
    include_once("./connect.php");
    $value = $_POST['value'];
    $id = $_POST['update-value'];

    echo $value;
    echo $id;
   
        $sql = "UPDATE comment set value='$value', status=1 where id_comment='$id'";
        $conn->query($sql);
    
    

    header("Location:./../html/readStory.php?story-name=".$_SESSION['story_name']."&&chap-number=1");
?>