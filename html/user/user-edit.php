<?php
    include_once("../../php/connect.php");
    include_once("../../php/controller.php");
    session_start();
    if(isset($_GET['value'])){
        $value = $_GET['value'];
    }
    alert();
    if(isset($_SESSION['add-story'])){
        if($_SESSION['add-story']==1){
            phpAlert( "story đã tồn tại!");
        }elseif($_SESSION['add-story']==2){
            phpAlert('Thêm truyện thành công');
            $storyName = $_SESSION['story'];
            addView($conn,$storyName);

        }elseif($_SESSION['add-story']==3){
            phpAlert('Bạn chưa chọn thể loại nào');
        }
        elseif($_SESSION['add-story']==4){
            phpAlert('Bạn vui lòng nhập đủ thông tin');
        }
        unset($_SESSION['add-story']);
    }
    if(!isset($_SESSION['id'])){
        header("location: ../../index.php");
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quản lý</title>
    <link href="../../css/styleAdmin.css" rel="stylesheet">
    <script src="../../js/scrip.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-primary">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarAdmin" aria-controls="navbarAdmin" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="profile">
            <?php
                //phpAlert( $_SESSION['avatar']);
                if($_SESSION['avatar']==""){
                    echo' <img src="../../image/user.png" alt="" class="img-fluid rounded-circle" width="15%">
                    ';
                }else{
                    echo'<div style="width:50px;height:50px;">
                        <img src="../../image/avatar/'.$_SESSION['avatar'].'" alt="" class="img-fluid rounded-circle"  width="100%" height="100%""> 
                    </div>';

                }
            ?>
        </div>
        <div class="collapse navbar-collapse" id="navbarAdmin">
            <ul class="navbar-nav ml-auto">
                <div class="block-user">
                <?php
                    if(!isset($_SESSION['role'])){
                        echo'<img src="../../image/icon-user.png" class="responsive">
                        <a  data-toggle="modal" data-target="#dangnhapModal">Đăng nhập</a>
                        <span>|</span>
                        <a  data-toggle="modal" data-target="#dangkiModal">Đăng kí</a>';
                    }else{
                        if($_SESSION['role']=="user"){
                            echo'<a href="../../html/user/user-edit.php">';
                            echo "User: ".$_SESSION['userName'];
                            echo'</a>';
                            echo'<a href="../../php/logout.php"> | Đăng Xuất</a>';
                            //phpAlert("Tài khoản ".$_SESSION["role"].": ".$_SESSION['userName']);
                        }
                        if($_SESSION['role']=="admin")
                        {
                            echo'<a href="../../html/user/user-edit.php">';
                            echo "Admin: ".$_SESSION['userName'];
                            echo'</a>';
                            echo'<a href="../../php/logout.php"> | Đăng Xuất</a>';
                        // phpAlert("Tài khoản ".$_SESSION["role"].": ".$_SESSION['userName']);
                        }
                        if($_SESSION['role']=="khóa"){
                            echo'Tài khoản bị vô hiệu hóa';
                            echo'<a href="../../php/logout.php"> | Đăng Xuất</a>';
                            //phpAlert("Tài khoản ".$_SESSION["role"].": ".$_SESSION['userName']);
                        }
                        $id=$_SESSION['id'];
                        $sqlSetPoint ="SELECT point from users where id='$id'";
                        $result = $conn->query($sqlSetPoint);
                        $row = $result->fetch_assoc();

                        echo'<br><span class="fas fa fa-dollar fa-fw mr-3" style="color:white;">'.$row['point'].'</span>';
                    }
                ?>
                </div>
                <li class="nav-item dropdown d-sm-block d-md-none">
                    <a class="nav-link dropdown-toggle" href="#" id="smallerscreenmenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Menu </a>
                    <div class="dropdown-menu" aria-labelledby="smallerscreenmenu">
                    <a class="dropdown-item" href="../../index.php">Trang chủ</a>
                    <a class="dropdown-item" href="./user-edit.php">Hồ Sơ</a>
                    <?php
                            if($_SESSION['role']=="admin"){
                                echo'<a class="dropdown-item" href="./user-edit.php?value=2">Quản lý thành viên</a>';
                                echo'<a class="dropdown-item" href="./user-edit.php?value=3">Thêm truyện</a>';
                                echo'<a class="dropdown-item" href="./user-edit.php?value=4">Sửa Truyện</a>'; 
                                
                            }
                            echo'<a class="dropdown-item" href="./user-edit.php?value=1">Truyện yêu thích</a>';
                        ?>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="row" id="body-row">
        <div id="sidebar-container" class="sidebar-expanded d-none d-md-block">
            <ul class="list-group">
                <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                    <p>MAIN MENU</p>
                </li>
                <a href="../../index.php" class="bg-dark list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fas fa-home fa-fw mr-3"></span>
                        <span class="menu-collapsed">Trang Chủ</span>
                    </div>
                </a>
                <a href="./user-edit.php" class="bg-dark list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fas fa-user fa-fw mr-3"></span>
                        <span class="menu-collapsed">Hồ Sơ</span>
                    </div>
                </a>
                <?php
                    if($_SESSION['role']=="admin"){
                        echo'

                        <!-- /END Separator -->
                        <a href="./user-edit.php?value=2" class="bg-dark list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-start align-items-center">
                                <span class="fas fa-users fa-fw mr-3"></span>
                                <span class="menu-collapsed">Quản Lý Member</span>
                            </div>
                        </a>
                        
                        <a href="./user-edit.php?value=6" class="bg-dark list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-start align-items-center">
                                <span class="fas fa-tachometer-alt fa-fw mr-3"></span>
                                <span class="menu-collapsed">Thống kê</span>
                            </div>
                        </a>
                        <a href="#submenu3" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justyfy-content-start align-items-center">
                                <span class="fas fa-check fa-fw mr-3"></span>
                                <span class="menu-collapsed">Duyệt</span>
                                <span class="fas fa-angle-down ml-auto"></span>
                            </div>
                        </a>
                        <div id="submenu3" class="collapse sidebar-submenu">
                            <a href="./user-edit.php?value=8" class="bg-dark list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-start align-items-center">
                                    <span class="fas fa fa-dollar fa-fw mr-3"></span>
                                    <span class="menu-collapsed">Duyệt nạp thẻ</span>
                                </div>
                            </a>
                            <a href="./user-edit.php?value=9" class="bg-dark list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-start align-items-center">
                                    <span class="fas fa fa-shield fa-fw mr-3"></span>
                                    <span class="menu-collapsed">Duyệt report truyện</span>
                                </div>
                            </a>
                            <a href="./user-edit.php?value=5" class="bg-dark list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-start align-items-center">
                                <span class="fas fa-comments fa-fw mr-3"></span>
                                <span class="menu-collapsed">Duyệt report comment</span>
                            </div>
                            <a href="./user-edit.php?value=16" class="bg-dark list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-start align-items-center">
                                <span class="fas fa fa-dollar fa-fw mr-3"></span>
                                <span class="menu-collapsed">Duyệt rút tiền</span>
                            </div>
                        </a>
                        </div>
                        
                        ';    
                    }
                    elseif($_SESSION['role']=="user"){
                        echo'
                        <a href="./user-edit.php?value=7" class="bg-dark list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-start align-items-center">
                                <span class="fas fa fa-dollar fa-fw mr-3"></span>
                                <span class="menu-collapsed">Nạp thẻ</span>
                            </div>
                        </a>
                        <a href="./user-edit.php?value=15" class="bg-dark list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-start align-items-center">
                                <span class="fas fa fa-dollar fa-fw mr-3"></span>
                                <span class="menu-collapsed">Rút tiền</span>
                            </div>
                        </a>
                        ';
                    }
                    echo'<a href="./user-edit.php?value=1" class="bg-dark list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-start align-items-center">
                                <span class="fas fa-heart fa-fw mr-3"></span>
                                <span class="menu-collapsed">Truyện yêu thích</span>
                            </div>
                        </a>
                        <a href="#submenu1" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justyfy-content-start align-items-center">
                                <span class="fas fa-tasks fa-fw mr-3"></span>
                                <span class="menu-collapsed">Quản Lý Truyện</span>
                                <span class="fas fa-angle-down ml-auto"></span>
                            </div>
                        </a>
                        <!-- Inhalt des Untermenüs -->
                        <div id="submenu1" class="collapse sidebar-submenu">
                            <a href="./user-edit.php?value=3" class="list-group-item list-group-item-action bg-dark text-white">
                                <span class="menu-collapsed">Thêm Truyện</span>
                            </a>
                            <a href="./user-edit.php?value=4" class="list-group-item list-group-item-action bg-dark text-white">
                                <span class="menu-collapsed">Sửa Truyện</span>
                            </a>
                        </div>
                        
                        ';
                        echo'
                        
                        <a href="#submenu2" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justyfy-content-start align-items-center">
                                <span class="fas fa-history fa-fw mr-3"></span>
                                <span class="menu-collapsed">Lịch sử</span>
                                <span class="fas fa-angle-down ml-auto"></span>
                            </div>
                        </a>
                        <!-- Inhalt des Untermenüs -->
                        <div id="submenu2" class="collapse sidebar-submenu">
                            
                            <a href="./user-edit.php?value=11" class="list-group-item list-group-item-action bg-dark text-white">
                                <span class="menu-collapsed">Lịch sử donate</span>
                            </a>
                            
                            ';
                            if($_SESSION['role']=="user"){
                                echo'
                                <a href="./user-edit.php?value=10" class="list-group-item list-group-item-action bg-dark text-white">
                                    <span class="menu-collapsed">Lịch sử mua truyện</span>
                                </a>
                                <a href="./user-edit.php?value=12" class="list-group-item list-group-item-action bg-dark text-white">
                                    <span class="menu-collapsed">Lịch sử báo cáo truyện</span>
                                </a>
                                <a href="./user-edit.php?value=13" class="list-group-item list-group-item-action bg-dark text-white">
                                    <span class="menu-collapsed">Lịch sử báo cáo comment</span>
                                </a>
                                <a href="./user-edit.php?value=17" class="list-group-item list-group-item-action bg-dark text-white">
                                    <span class="menu-collapsed">Lịch sử rút tiền</span>
                                </a>';
                            }
                            
                        echo'</div>
                        
                        ';
                        

                ?>
                <?php

                ?>
                
            </ul>
        </div>
        <?php
            if(isset($value)&& $value==1){
                echo'<div class="col p-4">
                    <h3 class="title">Truyện Yêu Thích</h3>';
                    $sql = "SELECT user_rate,story from rate where user_rate = ".$_SESSION['id']."";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()){
                        
                        $sql1 = "SELECT id,images,story_name,author_name from stories where id=".$row['story']."";
                        $result1 = $conn->query($sql1);
                        $row1 =$result1->fetch_assoc();
                        //lấy tên tác giả
                        $author = $row1["author_name"];
                        $sqlAuthor ="SELECT author_name from author where id='$author'";
                        $resultAuthor =$conn->query($sqlAuthor);
                        $authorName= $resultAuthor->fetch_assoc();
                        echo'<div class="content">
                            <a class="thumb" href="../../html/introStory.php?storyid='.$row1['id'].'" target="_blank" title=" '.$row1['story_name'].' "> 
                                <img class="img-responsive" src="../../image/images_upload/'.$row1['images'].'" alt="" width="30px" height="40px">
                            </a>';
                            echo'<div class="info">
                                    <h2 class="title"> <a href="../../html/introStory.php?storyid='.$row1['id'].'" target="_blank" title="'.$row1['story_name'].'">'.$row1['story_name'].'</a> </h2>
                                    <div class="author">'.$authorName['author_name'].'</div>
                                </div>
                        </div>';  
                    }
                echo'</div>';    
            }
            elseif(isset($value)&& $value==2){
                echo'<div class="col p-4">
                        <h3 class="title">Quản Lý Thành Viên</h3>';
                        echo('<form action="./user-edit.php?value=2" method="POST">
                                <span>Tìm kiếm user<span>
                                <input type="text" name="userSearch">
                                <button type="submit" style="border: none;padding: 3px 8px;background: #508e60;color: #fff;border-radius: 5px;">Tìm kiếm</button>
                            </form>');
                            select_update_user($conn);
                    echo'</div>';
                   

            }elseif(isset($value)&& $value==3){
                echo'<div class="col p-4">
                    <h3 class="title">Thêm Truyện</h3>';
                    add_author();
                    select_author($conn);
                echo'</div>';  
            }
            elseif(isset($value)&& $value==4){
                 echo'<div class="col p-4">
                    <h3 class="title">Chỉnh Sửa Truyện</h3>';
                    if($_SESSION['role']=='admin'){
                        select_story($conn);
                        select_story_user($conn);

                    }else {
                        select_story_user($conn);
                        select_story_user_clock($conn);
                    }
                    
                echo'</div>'; 
            }
            elseif(isset($value)&& $value==5){
                echo'<div class="col p-4">
                    <h3 class="title">Duyệt bình luận</h3>';
                    loadComment($conn);
                echo'</div>'; 
            }
            elseif(isset($value)&& $value==6){
                echo'<div class="col p-4">
                    <h3 class="title">Thống kê</h3>';
                    statistic($conn);
                echo'</div>'; 
            }
            elseif(isset($value)&&$value==7){
                echo'<div class="col p-4">
                    <h3 class="title">Nạp thẻ</h3>';
                    paycard($conn);
                echo'</div>'; 
            }elseif(isset($value)&&$value==8){
                echo'<div class="col p-4">
                    <h3 class="title">Duyệt nạp thẻ</h3>';
                    setCard($conn);
                echo'</div>'; 
            }elseif (isset($value)&&$value==9) {
                echo'<div class="col p-4">
                    <h3 class="title">Duyệt report</h3>';
                    getReport($conn);
                echo'</div>'; 
            }elseif (isset($value)&&$value==10) {
                echo'<div class="col p-4">
                    <h3 class="title">Lịch sử mua truyện</h3>';
                    showHistoryPayStory($conn);
                echo'</div>';
            }elseif (isset($value)&&$value==11) {
                echo'<div class="col p-4">';
                    //lịch sử donate truyện
                    echo'<a href="#submenu5" data-toggle="collapse" aria-expanded="false" class=" list-group-item list-group-item-action flex-column align-items-start">
                            <h3 class="title">Lịch sử donate</h3>
                            <span class="fas fa-angle-down ml-auto"></span>
                        </a>
                        <div id="submenu5" class="collapse sidebar-submenu">';
                        showHistorydonate($conn);
                    echo'</div>';
                    

                echo'</div>';
                echo'<div class="col p-4">';
                    //Lịch sử nhận donate
                    echo'<a href="#submenu4" data-toggle="collapse" aria-expanded="false" class=" list-group-item list-group-item-action flex-column align-items-start">
                    <h3 class="title">Lịch sử nhận donate</h3>
                    <span class="fas fa-angle-down ml-auto"></span>
                    </a>
                    <div id="submenu4" class="collapse sidebar-submenu">';
                    showHistoryReceiveDonate($conn);
                    echo'</div>';
                echo'</div>';
            }elseif (isset($value)&&$value==12) {
                echo'<div class="col p-4">
                    <h3 class="title">Lịch sử báo cáo truyện</h3>';
                    showHistoryReport($conn);
                echo'</div>';
            }elseif (isset($value)&&$value==13 ) {
                echo'<div class="col p-4">
                    <h3 class="title">Lịch sử báo cáo bình luận</h3>';
                    showHistoryReportComment($conn);
                echo'</div>';
            }
            elseif (isset($value)&&$value==14 ) {
                echo'<div class="col p-4">
                    <h3 class="title">Thông báo</h3>';
                    
                echo'</div>';
            }
            elseif (isset($value)&&$value==15 ) {
                echo'<div class="col p-4">
                    <h3 class="title">Rút tiền</h3>';
                    cash($conn);
                echo'</div>';
            }
            elseif (isset($value)&&$value==16 ) {
                echo'<div class="col p-4">
                    <h3 class="title">Duyệt rút tiền</h3>';
                    aprovedRepayMoney($conn);
                echo'</div>';
            }
            elseif (isset($value)&&$value==17 ) {
                echo'<div class="col p-4">
                    <h3 class="title">Lịch sử rút tiền</h3>';
                    getRepayMoney($conn);
                echo'</div>';
            }
            else{
                update_user($conn);               
            }
        ?>
        
    </div>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function() {
            readURL(this);
        });
    </script>
    <script>
        $(function() {
            $('.selectpicker').selectpicker();
        });
    </script>
    <style>
    .dropdown-item.active, .dropdown-item:active {
    color: #fff;
    text-decoration: none;
    background-color: #508e60;
    }
    </style>
</body>
</html>
