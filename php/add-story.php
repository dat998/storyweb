<?php
    include_once("../php/connect.php");
    include("./controller.php");
    session_start();

    $storyName= $_POST['storyName'];
    
    $content = $_POST['content'];
    $imageName = $_FILES["image"]["name"];
    $userid = $_SESSION['id'];

    $category = $_POST['category'];
    $priceStory = $_POST['priceStory'];

    $target_path = "../image/images_upload/";
    $target_file = $target_path.basename($_FILES["image"]["name"]);
    //$category1[]= null;
    if(empty($category)){
        echo'Bạn chưa chọn thể loại nào';
        $_SESSION['add-story']=3;
        header("Location:./../html/user/user-edit.php?value=3");
    }
    else{
        $arrCategory =  implode(";",$category);
        // $N = count($category);
        // for($i=0; $i < $N; $i++)
        // {
        //     //echo($category[$i] . " ");
            
            
        // }
        if ($conn->connect_error) {
            die("Không kết nối :" . $conn->connect_error);
            exit();
        }
        if($storyName==""||$content==""||$imageName==""){
            $_SESSION['add-story']=4;
            header("Location:./../html/user/user-edit.php?value=3");
        }
        $sql = "SELECT count(id) as count from stories where story_name='$storyName'";
        $result = $conn->query($sql);
        if($result!=false){
            $row = $result->fetch_assoc();
                if($row['count']>0){
                    echo "story đã tồn tại!";
                    $_SESSION['add-story']=1;
                    header("Location:./../html/user/user-edit.php?value=3");
                }else{
                    echo $target_file;
                    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                    $author = $_SESSION["author"];
                    
                    $sql = "INSERT INTO stories(author_name,story_name,category,content,images,user,price,status) VALUES ('$author','$storyName','$arrCategory','$content','$imageName','$userid','$priceStory',6 )";   
                    $result = $conn->query($sql);
                    $_SESSION['add-story']=2;
                    $_SESSION['story'] = $storyName;
                    // $sql = "SELECT id from stories where story_name= '$storyName'";
                    // $result = $conn->query($sql);
                    // $row= $result->fetch_assoc();
                    // $id = $row['id'];

                    // phpAlert($id);
                    // $sql1 = "INSERT into views(id_story) values('$id')";
                    // $result1 = $conn->query($sql1);

                    //$_SESSION['storyName'] = $storyName;
                    //echo '<img src="../image/images_upload/'.$imageName.'" alt="'.$imageName.'">';
                    echo($priceStory);
                    header("Location:./../html/user/user-edit.php?value=3");
                }
        }
        
    
    }
    
?>
