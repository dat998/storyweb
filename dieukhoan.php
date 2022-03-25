<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Điều khoản đăng ký và sử dụng</title>
</head>
<style>
    *{
        margin: 20px;
        padding: auto;
    }
    .title{
        color: #6b9876;
        border-bottom: 2px solid #6b9876;
        text-align: center;
    }
    .content{
        color: #7b8084;
    }
    .thanks{
        color: #6b9876;
        text-align: center;
    }
</style>
<body>
    <h2 class="title">ĐIỀU KHOẢN ĐĂNG KÝ VÀ SỬ DỤNG</h2>
    <div class="content">
        <h3>Đăng ký</h3>
        <p>
            Bạn cần phải nhập thông tin cá nhân đầy đủ, nhập tên tài khoản, mật khẩu, số điện thoại, email. Email sẽ được phục vụ cho việc lấy lại mật khẩu vui lòng nhập đúng chính xác email của mình
        </p>
        <h3>Phương thức liên lạc Admin </h3>
        <p>Email: dattruong0108@gmail.com</p>
        <p>Số điện thoại: 0394389922</p>
        <h3>Phương thức đăng truyện</h3>
        <p>1: Truyện cần đảm bảo không vi phạm các nội dung  </p>
        <?php
            include("./php/connect.php");
            $sql = "SELECT content from error";
            $ressult = $conn->query($sql);
            while ($row=$ressult->fetch_assoc()) {
                echo('<p style="margin-left: 2rem;">- '.$row['content'].'</p>');
            }
        ?>
        <p>2: Truyện có thể bị vi phạm các nội dung nếu vi phạm được người dùng báo cáo lỗi đúng truyện đó sẽ bị khóa lại</p>
        <p>3: Khi Admin kiểm tra truyện nào đó vi phạm lỗi cũng có thể khóa truyện đó lại mà không cần báo trước</p>
        <p>4: Để mở khóa truyện người đăng truyện cần liên hệ admin để giải quyết, nếu không sẽ mặc định là truyện đó bị khóa</p>
        <h3>Một số vấn đề liên quan đến tài khoản</h3>
        <p>1: Người dùng được đưa cho 10 điểm uy tín, khi điểm uy tín về 0  hoặc nhỏ hơn 0 thì admin sẽ xét xem có nên khóa người dùng đó lại không</p>
        <p>2: Điểm uy tín sẽ bị trừ khi người dùng thực hiện comment mà comment đó bị người dùng khác tố cáo, nếu tố cáo là đúng thì người dùng sẽ bị trừ 1 điểm uy tín, comment cần đảm bảo không vi phạm các nội dung sau:</p>
        <?php
            $sql = "SELECT content from errorcomment";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo('<p style="margin-left: 2rem;">- '.$row['content'].'</p>');
            }
        ?>
        <h3>Các vấn đề về nạp tiền và rút tiền, thu nhập của người đăng truyện</h3>
        <p>1: Người đăng truyện khi đăng có thể đưa ra giá cho truyện của mình, người dùng sẽ mua truyện đó tiền sẽ được chuyển về tài khoản của người đăng truyện. Thu nhập của người đăng truyện cũng có thể từ số tiền donate của người đọc cho người đăng truyện</p>
        <p>2: Người dùng có thể nạp tiền bằng phương thức thẻ nạp điện thoại, hoặc có thể liên hệ admin để nạp tiền vào tài khoản bằng phương thức khác</p>
        <p>3: Người dùng có thể rút tiền khỏi tài khoản bằng cách gửi yêu cầu cho admin, sau đó admin sẽ thực hiện chuyển tiền. Hoặc người dùng cũng có thể liên hệ admin để chọn cách thức rút tiền</p>
        <h1 class="thanks">ZENKUN STORY chúc bạn có trải nghiệm tốt với trang đọc truyện này</h1>
    </div>
    
</body>
</html>
