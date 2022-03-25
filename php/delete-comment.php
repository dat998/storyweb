<?php
    include_once("./connect.php");
    session_start();

    $idCmt= $_GET['id-comment'];
    $sql = "DELETE from comment Where id_comment='$idCmt'";
    $reusult = $conn->query($sql);

    $_SESSION['delete-comment'] = 1;
    if(isset($_GET['page'])&&$_GET['page']=='xoa-binh-luan'){
        header("Location: ./../html/user/user-edit.php?value=5");
    }else{
        header("Location: ./../html/readStory.php?chap-number=".$_SESSION['chap']."");
    }
    //header("Location: ./../html/display.php");
?>