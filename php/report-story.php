<?php
    session_start();
    include_once("./connect.php");
    $error = $_POST['errorStory'];
    $content= $_POST['content'];
    $story = $_SESSION['story_id'];
    $userReport = $_SESSION['id'];
    $userReported = $_SESSION['user-reported'];
    //echo($error.' '.$content.' '.$story.' '.$userReport);

    $sqlInsert  = "INSERT INTO reportstory(user_report,user_reported, error, content, id_story, status) values('$userReport','$userReported','$error','$content','$story',0)";
    $conn->query($sqlInsert);
    $_SESSION['report-story'] = 1;
    header("location: ./../html/introStory.php?storyid=".$story."");



?>