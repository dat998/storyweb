<?php
    session_start();
    include_once("../php/connect.php");
    include_once("./../php/controller.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/readStorystyle.css">
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
        <main class="truyen-main" style="min-height:300px;">
            <div class="container">
                <?php
                    $id=$_GET['id'];
                    $sql = "SELECT userName,avatar, email, phoneNumber, role from users where id='$id'";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    echo'<div class="col p-4">
                        <h3 class="title">Hồ Sơ</h3>
                    
                            <div class="row">
                                
                                <div class="col-lg-5" data-aos="fade-right">';

                                        if($row['avatar']==null){
                                            echo'<img id="blah" src="./../image/avt.png" class="img-fluid" alt="your image" width="100%" height="245px">';
                                        }else{
                                            echo'<img id="blah" src="./../image/avatar/'.$row['avatar'].'" class="img-fluid" alt="your image" width="100%" height="245px">';
                                        }
                                        echo'
                                    
                                    
                                </div>
                            
                                <div class="col-lg-7 pt-4 pt-lg-0 content" data-aos="fade-left">
                                

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="white-box">
                                                    <div class="form-group">
                                                        <label class="col-md-12">Họ Và Tên</label>
                                                        <div class="col-md-12">
                                                            <span style="color:blue;">'.$row['userName'].'</span> </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="example-email" class="col-md-12">Email</label>
                                                        <div class="col-md-12">
                                                            <span style="color:blue;"> '.$row['email'].'</span></div>
                                                    </div>
                                                
                                                    <div class="form-group">
                                                        <label class="col-md-12">Số Điện Thoại</label>
                                                        <div class="col-md-12">
                                                        <span style="color:blue;">'.$row['phoneNumber'].'</span>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                
                                </div>
                                    
                            </div>
                            
                        
                    </div>';
                    $sql = "SELECT * from stories where user ='$id'";
                    $result = $conn->query($sql);
                    if($result!=false){
                        echo'<div class="col p-4">
                        <h4>Truyện được người này đăng</h4>
                        ';
                        while ($row = $result->fetch_assoc()) {
                            echo('<img style="width: 30px;height: 40px;" src="./../image/images_upload/'.$row['images'].'"><a href="./../html/introStory.php?storyid='.$row['id'].'">'.$row['story_name'].'</a><hr>');
                        }
                        echo'</div>';
                    }
                   
                ?>
            </div>
        </main> 
        <?php
            footer();
        ?>
    </div>
</body>
</html>