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
    <title><?php 
            
            echo $_SESSION['userName'].'-Thêm truyện';
            
        ?></title>
    <<link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/addStory.css">
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
                <h4 class="title">Thêm truyện</h4>
                <form action="../php/add-story.php" method="POST" enctype="multipart/form-data">
                    <div class="Tên Truyện"> 
                        <label >Tên truyện: </label>
                        <input type="text" class="form-control"  placeholder="Tên truyện " name="storyName">
                    </div><br>
                    <div>
                        <label>Giá</label>
                        <input type="text" class="form-control" placeholder="Giá truyện" name="priceStory">
                    </div>
                    <div class="catory">
                        <label>Thể loại: </label>
                        <div class="select">
                            <input type="checkbox"  value="1" name="category[]">
                            <span>Tiên Hiệp</span>
                            <input type="checkbox"  value="2" name="category[]"> 
                            <span>Kiếm Hiệp</span>
                            <input type="checkbox"  value="3" name="category[]"> 
                            <span>Hiện Đại</span>
                            <input type="checkbox"  value="4" name="category[]"> 
                            <span> Dị Năng</span>
                            <input type="checkbox"  value="5" name="category[]"> 
                            <span>Huyền Huyễn</span>
                            <input type="checkbox"  value="6" name="category[]"> 
                            <span>Lịch Sử</span>
                            <input type="checkbox"  value="7" name="category[]"> 
                            <span>Ngôn Tình</span>
                            <input type="checkbox"  value="8" name="category[]"> 
                            <span>Quân Sự</span>
                            <input type="checkbox"  value="9" name="category[]"> 
                            <span>Xuyên Không</span>
                        </div>    
                    </div><br>
                    <div class="content-story">
                        <label>Nội Dung( nội dung truyện có ảnh hưởng hơn 90% tới quyết định của người đọc khi muốn đọc một truyện nào đấy, nên hãy viết vắn tắt những nội dung hay nhất của truyện bạn định post vào đây): </label>
                        <textarea style="width: 100%;" name="content" id="content" rows="10" placeholder=""></textarea>
                        <script>CKEDITOR.replace("content");</script>
                    </div> 
                    <div class="poster">
                        <label>Chọn Poster cho truyện </label><br>
                        <input type="file"  accept="image/*" name="image" multiple="true" ><br><br>  
                    </div>
                    <input class="add-story" type="submit" value="Đăng truyện">
                </form>
                </div>
            </div>    
        </main>
        <?php
            footer();
        ?>   
    </div>           
</body>
</html>