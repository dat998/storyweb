<?php
    session_start();
    //include_once("./toys.php");
    include_once("./php/connect.php");
    include_once("./php/controller.php");

    alert();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zenkun Story</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/eyePassLogin.css">
    <link rel="stylesheet" type="text/css" href="./css/eyePassSignin.css">
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
        <header class="truyen-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 first">
                        <a href="./index.php" class="logo">
                            <img src="./image/image_homepage/logo1.png" width="100%" height="99%">
                        </a>
                    </div>

            <!-- Menu -->
                    <div class="col-md-3 second">
                        <div class="row">
                            <div class="col-md-6 catory1">
                                <div class="dropdown">
                                    <!-- <i class="fas fa-bars"></i> -->
                                    <a class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" href="#">Danh mục</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="./html/story-new-update.php?value=truyen-moi&&page=1">Truyện Mới</a></li>
                                        <li><a href="./html/story-new-update.php?value=truyen-hoan-thanh">Truyện Hoàn Thành</a></li>
                                        <li><a href="./html/story-new-update.php?value=truyen-de-cu">Truyện Đề Cử</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 catory2">
                                <div class="dropdown">
                                    <!-- <i class="fas fa-bars"></i> -->
                                    <a class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" href="#">Thể loại</a>
                                    <div class="dropdown-menu">
                                        <div class="row">
                                            <div class="col-md-4 " >
                                                <ul>
                                                    <li><a href="./html/result-seach.php?category=1" class="story">Tiên Hiệp</a></li>
                                                    <li><a href="./html/result-seach.php?category=2" class="story">Kiếp Hiệp</a></li>
                                                    <li><a href="./html/result-seach.php?category=3" class="story">Hiện Đại</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-4">
                                                <ul>
                                                    <li><a href="./html/result-seach.php?category=4" class="story">Dị Năng</a></li>
                                                    <li><a href="./html/result-seach.php?category=5" class="story">Huyền Huyễn</a></li>
                                                    <li><a href="./html/result-seach.php?category=6" class="story">Lịch Sử</a></li>
                                                </ul>
                                            </div>

                                            <div class="col-md-4">
                                                <ul>
                                                    <li><a href="./html/result-seach.php?category=7" class="story">Ngôn Tình</a></li>
                                                    <li><a href="./html/result-seach.php?category=8" class="story">Quân Sự</a></li>
                                                    <li><a href="./html/result-seach.php?category=9" class="story">Xuyên Không</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 thirst">
                        <form action="./html/seach-author-story.php" class="form-group" method="GET">
                            <input id="search" name="content" placeholder="Tên truyện hoặc tác giả">
                            <button type="submit">
                                    <img src="./image/image_homepage/icon-search-primary.png" width="100%">
                            </button>
                        </form>
                    </div>
                    <div class="col-md-3 block-user">
                       <?php
                                header_user_index($conn);
                        ?>
                    </div>
                </div>

            </div>
        </header>
        <main class="truyen-main">
            <div class="container">
                <div id="header-main"><br><br>
                    <h3>Truyện Đề Cử</h3>
                    <div id="demo" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                            <li data-target="#demo" data-slide-to="1"></li>
                            <li data-target="#demo" data-slide-to="2"></li>
                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                    <?php  
                                        $x =0;                         
                                        recomment($conn,$x);
                                    ?>
                            </div>
                            <div class="carousel-item">
                                    <?php
                                        $x =$x+4;
                                        recomment($conn,$x);
                                    ?>
                            </div>
                            <div class="carousel-item">
                                    <?php
                                        $x =$x+4;                
                                        recomment($conn,$x);
                                    ?>

                            </div>
                        </div>
                    </div>

                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
                
                <div class="content">
                    <div class="block1">
                        <div class="row">
                            <div class="col-md-8">
                                <h3> Truyện mới cập nhật</h3>
                                <div class="block-content">
                                    <ul class="list-group ">
                                        <?php
                                            story_new_update($conn);
                                        ?>
                                    </ul>
                                </div>    
                                <a href="./html/story-new-update.php?value=truyen-moi&&page=1" class="pull-right cnt-view">Xem thêm>></a>                                
                            </div>
                            <div class="col-md-4">
                                <h3>Truyện hot</h3>
                                <ul class="list-group story-hot">
                                    <?php
                                        story_hot($conn);
                                    ?>
                                </ul>
                            </div>
                        </div><hr>
                        <div class="row">
                            <h3 class="col-md-12">Truyện được yêu thích</h3><br>
                            <?php
                                story_favorite($conn);
                            ?>

                        </div>
                        <div class="row">
                        <h3 class="col-md-12">Truyện được đọc nhiều</h3><br>
                            <?php
                                story_views($conn);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php
            footerIndex();
        ?>
       
    </div>                

    <!-- Modal Đăng nhập -->
    <div class="modal fade" id="dangnhapModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Đăng Nhập</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <div class="modal-body">
                    <form action="./php/dangnhap.php" method="POST">
                        <div class="form-group">
                            <label for="email1" class="col-form-label"> Email</label>
                            <input type="email" class="form-control"  placeholder="Nhập Email" name="email" id="email1" onkeyup="validate(this)">
                            <small id="email1-error" class="form-text text-danger" hidden>Email không hợp lệ. Mời nhập lại!
                            </small>
                        </div>

                        <div class="form-group">                    
                            <label for="password1" " class="col-form-label">Mật khẩu</label>
                            <div class="position">
                                <input type="password" class="form-control" onkeypress="return event.charCode!= 32" id="password1" placeholder="Mật khẩu" name="password" onkeyup="validate(this)" >
                                <i toggle="#password1" class="fa fa-fw fa-eye  toggle-password1" id="field-icon"></i>
                            </div>
                            <small id="password1-error" class="form-text text-danger" hidden>Password không hợp lệ.</small>
                            <p><a href="#">Quên mật khẩu</a></p>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" onchange="displayBtnLogin()">
                            <label class="form-check-label" for="exampleCheck1">Ghi nhớ thông tin đăng nhập</label>
                        </div>
                        <button type="submit" class="sign" id="btn-login">Đăng nhập</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <p>Bạn chưa có tài khoản? <a href="#" data-toggle="modal" data-dismiss="modal" data-target="#dangkiModal">Đăng ký</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal đăng kí -->
    <div class="modal fade" id="dangkiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Đăng Ký</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="./php/dangky.php" method="POST">
                        <div class="form-group">
                            <label for="userName" class="col-form-label">Tài khoản</label>
                            <input type="text" class="form-control" id="userName" placeholder="Nhập tên tài khoản" name="userName">
                        </div>

                        <div class="form-group">
                            <label for="password2"  class="col-form-label">Mật khẩu</label>
                            <div class="position">
                                <input type="password" onkeypress="return event.charCode != 32" class="form-control" id="password2" placeholder="Mật khẩu" name="password" onkeyup="validate2(this)" >
                                <span toggle="#password2" class="fa fa-fw fa-eye  toggle-password2" id="field-icon"></span>
                            </div>
                            <small id="password2-error" class="form-text text-danger" hidden>Password không hợp lệ.</small>
                        </div>
                        <div class="form-group">
                            <label for="email2" class="col-form-label"> Email</label>
                            <input type="email" class="form-control"  placeholder="Nhập Email" name="email" id="email2" onkeyup="validate2(this)">
                            <small id="email2-error" class="form-text text-danger" hidden>Email không hợp lệ. Mời nhập lại!
                            </small>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label"> Số điện thoại</label>
                            <input type="text" class="form-control" id="phoneNumber" placeholder="Số điện thoại" name="phoneNumber">
                            
                        </div>
                        <div class="form-group">
                            <span>Tôi đồng ý với </span><a href="./dieukhoan.php" target="_blank">Điều khoản dịch vụ </a><input name="remember" type="checkbox" value="1">
                        </div>
                        <button type="submit" class="sign" id="btn-signup" disabled >Đăng Ký</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <p>Bạn đã có tài khoản? <a href="#" data-toggle="modal" data-dismiss="modal" data-target="#dangnhapModal">Đăng nhập ngay</a></p>
                </div>
            </div>
        </div>
    </div> 
    <script src="./js/scriptIndex.js"></script>

</body>

</html>
