<?php
    session_start();
    include('./connect.php');
    $loaithe = $_POST['loaiThe'];
    $mathe = $_POST['maThe'];
    $seri = $_POST['seri'];
    $giathe=$_POST['giaThe'];
    //thẻ viettel
    if($loaithe==1){
        if((strlen($seri)==11&&strlen($mathe)==13)||(strlen($seri)==14&&strlen($mathe)==15)){
            addCard($conn,$loaithe,$seri,$mathe,$giathe);
        }else {
            echo('Sai định dạng thẻ ');
            $_SESSION['card'] = 2;
            header('location: ./../html/user/user-edit.php?value=7');
        }
    }
    //thẻ vinaphone
    elseif ($loaithe==2) {
        if((strlen($seri)==14&&strlen($mathe)==12)||(strlen($seri)==14||strlen($mathe)==14)){
            addCard($conn,$loaithe,$seri,$mathe,$giathe);
            
        }else {
            
            $_SESSION['card'] = 1;
            header('location: ./../html/user/user-edit.php?value=7');
        }
    }
    //thẻ mobiphone
    elseif ($loaithe==3){
        if(strlen($seri)==15&&strlen($mathe)==12){
            addCard($conn,$loaithe,$seri,$mathe,$giathe);
            
        }else {
            
            $_SESSION['card'] = 3;
            header('location: ./../html/user/user-edit.php?value=7');
        }
    }
    function addCard($conn,$loaithe,$seri,$mathe,$giathe){
        $id = $_SESSION['id'];
        $sql = "INSERT into card(id_user,loaiThe,maThe,seri,status,giaThe) values('$id','$loaithe','$mathe','$seri',0,'$giathe')";
        $result = $conn->query($sql);
        $_SESSION['card'] = 4;
        header("location: ./../html/user/user-edit.php?value=7");
    }
?>