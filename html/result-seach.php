<?php
    session_start();
    include_once("../php/connect.php");
    include_once("./../php/controller.php");
    $category = $_GET['category'];
    // $sql = "SELECT story_name,author_name,images From stories WHERE category='$category'";
    // $result = $conn->query($sql);
    // if($result!=false){
    //     while($row = $result->fetch_assoc()){
    //         echo $row['story_name'];
            
    //     }
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php
    switch ($category){
        case 1: echo'Tiên hiệp';break;
        case 2: echo'Kiếm hiệp';break;
        case 3: echo'Hiện Đại';break;
        case 4: echo'Dị năng';break;
        case 5: echo'Huyền huyễn';break;
        case 6: echo'Lịch sử';break;
        case 7: echo'Ngôn tình';break;
        case 8: echo'Quân sự';break;
        case 9: echo'Xuyên không';break;
    }
    
    ?></title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/newUpdate.css">
    <link rel="stylesheet" type="text/css" href="../css/eyePassLogin.css">
    <link rel="stylesheet" type="text/css" href="../css/eyePassSignin.css">
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
        <main class="truyen-main">
            <div class="container">
                <?php
                    seach_category($conn);
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