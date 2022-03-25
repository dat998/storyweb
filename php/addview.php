<?php
include("./controller.php");
include("./connect.php");
    $nameStory = $_GET['id'];
    $sql4 = "SELECT views,point_story from views where id_story = '$nameStory'";
    $result4 = $conn->query($sql4);
    $row4 = $result4->fetch_assoc();

    $views = $row4['views']+1;
    $point = $row4['point_story']+1;

    $sql4 ="UPDATE views set views='$views',point_story='$point' where id_story='$nameStory'";
    $result4=$conn->query($sql4);
    echo('add view ok!');
    
?>