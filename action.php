<?php
    $username = "root"; // Khai báo username
    $password = "";      // Khai báo password
    $server   = "localhost";   // Khai báo server
    $dbname   = "test";      // Khai báo database
    $conn=new mysqli($server,$username,$password,$dbname);

    if ($conn->connect_error) {
        die("Không kết nối :" . $conn->connect_error);
        exit();
    }
   
    $storyName = $_POST['story_name'];

    // $sql= "SELECT name FROM img";
    // $result = $conn->query($sql);

    $target_path = "image/images_upload/";
    $target_file = $target_path.basename($_FILES["image_name"]["name"]);
    //echo "File lưu tại " . $target_file;
    var_dump($_FILES['image_name']);
    echo"<br>";
    $imageName = $_FILES["image_name"]["name"];

    if (move_uploaded_file($_FILES["image_name"]["tmp_name"], $target_file))
      {
          echo "File ". basename( $_FILES["image_name"]["name"])." Đã upload thành công."."<br>";
        
          echo "File lưu tại " . $target_file;

      }
    $sql = "INSERT img(img,name) VALUES ('$imageName','$storyName')";
    $result = $conn->query($sql);
    if($result) echo "luu thanh cong";
    else echo $conn->error;
?>