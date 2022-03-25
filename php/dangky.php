<?php
    include_once("../php/connect.php");
    
    session_start();
    $userName= $_POST['userName']??'';
    $password= $_POST['password']??'';
    $email=$_POST['email'];
    $phoneNumber =$_POST['phoneNumber'];
    if(isset($_POST['remember'])){
        $remember = $_POST['remember'];
        echo($remember);
        if ($conn->connect_error) {
            die("Không kết nối :" . $conn->connect_error);
            exit();
        }
        
        $sql="SELECT userName,password,email,phoneNumber FROM users";
        $result = $conn->query($sql);
        // echo "Khi kết nối thành công sẽ tiếp tục dòng code bên dưới đây.";
        $temp =0;
        while( $row = $result->fetch_assoc()){
            if($userName==$row['userName']){
                //tài khoản đã tồn tại
                $_SESSION['status-dangky']=1;
                header ("location:./../index.php");
                return;
            }
            elseif($email==$row['email']){
                $_SESSION['status-dangky']=5;
                header ("location:./../index.php");
                return;
            }elseif($phoneNumber==$row['phoneNumber']){
                $_SESSION['status-dangky']=6;
                header ("location:./../index.php");
                return;
            }
            elseif($userName==""||$password==""||$email==""){
                //echo"Bạn vui lòng nhập đủ thông tin";
                $_SESSION['status-dangky']=2;
                header ("location:./../index.php");
            }
            $temp=1;
        }
        if($temp ==1){
            $pass = md5($password);
            $sql = "INSERT INTO users (userName, password, email,role,phoneNumber) VALUES('$userName','$pass','$email','user','$phoneNumber')";
            // $result = $conn->query($sql);//ket thuc viec ghi vao db
            if($result=$conn->query($sql) === TRUE){
                //echo "Đăng ký thành công";
                $_SESSION['status-dangky']=3;
                header ("location:./../index.php");
                //echo '<a href="../index.php">quay lại trang chủ</a>';
            }
            else{
                //echo "Vui lòng đăng ký lại!";
                $conn->error;
                $_SESSION['status-dangky']=4;
                header ("location:./../index.php");
                //echo '<a href="../index.php">quay lại trang chủ</a>';
            }
        }
        $conn->close();
    }else {
        $_SESSION['status-dangky']=7;
        header ("location:./../index.php");
    }
    
    
    
?>