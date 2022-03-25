<?php
    session_start();
    include_once("../php/connect.php");
    include_once("./../php/controller.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        echo'Thêm chương -' .$_SESSION['story'].'-'.$_SESSION['author'];
        ?>
        
    </title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/addChap.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    
    <script src="../ckeditor/ckeditor.js"></script>
</head>
<body>
    <div class="page-wraper">
        <?php
            header_user($conn);
        ?>
        <main class="truyen-main" style="background:none;">
            <div class="container">
                <h4 class="title">Thêm chap</h4>
                <form action="../php/add-chap.php" method="POST">
                    <div class="chap-number">
                        <label>Chap số:</label>
                        <input type="text" name="chapNumber" placeholder="Chap thứ">
                    </div>
                    <div class="title-chap">
                        <label>Tiêu đề chap:</label>
                        <input  type="text" name="nameChap" placeholder="Tiêu đề chap">
                    </div>
                    <div class="content-chap">
                        <label>Nội dung:</label>
                        <textarea name="content" id="content" style="width: 100%;" rows="10" placeholder="Nội dung của chap"></textarea>
                            <script>CKEDITOR.replace("content");</script>
                    </div>   
                    <input class="add-chap" type="submit" value="Thêm chap">
                </form>
        </main>
        <?php
            footer();
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
                    <form action="../php/dangnhap.php" method="POST">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Tài khoản</label>
                            <input type="text" class="form-control" name="userName" id="userName" placeholder="Tài khoản">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Mật khẩu</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Mật khẩu">
                            <p><a href="#">Quên mật khẩu</a></p>

                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" onchange="displayBtnLogin()">
                            <label class="form-check-label" for="exampleCheck1">Ghi nhớ thông tin đăng nhập</label>
                        </div>
                        <button type="submit" class="sign">Đăng nhập</button>
                    </form>
                    <p>Hoặc đăng nhập bằng facebook</p>
                    <div class="fb">
                        <i class="fab fa-facebook"></i>
                        <span>facebook</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <p>Bạn chưa có tài khoản? <a href="#" data-toggle="modal" data-target="#dangkiModal">Đăng kí</a></p>
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
                    <form action="../php/dangky.php" method="POST">
                        <div class="form-group">
                            <label for="userName" class="col-form-label">Tài khoản</label>
                            <input type="text" class="form-control" id="userName" placeholder="Tài khoản" name="userName">
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Mật khẩu</label>
                            <input type="password" class="form-control" id="password" placeholder="Mật khẩu" name="password">
                        </div>

                        <!-- <div class="form-group">
                            <label class="col-form-label"> Nhập lại mật khẩu</label>
                            <input type="password" class="form-control" id="password" placeholder="Nhập lại mật khẩu">
                        </div> -->

                        <div class="form-group">
                            <label class="col-form-label"> Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                        </div>
                        <button type="submit" class="sign" >Đăng Ký</button>
                    </form>
                    
                    <p>Hoặc đăng ký bằng facebook</p>
                    <div class="fb">
                        <i class="fab fa-facebook"></i>
                        <span>facebook</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <p>Bạn đã có tài khoản? <a href="#">Đăng nhập ngay</a></p>
                </div>
            </div>
        </div>
    </div> 
</body>
</html>