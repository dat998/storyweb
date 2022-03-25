<?php
    session_start();
    include_once("../php/connect.php");
    include_once("./../php/controller.php");
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Truyện mới cập nhật
    </title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/newUpdate.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <div class="page-wraper">
        <?php
            header_user($conn);
        ?>
        <main class="truyen-main" >
            <div class="container" style="min-height:400px">
            <?php
                if($_GET['value']=="truyen-moi"){
                    echo'<h4>Truyện mới cập nhật</h4>';
                    echo'<div class="block-content">
                        <ul class="list-group ">';
                            new_update($conn);
                    echo'</ul>
                    </div>';
                }elseif($_GET['value']=="truyen-hoan-thanh"){
                    echo'<h4>Truyện hoàn thành</h4>';
                    echo'<div class="block-content">
                        <ul class="list-group ">';
                            truyenHoanThanh($conn);
                    echo'</ul>
                    </div>';
                }elseif($_GET['value']=="truyen-de-cu"){
                    echo'<h4>truyện đề cử</h4>';
                    echo'<div class="block-content">
                        <ul class="list-group ">';
                            truyenDeCu($conn);
                    echo'</ul>
                    </div>';   
                }
                
            ?> 
            </div>
        </main>
        <?php
            footer();
        ?>
    </div> 
    <?php 
        modal();
    ?>
    <script src="../js/scriptIndex.js"></script> 
</body>