<?php
    include_once("./connect.php");
    session_start();
    $imageName = $_FILES["imageStory"]["name"];
    $target_path = "./../image/";
    $idStory = $_SESSION['storyId'];
    $target_file = $target_path.basename($_FILES["imageStory"]["name"]);
    move_uploaded_file($_FILES["imageStory"]["tmp_name"], $target_file);
    echo($imageName);
    $sql="UPDATE stories SET images='$imageName' WHERE  id= '$idStory' ";
    $conn->query($sql);
    header('Location:./../html/displayupdate-story.php?storyid='.$idStory.'');

?>