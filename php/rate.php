<?php
    include_once("./connect.php");
    session_start();

    $idstory = $_GET['id-story'];
    $userRate = $_SESSION['id'];
    $value = $_GET['value'];
    $sql = "INSERT into rate(story,user_rate,value) values('$idstory','$userRate','1') ";
    $result = $conn->query($sql);
    
    $sql1 = "SELECT point_rate,point_story from views where id_story='$idstory'";
    $result1 = $conn->query($sql1);
    if($result1!=false){
        $row = $result1->fetch_assoc();
        if($value==1){
            //$_SESSION['rate'] = 1;
            $point = $row['point_rate']+1;
            $pointStory = $row['point_story']+2;
        }
        else{
            $point = $row['point_rate']-1;
            $pointStory = $row['point_story']-2;
            $sql = "DELETE from rate where user_rate='$userRate' and story='$idstory'";
            $result = $conn->query($sql);
            //$_SESSION['rate'] =2;
            
        }
        echo $point;
        $sql2 = "UPDATE views set point_rate='$point',point_story='$pointStory' Where id_story='$idstory'";
        $result2 = $conn->query($sql2);
    }
    header("Location:./../html/introStory.php?storyid=".$idstory."");
?>