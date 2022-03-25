<?php
$username = "root"; // Khai báo username
$password = "";      // Khai báo password
$server   = "localhost";   // Khai báo server
$dbname   = "story";      // Khai báo database
$conn=new mysqli($server,$username,$password,$dbname);

function recomment($conn,$x){

    $sql = "SELECT * from stories where status= '1' ORDER BY update_at DESC limit $x,4";
    
    $result = $conn->query($sql);
    echo'<div class="row">';
        while($row= $result->fetch_assoc()){
        echo '<div class="col-md-3">
                <a href="./html/introStory.php?storyid='.$row['id'].'">';
                echo '<img src="./image/images_upload/'.$row['images'].'" width="270px" height="400px"> <br>';
                echo '<div class="title"><h3>'.$row["story_name"].'</h3></div>';
                echo'</a>
            </div>';
        }
    echo'</div>';
}
function phpAlert($string){
    echo "<script>alert('$string')</script>";
}
function alert(){
   //đăng nhập
    if(isset($_SESSION['user-dangnhap'])){
        if($_SESSION['user-dangnhap']==1){
            phpAlert("Đăng nhập thành công");
        }elseif($_SESSION['user-dangnhap']==2){
            phpAlert("Nhập sai tài khoản");
        }
        unset($_SESSION['user-dangnhap']);
    }
    //đăng ký
    if(isset($_SESSION['status-dangky'])){
        if($_SESSION['status-dangky']==1){
            phpAlert('tài khoản đã tồn tại, nhập tài khoản khác');
        }
        elseif($_SESSION['status-dangky']==2)
        {
            phpAlert("Bạn vui lòng nhập đủ thông tin");
        }elseif($_SESSION['status-dangky']==3)
        {
            phpAlert( "Đăng ký thành công");
        }elseif($_SESSION['status-dangky']==4)
        {
            phpAlert( "Vui lòng đăng ký lại!");
        }elseif($_SESSION['status-dangky']==5)
        {
            phpAlert( "Email đã tồn tại, vui lòng đăng ký lại!");
        }elseif($_SESSION['status-dangky']==6)
        {
            phpAlert( "Số điện thoại đã tồn tại, vui lòng đăng ký lại!");
        }
        elseif($_SESSION['status-dangky']==7)
        {
            phpAlert( "Bạn chưa đồng ý điều khoản dịch vụ!");
        }
        unset($_SESSION['status-dangky']);
    }

    if(isset($_SESSION['update-chap'])){
        if($_SESSION['update-chap']==1){
            phpAlert("Cập nhật chap thành công");
            unset($_SESSION['update-chap']);
        }
    }

    if(isset($_SESSION['status-update-user'])){
        if($_SESSION['status-update-user']==1){
            phpAlert("Bạn vui lòng nhập đủ thông tin");
        }elseif($_SESSION['status-update-user']==2){
            phpAlert("Số điện thoại phải = 10");
        }elseif($_SESSION['status-update-user']==3){
            phpAlert("tài khoản đã tồn tại vui lòng đặt tên khác");
        }elseif($_SESSION['status-update-user']==4){
            phpAlert("Email đã tồn tại vui lòng sử dụng email khác");
        }elseif($_SESSION['status-update-user']==5){
            phpAlert("Số điện thoại đã tồn tại vui lòng nhập số điện thoại khác");
        }elseif($_SESSION['status-update-user']==6){
            phpAlert("Update thành công");
        }
        unset($_SESSION['status-update-user']);
    }
    if(isset($_SESSION['status-admin-update-user'])){
       
        if($_SESSION['status-admin-update-user']==1){
            phpAlert("phải sđt = 10");
        }elseif($_SESSION['status-admin-update-user']==2){
            phpAlert( 'cập nhật thông tin thành công');
        }elseif( $_SESSION['status-admin-update-user']==3){
            phpAlert('không được để rỗng');
        }elseif( $_SESSION['status-admin-update-user']==4){
            phpAlert('reset mật khẩu thành công cho user');
        }
        unset($_SESSION['status-admin-update-user']);
    }

    if(isset($_SESSION['add-author'])){
        if($_SESSION['add-author']==1){
            phpAlert( 'Chưa nhập tên tác giả!');
        }elseif($_SESSION['add-author']==2){
            phpAlert( "Author đã tồn tại!");
        }elseif($_SESSION['add-author']==3){
            phpAlert('Thêm thành công');
        }
        unset($_SESSION['add-author']);
    }

    if(isset($_SESSION['delete-comment'])){
        if($_SESSION['delete-comment'] == 1){
            phpAlert("Xóa bình luận thành công");
        }
        unset($_SESSION['delete-comment']);

    }
    if(isset($_SESSION['comment'])){
        if($_SESSION['comment']==3){
            phpAlert('Bình luận của bạn đang chờ duyệt');
        }elseif($_SESSION['comment']==2){
            phpAlert('Bạn chưa nhập gì cả, hãy thử lại!');
        }elseif($_SESSION['comment']==1){
            phpAlert('Bình luận thành công!');
        }
        unset($_SESSION['comment']);
    }
    if(isset($_SESSION['card'])){
        if($_SESSION['card'] == 2){
            phpAlert("Thẻ bạn nhập vào không đúng thẻ viettel phải có 2 dạng seri 11 ký tự - mã thẻ 13 số và seri 14 ký tự và mã thẻ 15 số ");
        }elseif($_SESSION['card'] == 1){
            phpAlert("Thẻ bạn nhập vào không đúng thẻ vinaphone phải có 2 dạng seri cùng có 14 ký tự - mã thẻ 12 số và mã thẻ 14 số");
        }elseif( $_SESSION['card'] == 3){
            phpAlert('Thẻ bạn nhập vào không đúng thẻ mobiphone phải có seri 15 số và mã thẻ 12 số');
        }elseif( $_SESSION['card'] == 4){
            phpAlert("Thẻ của bạn đang được chờ để admin xét duyệt vui lòng đợi");
        }
        unset($_SESSION['card']);

    }
    if(isset($_SESSION['update-pay-card'])){
        if($_SESSION['update-pay-card']  == 1){
            phpAlert("Duyệt thành công!");
        }elseif($_SESSION['update-pay-card']  == 2){
            phpAlert("Xác nhận hủy thẻ lỗi thành công");
        }
        unset($_SESSION['update-pay-card']);
    }
    if(isset($_SESSION['pay-story'])){
        if($_SESSION['pay-story']==1){
            phpAlert("Số point trong tài khoản bạn không đủ ");
        }elseif ($_SESSION['pay-story']==2) {
            phpAlert("Bạn mua thành công truyện ");
        }
        unset($_SESSION['pay-story']);
    }
    if(isset( $_SESSION['donate'])){
        if( $_SESSION['donate'] ==1){
            phpAlert("Số tiền của bạn không ddue vui lòng nạp thêm và thử lại");
        }elseif ( $_SESSION['donate'] ==2) {
            phpAlert("Bạn đã donate thành công");
        }
        unset( $_SESSION['donate']);

    }
    if(isset($_SESSION['report-story'])){
        if($_SESSION['report-story']==1){
            phpAlert("Bạn đã report thành công!");
        }
        unset($_SESSION['report-story']);
    }
    if(isset($_SESSION['repay-money'])){
        if($_SESSION['repay-money'] ==1){
            phpAlert("xác nhận thành công ");
        }else {
            phpAlert("hủy thành công, hoàn trả lại point cho người dùng");
        }
        unset($_SESSION['repay-money']);

    }
    if(isset( $_SESSION['rut-tien'])){
        if( $_SESSION['rut-tien']==1){
            phpAlert("Tài khoản không đủ");
        }elseif ( $_SESSION['rut-tien']==2) {
            phpAlert("Thành công chờ admin duyệt");
        }
        elseif ( $_SESSION['rut-tien']==3) {
            phpAlert("Bạn nhập không đủ thông tin vui lòng nhập lại");
        }
        unset( $_SESSION['rut-tien']);
    }
    if(isset($_SESSION['story-status'])){
        if($_SESSION['story-status']==2){
            phpAlert("truyện đã bị khóa");
        }
        unset($_SESSION['story-status']);
    }
    if(isset($_SESSION['change-password'])){
        if($_SESSION['change-password']==0){
            phpAlert("Bạn nhập thiếu vui lòng nhập lại!");
        }elseif ($_SESSION['change-password']==2) {
            phpAlert("Bạn nhập mật khẩu không đúng");
        }elseif ($_SESSION['change-password']==1) {
            phpAlert("Bạn nhập mật khẩu mới không khớp");
        }elseif ($_SESSION['change-password']==3) {
            phpAlert("Cập nhật mật khẩu thành công");
        }
        unset($_SESSION['change-password']);
    }
   
}

function header_user_index($conn){
    if(!isset($_SESSION['role'])){
        echo'<img src="./image/icon-user.png" class="responsive">
        <a  data-toggle="modal" data-target="#dangnhapModal">Đăng nhập</a>
        <span>|</span>
        <a  data-toggle="modal" data-target="#dangkiModal">Đăng kí</a>';
    }   else{
        if($_SESSION['role']=="user"){
            echo'<a href="./html/user/user-edit.php">';
            echo "User: ".$_SESSION['userName'];
            echo'</a>';
            echo'<a href="./php/logout.php"> | Đăng Xuất</a>';
            //phpAlert("Tài khoản ".$_SESSION["role"].": ".$_SESSION['userName']);
        }
        if($_SESSION['role']=="admin")
        {
            echo'<a href="./html/user/user-edit.php">';
            echo "Admin: ".$_SESSION['userName'];
            echo'</a>';
            echo'<a href="./php/logout.php"> | Đăng Xuất</a>';
           // phpAlert("Tài khoản ".$_SESSION["role"].": ".$_SESSION['userName']);
        }
        if($_SESSION['role']=="khóa"){
            echo'Tài khoản bị vô hiệu hóa';
            echo'<a href="./php/logout.php"> | Đăng Xuất</a>';
            //phpAlert("Tài khoản ".$_SESSION["role"].": ".$_SESSION['userName']);
        }
        $id=$_SESSION['id'];
        $sqlSetPoint ="SELECT point from users where id='$id'";
        $result = $conn->query($sqlSetPoint);
        $row = $result->fetch_assoc();

        echo'<br><span class="fas fa fa-dollar fa-fw mr-3">'.$row['point'].'</span>';
    
    }
}
function story_new_update($conn){
    $sql= "SELECT id,images,story_name,author_name,status from stories ORDER BY update_at DESC";
    $result = $conn->query($sql);
    if(!isset($page)){ 
        $count = 0;
        while($row= $result->fetch_assoc()){
            if($row['status']==2||$row['status']==6){

            }else {
                $nameStory = $row['id'];
                $sql1 = "SELECT max(chap_number) as max from chaps where story_name='$nameStory' ";
                $result1 = $conn->query($sql1);
                $row1= $result1->fetch_assoc();
                //lấy tên tác giả
                $author = $row["author_name"];
                $sqlAuthor ="SELECT author_name from author where id='$author'";
                $resultAuthor =$conn->query($sqlAuthor);
                $authorName= $resultAuthor->fetch_assoc();
                //$_SESSION['story_name']=$row['story_name'];
                echo '<li class="list-group-item list-group-item-table">';
                    echo'<div class="content">
                        <a class="thumb" href="./html/introStory.php?storyid='.$row['id'].'"  title=" '.$row['story_name'].' "> 
                            <img class="img-responsive" src="./image/images_upload/'.$row['images'].'" alt="" width="30px" height="40px">
                        </a>';
                        echo'<div class="info">
                            <h2 class="title"> <a href="./html/introStory.php?storyid='.$row['id'].'"  title="'.$row['story_name'].'">'.$row['story_name'].'</a> </h2>
                            <div class="author">'.$authorName['author_name'].'</a></div>
                            <a class="chap-max"href="./html/readStory.php?story-name='.$row['id'].'&&chap-number='.$row1['max'].'">Chap'.$row1['max'].'</a>
                            </div>
                    </div>
                </li>';
                $count++;
                if($count==10){
                    return;
                } 
            }
            
        }
        
    }
}
function story_hot($conn){
    $sql1 ="SELECT * from views order by point_story desc limit 0,20    ";
    $result1 = $conn->query($sql1);
    //$row1 = $result1->fetch_assoc();
    
    if(!isset($page)){   
        $i = 1;
        while($row1= $result1->fetch_assoc()){
            $id = $row1['id_story'];
            $sql = "SELECT id,images,story_name,author_name,status from stories WHERE id ='$id' ";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            //lấy tên tác giả
            $author = $row["author_name"];
            $sqlAuthor ="SELECT author_name from author where id='$author'";
            $resultAuthor =$conn->query($sqlAuthor);
            $authorName= $resultAuthor->fetch_assoc();
            if($row['status']!=2){
                echo'<li><span>'.$i.'</span>';
                echo '<li class="list-group-item list-group-item-table">';
                   echo'<div class="content">
                       <a class="thumb" href="./html/introStory.php?storyid='.$row['id'].'"  title=" '.$row['story_name'].' "> 
                           <img class="img-responsive" src="./image/images_upload/'.$row['images'].'" alt="" width="30px" height="40px">
                       </a>';
                       echo'<div class="info">
                               <h2 class="title">
                                   <a href="./html/introStory.php?storyid='.$row['id'].'" title="'.$row['story_name'].'">'.$row['story_name'].'</a>
                               </h2>
                               <div class="author">
                                   <small>'.$authorName['author_name'].' |&ensp;<i class="fas fa-thumbs-up" style="color:#007bff;"></i>&nbsp;'.$row1['point_rate'].' |<i class="fas fa-eye"> '.$row1['views'].'</i></small>
                               </div>
                           </div>
                   </div>
               </li>';    
               
               if($i++>=10){
                    return;
               }
            }
            
        }
        
    }
}
function intro_story($conn){
    $idStory=null;
    if(isset($_SESSION['user-pay-story'])){
        unset($_SESSION['user-pay-story']);
    }
    if(isset($_GET["storyid"])){
        $idStory = $_GET["storyid"];
    }else{
        $idStory =  $_SESSION['story_id'];
    }
    $_SESSION['story_id']=$idStory;
    $sql = "SELECT * FROM stories Where id='$idStory'";
    $result= $conn->query($sql);
    
   
    
    if($result!=false){
        $row = $result->fetch_assoc();
        //lấy tên tác giả 
        $author = $row["author_name"];
        $sqlAuthor ="SELECT author_name from author where id='$author'";
        $resultAuthor =$conn->query($sqlAuthor);
        $authorName= $resultAuthor->fetch_assoc();
            echo'<div class="block-1">';
                echo '<h4 class="items">Thông tin truyện</h4>';
                echo'<div class="row">';
                    echo '<div class="col-md-4">';
                        //$_SESSION['story_id']=$row['id'];
                        echo'<h5 class="title">'.$row['story_name'].'</h5>';
                        echo '<div class="story">
                                <img src="../image/images_upload/'.$row["images"].'" class="img-responsive" width="85%" height="400px">
                            </div>';
                            
                        echo'<div class="info">';    
                            echo '<p><b>Tác giả:</b> '.$authorName["author_name"].'</p>';
                            echo '<p><b>Thể loại:</b>';
                            $idCategory = $row["category"];           
                            $paras = explode(";",$row["category"]);            
                            foreach($paras as $para){
                                $sql1 = "SELECT * FROM categories WHERE id ='$para'";
                                $result1 = $conn->query($sql1);
                                if($result1!=false){
                                    while($row1 = $result1->fetch_assoc()){
                                        echo $row1['categories_name'].';';
                                    }
                                }
                            }
                        echo'</div>';

                        echo'<div class="read">
                            <img src="./../image/book.png" alt="" width="30%">
                            <a href="./introStory.php?page=chap"><button>Đọc Truyện</button></a>
                        </div>';
                    echo'</div>
                    ';               
                    echo'<div class="col-md-8" >';

                    $sql1 = "SELECT point_rate,views from views where id_story='$idStory'";
                    $result1= $conn->query($sql1);
                    $row1 = $result1->fetch_assoc();
                    echo '<br><br><span style="color:#6b9876; margin-left:20px">like:'.$row1['point_rate'] .'</span>
                    <span style="color:#6b9876; margin-left:20px">views:&ensp;<i class="fas fa-eye"></i> '.$row1['views'].'</span>';
                    //Kiểm tra xem truyện này đã được mua hay chưa 
                    if(isset($_SESSION['id'])){

                    
                        $id = $_SESSION['id'];
                        $sqlUserPayStory = "SELECT id_story,id_user from paystory where id_user = '$id' and id_story='$idStory'";
                        $result = $conn->query($sqlUserPayStory);
                        $row5 = $result->fetch_assoc();
                        //like 
                        if($row['user']==$_SESSION['id']||$_SESSION['role']=='admin'){
                            echo'';
                        }
                        elseif(!isset($row5)){
                            echo'<span><a href="../php/pay-story.php">Mua với giá : '.$row['price'].'</a></span>';
                        }else{
                            echo'<span style="color:#6b9876; margin-left:20px"> Đã mua</span>';
                        }
                    }

                    if(isset($_SESSION['id'])&&$_SESSION['role']!='khóa'){
                        $id = $_SESSION['id'];
                        $sql1 = "SELECT value from rate where story='$idStory'and user_rate='$id'";
                        $result1= $conn->query($sql1);
                        $row1 = $result1->fetch_assoc();
                        if(empty($row1)){
                            echo'
                            <div class="rate">
                                <div class="rate-hoder" style="cursor: pointer;">
                                <a href="./../php/rate.php?id-story='.$row['id'].'&&value=1"><i class="far fa-thumbs-up"></i></a>
                                
                                </div>
                                <small><i>Đánh giá</i></small>
                            </div>
                            ';
                            //  DONATE
                            echo'<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Donate +</button> ';
                            //Báo cáo vi phạm
                            echo'<button type="button" class="btn" style="background-color: red; " data-toggle="modal" data-target="#modalReport">Báo cáo vi phạm</button>';
                    
                        }elseif(!empty($row1)&& $row1['value']==1) {
                            echo'
                            <div class="rate">
                                <div class="rate-hoder" style="cursor: pointer;">
                                <a href="./../php/rate.php?id-story='.$row['id'].'&&value=2"><i class="fas fa-thumbs-up"></i></a>
                                
                                </div>
                                <small><i>Đánh giá</i></small>  
                            </div>
                            ';
                            //  DONATE
                            echo'<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Donate +</button> ';
                            //Báo cáo vi phạm
                            echo'<button type="button" class="btn" style="background-color: red; " data-toggle="modal" data-target="#modalReport">Báo cáo vi phạm</button>';
                    
                        }
                        
                    }
                    //content
                    $paras1 = explode("\n",$row["content"]);
                    echo('<div style="height: 400px;overflow: auto;">');
                    foreach($paras1 as $para1){
                        echo '<p style="text-indent:1rem">'.$para1.'</p>';
                    }
                    $nameStory = $row['story_name'];
                    $_SESSION['story_name']=$nameStory;
                    $sql1 = "SELECT * FROM chaps WHERE story_name='$idStory'";
                    $result1 = $conn->query($sql1);

                    echo '</div>
                    </div>';
            echo '</div>';
            if(isset($_GET['page'])&&$_GET['page']=="chap"){
                // $sql="SELECT * from views where id_story=$idStory";
                // $result=$conn->query($sql);
                // $row2 = $result->fetch_assoc();
                // $view = $row2['views']+1;
                // $pointStory = $row2['point_story']+1;
                // $sql = "UPDATE views set views= '$view', point_story='$pointStory'  where id_story=$idStory";
                // $result = $conn->query($sql);

                echo'
                <div class="block-2">';
                    echo' <h4 class="items">Danh sách chương</h4>';
                    echo '<div class=row>';
                        echo'<div class="col-md-8">
                            <ul class="chap">';
                            $count = 0;
                                if($result1!=false){
                                    //kiểm tra xem người dùng đã mua truyện chưa
                                    if(isset($_SESSION['id'])){
                                        $idUser = $_SESSION['id'];
                                        $sql2 = "SELECT id_story from paystory where id_user='$idUser'";
                                        $result2 = $conn->query($sql2);
                                        if($result2!=false){
                                            while ($row2 = $result2->fetch_assoc()) {
                                                if($idStory==$row2['id_story']){
                                                    $_SESSION['user-pay-story'] = 1;
    
                                                }
                                            }
                                        }
                                    }
                                    
                                    if(isset($_SESSION['user-pay-story'])&&$_SESSION['user-pay-story']==1){
                                        while($row1=$result1->fetch_assoc()){
                                            echo'<li><a href="./readStory.php?story-name='.$idStory.'&&chap-number='.$row1["chap_number"].'">Chương:'.$row1["chap_number"].' :'. $row1["name_chap"].'</a></li>';
                                        }
                                    }else{
                                        while($row1=$result1->fetch_assoc()){ 
                                            $_SESSION['storyName']=$idStory;
                                            //echo'<li><a href="./readStory.php?story-name='.$nameStory.'&&chap-number='.$row1["chap_number"].'">Chương:'.$row1["chap_number"].' :'. $row1["name_chap"].'</a></li>';
    
                                            $count++;
                                            if(!isset($_SESSION['id'])||$_SESSION['role']=="khóa"||$_SESSION['role']=='user'){
                                                if($count<=3){
                                                    echo'<li><a href="./readStory.php?story-name='.$idStory.'&&chap-number='.$row1["chap_number"].'">Chương:'.$row1["chap_number"].' :'. $row1["name_chap"].'</a></li>';
                                                }
                                                else{
                                                    echo'<li>Chương:'.$row1["chap_number"].' :'. $row1["name_chap"].'<i class="fas fa-lock" style="margin:15px; color: #508e60;"></i></li>';
                                                }
                                            }else{
                                                echo'<li><a href="./readStory.php?story-name='.$idStory.'&&chap-number='.$row1["chap_number"].'">Chương:'.$row1["chap_number"].' :'. $row1["name_chap"].'</a></li>';
    
                                            }
                                        }
                                    }
                                    
                                }
                                echo '</ul>'; 
                        echo '</div>';
                        
                        echo' <div class="col-md-4">
                            <ul class="chap">';
                                
                        echo '</ul>'; 
                        echo'</div>';
                    echo'</div>';
    
                    echo'<nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a class="page-link"  aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        <li class="page-item"><a class="page-link" >1</a></li>
                                        <li class="page-item"><a class="page-link" >2</a></li>
                                        <li class="page-item"><a class="page-link" >3</a></li>
                                        <li class="page-item">
                                            <a class="page-link"  aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                        </nav>';   
                echo'</div>';
            }
            
            
        
        
    }


}
function addview($conn, $story){
    $sql4 = "SELECT views,point_story from views where id_story = '$nameStory'";
    $result4 = $conn->query($sql4);
    $row4 = $result4->fetch_assoc();

    $views = $row4['views']+1;
    $point = $row4['point_story']+1;

    $sql4 ="UPDATE views set views='$views',point_story='$point' where id_story='$nameStory'";
    $result4=$conn->query($sql4);
    phpAlert('ok');
    
}
function read_story($conn){
    
    $idChap = $_GET['chap-number'];
    $_SESSION['chap'] = $idChap;
    if(isset($_GET['story-name'])){
        $nameStory =$_GET['story-name'];
        $_SESSION['story_name'] = $nameStory;
    }
    else
    {
        $nameStory = $_SESSION['story_name'];
    }
    echo('
    
    <script type="text/javascript" language="PHP">
        var seconds = 30;
            let url = "./../php/addview.php?id='.$nameStory.'";
            // var data =  //echo json_encode($nameStory);;
            // console.log(url);
            setTimeout(() => {
                
                $.ajax({
                    url : url,
                    method: "get",
                    success: function(result){
                        console.log(result);
                    },
                    error: function(response){
                        console.log(response);
                    }
                });
            }, seconds*1000);
    </script>
    ');
    // phpAlert($nameStory);
    // $sql4 ="SELECT id from stories where id='$nameStory'";
    // $result4 =$conn->query($sql4);
    // $row4 = $result4->fetch_assoc();

    // $idStory = $row4['id'];
    // echo($nameStory);


    // $sql4 = "SELECT views,point_story from views where id_story = '$nameStory'";
    // $result4 = $conn->query($sql4);
    // $row4 = $result4->fetch_assoc();
    
    
    // $views = $row4['views']+1;
    // $point = $row4['point_story']+1;
   

    // $sql4 ="UPDATE views set views='$views',point_story='$point' where id_story='$nameStory'";
    // $result4=$conn->query($sql4);

    
    

    $sql = "SELECT * FROM chaps WHERE story_name='$nameStory'";
    $result = $conn->query($sql);
    if($result!=false){
        echo '<div style="text-align:center;">';
            $row = $result->fetch_assoc();
            
            $idName = $row['user'];
            $sql1 = "SELECT userName FROM users WHERE id ='$idName'";
            $result1=$conn->query($sql1);
            $row1= $result1->fetch_assoc();

            $sql3 = "SELECT id,story_name FROM stories WHERE id ='$nameStory'";
            $result3=$conn->query($sql3);
            $row3 = $result3->fetch_assoc();
            echo '<h4 class="truyen-title"><a href="./introStory.php?storyid='.$row3['id'].'">'.$row3['story_name'].' </a></h4>
                <p><b>Edit: </b>'.$row1['userName'].'</p>
                <img src="../image/image_homepage/icon2.png" style="display: block; margin: auto;">';
            $chapAdd = $idChap + 1 ;
            $chapSub = $idChap - 1;

            $idChap==$row['chap_number'];

            $sql2 = "SELECT max(chap_number) as max from chaps where story_name='$nameStory'";
            $result2= $conn->query($sql2);
            
            $row2= $result2->fetch_assoc();
            // $_SESSION['max'] = $row2['max'];
            
        echo'</div>';
    
            $sql3 = "SELECT content,name_chap,chap_number from chaps Where chap_number='$idChap'and story_name='$nameStory'";
            $result3 = $conn->query($sql3);
            $row3 = $result3->fetch_assoc();
            if($result3!=false){
                if($idChap==isset($row3['chap_number'])){
                    echo' <form action="./readStory.php" method="get">';
                        echo'<div class="chapter-nav" id="chapter-nav-top">';
                            echo'<div class="btn-group">';
                                if($idChap<=1){
                                    echo' <div class="btn btn-success btn-chapter-nav disabled" title="Không có chương trước"name="chap-number" >
                                            <span class="glyphicon glyphicon-chevron-left"></span>
                                                Chương trước
                                        </div>';
                                }else{
                                    echo' <button class="btn btn-success btn-chapter-nav " name="chap-number" value="'.$chapSub.'">
                                            <span class="glyphicon glyphicon-chevron-left"></span>
                                                Chương trước
                                        </button>';
                                }
                                echo'<a class="btn btn-success btn-chapter-nav chapter_jump">
                                        <span class="glyphicon glyphicon-list-alt"></span>
                                    </a>';   
                                if($idChap== $row2['max']){
                                   
                                    echo'<div class="btn btn-success btn-chapter-nav disabled" name="chap-number" >
                                                     Chương tiếp
                                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                        </div>';
                                }
                                else{
                                    if((isset($_SESSION['user-pay-story'])&&$_SESSION['user-pay-story']==1)||(isset($_SESSION['id'])&&$_SESSION['role']=="admin")){
                                        echo'<button class="btn btn-success btn-chapter-nav" name="chap-number" value="'.$chapAdd.'">
                                            Chương tiếp
                                            <span class="glyphicon glyphicon-chevron-right"></span>
                                        </button>';
                                    }
                                    elseif(!isset($_SESSION['id'])||$_SESSION['role']=="khóa"||($_SESSION['role']=='user'&&(!isset($_SESSION['user-pay-story'])))){
                                        if($idChap<3){
                                            echo'<button class="btn btn-success btn-chapter-nav" name="chap-number" value="'.$chapAdd.'">
                                                    Chương tiếp
                                                <span class="glyphicon glyphicon-chevron-right"></span>
                                            </button>';
                                        }else{
                                            echo'<div class="btn btn-success btn-chapter-nav disabled" name="chap-number" >
                                                     Chương tiếp
                                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                                </div>';
                                        }
                                    }
                                    
                                }
                            echo'</div>'; 
                        echo'</div>'; 
                    echo'</form>';
                    echo'<h5 class="title-chap">Chương '.$row3['chap_number'].':'.$row3['name_chap'].'</h5>';
                    $paras = explode("\n",$row3["content"]);
                    
                    foreach($paras as $para){
                        echo '<p style="text-indent:1rem">'.$para.'</p>';
                    }
                    echo' <form action="./readStory.php" method="get">';
                        echo' <img src="../image/image_homepage/icon2.png" style="display: block; margin: auto;">';
                        echo'<div class="chapter-nav" id="chapter-nav-top">';
                            echo'<div class="btn-group">';
                                if($idChap<=1){
                                            echo' <div class="btn btn-success btn-chapter-nav disabled" name="chap-number">
                                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                                    Chương trước
                                                </div>';
                                }else{
                                    echo' <button class="btn btn-success btn-chapter-nav" name="chap-number" value="'.$chapSub.'">
                                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                                    Chương trước
                                            </button>';
                                }
                                echo'<a class="btn btn-success btn-chapter-nav chapter_jump">
                                        <span class="glyphicon glyphicon-list-alt"></span>
                                    </a>';   
                                if($idChap==$row2['max']){
                                    echo'<div class="btn btn-success btn-chapter-nav disabled" name="chap-number">
                                                    Chương tiếp
                                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                        </div>';
                                }
                                else{
                                    if((isset($_SESSION['user-pay-story'])&&$_SESSION['user-pay-story']==1)||(isset($_SESSION['id'])&&$_SESSION['role']=="admin")){
                                        echo'<button class="btn btn-success btn-chapter-nav" name="chap-number" value="'.$chapAdd.'">
                                            Chương tiếp
                                            <span class="glyphicon glyphicon-chevron-right"></span>
                                        </button>';
                                    }
                                    elseif(!isset($_SESSION['id'])||$_SESSION['role']=="khóa"||$_SESSION['role']=='user'){
                                        if($idChap<3){
                                            echo'<button class="btn btn-success btn-chapter-nav" name="chap-number" value="'.$chapAdd.'">
                                                    Chương tiếp
                                                <span class="glyphicon glyphicon-chevron-right"></span>
                                            </button>';
                                        }else{
                                            echo'<div class="btn btn-success btn-chapter-nav disabled" name="chap-number" >
                                                     Chương tiếp
                                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                                </div>';
                                        }
                                    }
                                    
                                }
                                echo'</div>';
                            echo'</div>';     
                    echo'</form>';
                }
                else{
                    echo' <form action="./readStory.php" method="get">';
                        echo'<p style="text-align:center;">chap này không tồn tại</p>';
                        echo'<div class="chapter-nav" id="chapter-nav-top">';
                            echo'<div class="btn-group">';
                                if($idChap<=1){
                                    echo' <div class="btn btn-success btn-chapter-nav  " name="chap-number">
                                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                                    Chương trước
                                            </div>';
                                    
                                }else{
                                    echo' <button class="btn btn-success btn-chapter-nav " name="chap-number" value="'.$chapSub.'">
                                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                                    Chương trước
                                            </button>';

                                }
                                echo'<a class="btn btn-success btn-chapter-nav chapter_jump">
                                        <span class="glyphicon glyphicon-list-alt"></span>
                                    </a>';   
                                if($idChap==$_SESSION['max']){
                                    echo'<div class="btn btn-success btn-chapter-nav disabled "  name="chap-number" >
                                                    Chương tiếp
                                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                        </div>';
                                    // echo'  <div style= "border:1px solid white;border-radius:5px;float: right;width: 100px; height :28px ; background-color: #28a745; opacity: 0.5;" name="chap-number" >trang sau'."->".'</div>';
                                }
                                else{
                                    echo'<button class="btn btn-success btn-chapter-nav " name="chap-number"  value="'.$chapAdd.'">
                                                    Chương tiếp
                                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                        </button>';
                                    // echo'  <button style="border:1px solid white;background-color: #28a745; border-radius:5px; float:right;" name="chap-number" value="'.$chapAdd.'">trang sau'."->".'</button>';
                                }
                            echo'</div>';
                        echo'</div>';  
                    echo'</form>';
                }
            }   
    }
}
function comment($conn){
    if(!isset($_SESSION['id'])||$_SESSION['role']=="khóa"){
        
    }else{
        $id = $_SESSION['id'];
        $sql= "SELECT avatar from users where id =$id ";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        echo'
        <form class="comment" action="./../php/save-comment.php" method="get">
            <div class="d-flex flex-row add-comment-section mt-4 mb-4">';
                if($row['avatar']!=null){
                    echo' <img class="img-fluid img-responsive rounded-circle mr-2" src="./../image/avatar/'.$row['avatar'].'" width="38">';
                }else {
                    echo' <img class="img-fluid img-responsive rounded-circle mr-2" src="./../image/avt.png" width="38">';
                }
               
                echo'<input type="text" class="form-control mr-3" placeholder="Nội dung cần bình luận" name="content-comment">
                <button class="btn btn-primary" type="submit">Comment</button>
            </div>
        </form>';
    }
}
function read_comment($conn){
    $idChap = $_GET['chap-number'];
    $_SESSION['chap'] = $idChap;
    $nameStory =$_SESSION['story_name'];
    $id = $_SESSION['story_id'];

    $sql = "SELECT id_comment,story,user_comment,value from comment where story='$id' and status=1";
    $result = $conn->query($sql);
    if($result!=false){
        $count = 1;
        while($row = $result->fetch_assoc()){
            $idname = $row['user_comment'];

            $sql2 = "SELECT userName,avatar,role,id from users where id = '$idname'";
            $result2 = $conn->query($sql2);
            $row2 = $result2->fetch_assoc();

            if(isset($_SESSION['id'])&&$_SESSION['id']==$row['user_comment']&&(isset($_SESSION['role'])&&$_SESSION['role']!='khóa')){
                echo'<div class="bg-light p-2">';
                    echo'<div class="comment-content">';
                    if(isset($row2['avatar'])){
                        echo '<img class="img-responsive rounded-circle" src="./../image/avatar/'.$row2['avatar'].'" alt="" width="40px" height="40px">';
                    }else{
                        echo '<img class="img-responsive rounded-circle" src="./../image/user.png" alt="#" width="40px" height="40px">';

                    }
                    echo'<div class="cmt">
                            <b><a href="./profile.php?id='.$row['user_comment'].'">'.$row2['userName'].'</a></b>
                            <p>'.$row['value'].'</p>
                        </div>';
                    echo'</div>';
                     echo '<div><small id="delete">
                                <button class="like p-2  action-collapse" style="border:none; background:none; color:#6b9876;" data-toggle="collapse" aria-expanded="true" aria-controls="collapse-'.$count.'" href="#collapse-'.$count.'" type="submit" name="update-value" value="'.$row['id_comment'].'">Sửa</button>
                                <a href="./../php/delete-comment.php?id-comment='.$row['id_comment'].'">
                                    <button class="like p-2" style="border:none; background:none; color:#6b9876;">Xóa</button>
                                </a>
                            </small></div>';
                echo'</div>';
                echo'
                    <form action="./../php/update-comment.php" method="POST">';
                        echo '<div id="collapse-'.$count.'" class="bg-light p-2 collapse">';
                            echo'<input type="text" name="value" class="cmt" value="'.$row['value'].'" style="resize: none;">';
                            echo'<div class="mt-2 text-right">
                                <button class="btn btn-primary btn-sm shadow-none" type="submit" name="update-value" value="'.$row['id_comment'].'">Chỉnh sửa</button>
                            </div>';
                        echo'</div>
                    </form>
                    
                ';
                
            }
            elseif($row2['avatar']!=null){
                 echo'<div class="bg-light p-2">';
                    echo'<div class="comment-content">';
                        echo '<img class=" img-responsive rounded-circle" src="./../image/avatar/'.$row2['avatar'].'" alt="" width="40px" height="40px">';
                        echo'<div class="cmt">
                            <b><a href="./profile.php?id='.$row['user_comment'].'">'.$row2['userName'].'</a></b>
                            <p>'.$row['value'].'</p>';
                        echo'</div>
                    </div>';
            echo'</div>'; 
            }
            else{
                echo'<div class="bg-light p-2">';
                    echo'<div class="comment-content">';
                        echo '<img class="img-responsive rounded-circle" src="./../image/avt.png" alt="" width="40px" height="40px">';
                        echo'<div class="cmt">
                            <b><a href="./profile.php?id='.$row['user_comment'].'">'.$row2['userName'].'</a></b>
                            <p>'.$row['value'].'</p>
                        </div>
                    </div>';    
            echo'</div>'; 
            }
            if(isset($_SESSION['role'])&&$_SESSION['role']!='khóa'){
                if($row2['role']!='admin'&&$_SESSION['role']!='admin'){
                    echo'<button class="like p-2  action-collapse" style="border:none; background:none; color:#6b9876;" data-toggle="collapse" aria-expanded="true" aria-controls="collapse-'.$count.'" href="#collapse-'.$count.'" type="submit" name="update-value" value="'.$row['id_comment'].'">report</button>';
                    echo'<form action="./../php/report-comment.php" method="POST">';
                    echo '<div id="collapse-'.$count.'" class="bg-light p-2 collapse">';
                            //lấy nội dung report comment
                            $sqlGetReportComment = "SELECT * from errorcomment";
                            $resultReportComment = $conn->query($sqlGetReportComment);
                            while ($rowReportComment= $resultReportComment->fetch_assoc()) {
                                //echo($rowReportComment['content']);
                                echo('<input type="radio" style="margin:10px;" value="'.$rowReportComment['id'].'" name="errorComment">'.$rowReportComment['content'].'<br>');
                            }
                            echo'<div class="mt-2 text-right">
                                <button class="btn btn-primary btn-sm shadow-none" type="submit" name="reportCommentId" value="'.$row['id_comment'].'">report</button>
                            </div>';
                        echo'</div>
                    </form>';
                }
                elseif($_SESSION['role']=='admin'){
                    if($row2['role']!='admin'){
                        echo'<a href="./../php/delete-comment.php?id-comment='.$row['id_comment'].'">
                                <button class="like p-2" style="border:none; background:none; color:#6b9876;">Xóa</button>
                            </a>';
                    }
                    
                }
            }
            echo'<hr>';
            $count++;
        }
    }
}
function comment_read($conn){
    $idChap = $_GET['chap-number'];
    $_SESSION['chap'] = $idChap;
    $nameStory =$_SESSION['story_name'];
    $id = $_SESSION['story_id'];
    $sql = "SELECT id_comment,story,user_comment,value from comment where story='$id' and status=1";
    $result = $conn->query($sql);
    if($result!=false){
        $count = 1;
        while($row = $result->fetch_assoc()){
            $idname = $row['user_comment'];

            $sql2 = "SELECT userName,avatar,role,id from users where id = '$idname'";
            $result2 = $conn->query($sql2);
            $row2 = $result2->fetch_assoc();
            
            if($row2['avatar']!=null){
                echo'<div class="bg-light p-2">';
                   echo'<div class="comment-content">';
                       echo '<img class=" img-responsive rounded-circle" src="./../image/avatar/'.$row2['avatar'].'" alt="" width="40px" height="40px">';
                       echo'<div class="cmt">
                           <b><a href="./profile.php?id='.$row['user_comment'].'">'.$row2['userName'].'</a></b>
                           <p>'.$row['value'].'</p>';
                       echo'</div>
                   </div>';
                echo'</div>'; 
           }
           else{
               echo'<div class="bg-light p-2">';
                   echo'<div class="comment-content">';
                       echo '<img class="img-responsive rounded-circle" src="./../image/avt.png" alt="" width="40px" height="40px">';
                       echo'<div class="cmt">
                           <b><a href="./profile.php?id='.$row['user_comment'].'">'.$row2['userName'].'</a></b>
                           <p>'.$row['value'].'</p>
                       </div>
                   </div>';    
           echo'</div>'; 
           }
           if(isset($_SESSION['role'])&&$_SESSION['role']=='admin'){
                if($row2['role']!='admin'){
                    echo'<a href="./../php/delete-comment.php?id-comment='.$row['id_comment'].'">
                                <button class="like p-2" style="border:none; background:none; color:#6b9876;">Xóa</button>
                            </a>';
                }else {
                    echo '<div>
                        <small id="delete">
                            <button class="like p-2  action-collapse" style="border:none; background:none; color:#6b9876;" data-toggle="collapse" aria-expanded="true" aria-controls="collapse-'.$count.'" href="#collapse-'.$count.'" type="submit" name="update-value" value="'.$row['id_comment'].'">Sửa</button>
                            <a href="./../php/delete-comment.php?id-comment='.$row['id_comment'].'">
                                <button class="like p-2" style="border:none; background:none; color:#6b9876;">Xóa</button>
                            </a>
                        </small>
                    </div>';
                    echo'
                    <form action="./../php/update-comment.php" method="POST">';
                        echo '<div id="collapse-'.$count.'" class="bg-light p-2 collapse">';
                            echo'<input type="text" name="value" class="cmt" value="'.$row['value'].'" style="resize: none;">';
                            echo'<div class="mt-2 text-right">
                                <button class="btn btn-primary btn-sm shadow-none" type="submit" name="update-value" value="'.$row['id_comment'].'">Chỉnh sửa</button>
                            </div>';
                        echo'</div>
                    </form>
                    
                ';
                }
            }elseif(isset($_SESSION['role'])&&$_SESSION['role']=='user'){
                if($row2['role']!='admin'){
                    if($_SESSION['id']==$row['user_comment']){
                        echo '<div>
                        <small id="delete">
                            <button class="like p-2  action-collapse" style="border:none; background:none; color:#6b9876;" data-toggle="collapse" aria-expanded="true" aria-controls="collapse-'.$count.'" href="#collapse-'.$count.'" type="submit" name="update-value" value="'.$row['id_comment'].'">Sửa</button>
                            <a href="./../php/delete-comment.php?id-comment='.$row['id_comment'].'">
                                <button class="like p-2" style="border:none; background:none; color:#6b9876;">Xóa</button>
                            </a>
                        </small>
                    </div>';
                    echo'
                        <form action="./../php/update-comment.php" method="POST">';
                            echo '<div id="collapse-'.$count.'" class="bg-light p-2 collapse">';
                                echo'<input type="text" name="value" class="cmt" value="'.$row['value'].'" style="resize: none;">';
                                echo'<div class="mt-2 text-right">
                                    <button class="btn btn-primary btn-sm shadow-none" type="submit" name="update-value" value="'.$row['id_comment'].'">Chỉnh sửa</button>
                                </div>';
                            echo'</div>
                        </form>
                        
                    ';
                    }else {
                        echo'<button class="like p-2  action-collapse" style="border:none; background:none; color:#6b9876;" data-toggle="collapse" aria-expanded="true" aria-controls="collapse-'.$count.'" href="#collapse-'.$count.'" type="submit" name="update-value" value="'.$row['id_comment'].'">report</button>';
                        echo'<form action="./../php/report-comment.php" method="POST">';
                        echo '<div id="collapse-'.$count.'" class="bg-light p-2 collapse">';
                                //lấy nội dung report comment
                                $sqlGetReportComment = "SELECT * from errorcomment";
                                $resultReportComment = $conn->query($sqlGetReportComment);
                                while ($rowReportComment= $resultReportComment->fetch_assoc()) {
                                    //echo($rowReportComment['content']);
                                    echo('<input type="radio" style="margin:10px;" value="'.$rowReportComment['id'].'" name="errorComment">'.$rowReportComment['content'].'<br>');
                                }
                                echo'<div class="mt-2 text-right">
                                    <button class="btn btn-primary btn-sm shadow-none" type="submit" name="reportCommentId" value="'.$row['id_comment'].'">report</button>
                                </div>';
                            echo'</div>
                        </form>';
                    }
                    
                }
                    
               
            }
            
            echo('<hr>');
            $count++;
        }
        
    }

}
function status_comment(){
    if(isset($_SESSION['comment'])&&$_SESSION['comment']==1){
        //phpAlert('Bình luận thành công!');
        unset($_SESSION['comment']);
        header("Location: ./readStory.php?chap-number=".$_SESSION['chap']."");
    }
    if(isset($_SESSION['delete-comment'])&&$_SESSION['delete-comment']==1){
        //phpAlert('Xóa bình luận thành công!');
        unset($_SESSION['delete-comment']);
        header("Location: ./readStory.php?chap-number=".$_SESSION['chap']."");
    }
    
}
function select_author($conn){
    $id = $_SESSION['id'];
    // phpAlert($id);
    $sql = "SELECT author_name,id from author where userName ='$id'";
    $result = $conn->query($sql);
    echo'<select class="form-control selectpicker" name="part" data-live-search="true" required onChange="window.location.href=this.value">
    <option>--- Chọn tác giả ---</option>
    ';
    while($row = $result->fetch_assoc()){
        $nameAuthor=$row["author_name"];
        $_SESSION['author'] = $row['id'];
        echo'<option value="../display-add-story.php?author='.$row['author_name'].'">'.$row["author_name"].'</option>';
    }
     echo'</select>';
}
function select_story($conn){
    $id = $_SESSION['id'];
    $sql = "SELECT id,story_name,author_name From stories where user != '$id'";
    $result = $conn->query($sql);
    echo'<select class="form-control selectpicker" name="part" data-live-search="true" required onChange="window.location.href=this.value">
    <option>--- Chọn truyện của user---</option>';
    while($row = $result->fetch_assoc()){
        $_SESSION['author']=$row['author_name'];
        $_SESSION['story']=$row['story_name'];
        $_SESSION['story-id'] = $row['id'];
        echo'<option value="../displayupdate-story.php?storyid='.$row['id'].'" data-tokens="'.$row["story_name"].'">'.$row["story_name"].'</option>';
    }
    echo'</select>';
}
function select_story_user($conn){
    $id = $_SESSION['id'];
    $sql = "SELECT id,story_name,author_name From stories where user = '$id' and status!=5 ";
    $result = $conn->query($sql);
    echo'<select class="form-control selectpicker" name="part" data-live-search="true" required onChange="window.location.href=this.value">
    <option>--- Chọn truyện của bạn ---</option>
    ';
    while($row = $result->fetch_assoc()){
        $_SESSION['author']=$row['author_name'];
        $_SESSION['story']=$row['story_name'];
        $_SESSION['story-id'] = $row['id'];
            echo'<option value="../displayupdate-story.php?storyid='.$row['id'].'" data-tokens="'.$row["story_name"].'">'.$row["story_name"].'</option>';
    }
    echo'</select>';

}
function select_story_user_clock($conn){
    $id = $_SESSION['id'];
    $sql = "SELECT id,story_name,author_name From stories where user = '$id' and status=5 ";
    $result = $conn->query($sql);
    echo'<select class="form-control selectpicker" name="part" data-live-search="true" required onChange="window.location.href=this.value">
    <option>--- Chọn truyện của bạn bị admin khóa---</option>
    ';
    while($row = $result->fetch_assoc()){
        $_SESSION['author']=$row['author_name'];
        $_SESSION['story']=$row['story_name'];
        $_SESSION['story-id'] = $row['id'];
            echo'<option value="../displayupdate-story.php?storyid='.$row['id'].'" data-tokens="'.$row["story_name"].'">'.$row["story_name"].'</option>';
    }
    echo'</select>';

}
function update_chap($conn){
    $idChap = $_GET['chap-number'];
    $nameStory =$_SESSION['storyid'];
    $sql = "SELECT * FROM chaps WHERE story_name='$nameStory'and chap_number='$idChap'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $_SESSION['idchap'] = $row['id'];
    echo'<h4 class="title">Chỉnh Sửa </h4>
        <form action="../php/update-chap.php" method="POST">
           
            <div class="title-chap">
                <label>Tiêu đề chap</label>
                <input  type="text" name="nameChap" placeholder="Tiêu đề chap" value="'.$row['name_chap'].'">
            </div>
            <div class="content-chap">
                <label>Nội dung</label>
                <textarea name="content" id="content" rows="10">'.$row['content'].'</textarea>
                    <script>CKEDITOR.replace("content");</script>        
            </div>
            <input class="add-chap" type="submit" value="Sửa chap">
        </form>
    ';
}
function select_update_user($conn){
    echo'<table style="width:100%;">';
    echo'<th style="color:#508e60;font-size: 20px;padding-bottom: 5px;">Tên tài khoản</th>';
    echo'<th style="color:#508e60;font-size: 20px;padding-bottom: 5px;">Mật khẩu</th>';
    echo'<th style="color:#508e60;font-size: 20px;padding-bottom: 5px;">Email</th>';
    echo'<th style="color:#508e60;font-size: 20px;padding-bottom: 5px;">Số điện thoại</th>';
    echo'<th style="color:#508e60;font-size: 20px;padding-bottom: 5px;">Vai trò</th>';
    echo'<th style="color:#508e60;font-size: 20px;padding-bottom: 5px;">Số $</th>';
    echo'<th style="color:#508e60;font-size: 20px;padding-bottom: 5px;">Điểm<br>uy tín</th>';
    echo'<th style="color:#508e60;font-size: 20px;padding-bottom: 5px;"></th>';
    echo'<th style="color:#508e60;font-size: 20px;padding-bottom: 5px;">reset<br>pasword</th>';

    if(isset($_POST['userSearch'])&&$_POST['userSearch']!=''){
        // echo();
        $searchUser= $_POST['userSearch'];
        $sql = "SELECT * from users where userName like'%$searchUser%' and role!='admin' ";
        $result = $conn->query($sql);
        
        while($row = $result->fetch_assoc()){
            $id= $row['id'];
            //đếm comment bị báo cáo đúng
            $sqlCountCmt = "SELECT id_comment from comment where user_comment='$id' and status='0'  ";
            $result1 = $conn->query($sqlCountCmt);
            $countCmtReport  = 0;
            while($row1 = $result1->fetch_assoc()){
                $countCmtReport++;
            }
            //đếm truyện bị admin khóa
            $sqlCointStoryAdminKhoa = "SELECT id from stories where user='$id' and status='5'";
            $result2 = $conn->query($sqlCointStoryAdminKhoa);
            while($row2 = $result2->fetch_assoc()){
                $countCmtReport++;
            }
            
            echo' <form action="../../php/update-user.php" method="POST">';
            echo'<tr>';
            echo'<td style="color:#508e60;">'.$row['userName'].'</td>';
            // echo'<td><input type="text" value="'.$row['userName'].'"></td>';
            echo'<td><input type="text" value="'.$row['password'].'" name="password"></td>';
            echo'<td><input type="text" value="'.$row['email'].'" name="email"></td>';
            echo'<td><input style="width:120px; type="text" value="0'.$row['phoneNumber'].'" name="phoneNumber"></td>';
            echo'<td><select name="role">';
                if($row['role']=='user'){
                    echo'
                    <option selected="selected">user</option>
                    <option value="khóa">khóa</option>';
                }elseif($row['role']=='khóa') {
                    echo'
                    <option selected="selected">khóa</option>
                    <option value="user">user</option>';
                }
            echo'</select></td>';
            echo'<td><input style="width:80px; type="text" value="'.$row['point'].'" name="point"></td>';
            if($countCmtReport>0){
                $uytin = 10 - $countCmtReport;
                echo'<td>'.$uytin.'</td>';
            }else {
                echo'<td>10</td>';
            }
            echo'<td><button type="submit" name="id" value="'.$row['id'].'" style="border: none;padding: 3px 8px;background: #508e60;color: #fff;border-radius: 5px;">sửa</button></td>';
            echo'<td><a href="../../php/reset-password.php?id='.$row['id'].'" style="border: none;padding: 3px 8px;background: #508e60;color: #fff;border-radius: 5px;"><i class="fas fa-undo"></i></a></td>';
            echo'</tr>';
            echo'</form>';
            // echo($countStoryReport);
        }
    }else {
        $sql = "SELECT * from users where role!='admin'";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
            $id= $row['id'];
            $sqlCountCmt = "SELECT id_comment from comment where user_comment='$id' and status='0' ";
            $result1 = $conn->query($sqlCountCmt);
            $countCmtReport  = 0;
            while($row1 = $result1->fetch_assoc()){
                $countCmtReport++;
            }
            $sqlCointStoryAdminKhoa = "SELECT id from stories where user='$id' and status='5'";
            $result2 = $conn->query($sqlCointStoryAdminKhoa);
            while($row2 = $result2->fetch_assoc()){
                $countCmtReport++;
            }
            echo' <form action="../../php/update-user.php" method="POST">';
            echo'<tr>';
            echo'<td style="color:#508e60;">'.$row['userName'].'</td>';
            // echo'<td style="width: 200px; color:#508e60;" >'.$row['password'].'</td>';
            echo'<td><input type="text" value="'.$row['password'].'" name="password"></td>';
            echo'<td><input type="text" value="'.$row['email'].'" name="email"></td>';
            echo'<td><input style="width:120px;" type="text" value="0'.$row['phoneNumber'].'" name="phoneNumber"></td>';
            echo'<td><select name="role">';
                
            if($row['role']=='user'){
                echo'
                <option selected="selected">user</option>
                <option value="khóa">khóa</option>';
            }elseif($row['role']=='khóa') {
                echo'
                <option selected="selected">khóa</option>
                <option value="user">user</option>';
            } 
            echo'</select></td>';
            echo'<td><input style="width:100px;" type="text" value="'.$row['point'].'" name="point"></td>';
            if($countCmtReport>0){
                $uytin = 10 - $countCmtReport;
                echo'<td>'.$uytin.'</td>';
            }else {
                echo'<td>10</td>';
            }
            
            echo'<td><button type="submit" name="id" value="'.$row['id'].'" style="border: none;padding: 3px 8px;background: #508e60;color: #fff;border-radius: 5px;">sửa</button></td>';
            echo'<td><a href="../../php/reset-password.php?id='.$row['id'].'" style="border: none;padding: 3px 8px;background: #508e60;color: #fff;border-radius: 5px;"><i class="fas fa-undo"></i></a></td>';
            echo'</tr>';
            echo'</form>';
        }
    }
   
    echo"</table>";
}
function seach_category($conn){
    $category = $_GET['category'];
     
    $sql = "SELECT id,category,story_name,images,author_name From stories";
    $result = $conn->query($sql);
    
    echo'<h4>Thể loại: ';
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
    echo'</h4>';
    echo'<div class="block-content">
            <ul class="list-group ">';               
                if($result!=false){
                    while($row = $result->fetch_assoc()){
                        $cat = explode(";",$row["category"]);
                        //lấy tên tác giả
                        $author = $row["author_name"];
                        $sqlAuthor ="SELECT author_name from author where id='$author'";
                        $resultAuthor =$conn->query($sqlAuthor);
                        $authorName= $resultAuthor->fetch_assoc();
                        foreach($cat as $catr){
                            if($catr == $category){
                                echo '<li class="list-group-item list-group-item-table">';
                                    echo'<div class="content1">
                                            <a class="thumb" href="./introStory.php?storyid='.$row['id'].'"  title=" '.$row['story_name'].' "> 
                                                <img class="img-responsive" src="./../image/images_upload/'.$row['images'].'" width="30px" height="40px">
                                            </a>';
                                            echo'<div class="info">
                                                <h2 class="title"> <a href="./introStory.php?storyid='.$row['id'].'"  title="'.$row['story_name'].'">'.$row['story_name'].'</a> </h2>
                                                <div class="author">'.$authorName['author_name'].'</a></div>
                                            </div>
                                        </div>
                                    </li>';

                                    
                            break;
                            }
                        }
                    }
                }
            echo'</ul>
    </div>';
}
function timkiem($conn){
    $content = $_GET['content'];
    if($content==""){
        echo('<h3 style="color:red;">Bạn chưa nhập gì cả hãy tìm kiếm với từ khóa khác<h3>');
        return;
    }
    echo '<h4>Kết quả tìm kiếm: '.$content.'</h4>';
    $tukhoa = explode(" ",$content);
    foreach($tukhoa as $tu){
    //search author
        $listSearch = array();
        $sqlSearchAuthor ="SELECT * from author where author_name like '%$tu%'";
        $resultAuthor = $conn->query($sqlSearchAuthor);
        while($author=$resultAuthor->fetch_assoc()){
            $id_author = $author['id'];
            $sqlStory = "SELECT story_name,id,images from stories where author_name='$id_author'";
            $resultStory = $conn->query($sqlStory);
            while($story=$resultStory->fetch_assoc()){
                $temp=0;
                foreach($listSearch as $authorSearch){
                    if($story['id']==$authorSearch){
                        $temp=1;
                    }
                    // echo($authorSearch.'<br>');
                }
                if($temp!=1){
                    array_push($listSearch,$story['id']);
                }
            }
        }
    //search story 
        $sqlSearchStory ="SELECT * from stories where story_name like '%$tu%'";
        $resultStory = $conn->query($sqlSearchStory);
        while($story=$resultStory->fetch_assoc()){
            $temp=0;
            foreach($listSearch as $storySearch){
                if($story['id']==$storySearch){
                    $temp=1;
                }
                // echo($authorSearch.'<br>');
            }
            if($temp!=1){
                array_push($listSearch,$story['id']);
            }
        }
    }
    foreach($listSearch as $Search){
        $sqlStory="SELECT * from stories where id='$Search'";
        $resultAuthor = $conn->query($sqlStory);
        $row=$resultAuthor->fetch_assoc();
        //lấy tên tác giả
        $author = $row["author_name"];
        $sqlAuthor ="SELECT author_name from author where id='$author'";
        $resultAuthor =$conn->query($sqlAuthor);
        $authorName= $resultAuthor->fetch_assoc();
        echo '<li class="list-group-item list-group-item-table">';
        echo'<div class="content1">
                <a class="thumb" href="./introStory.php?storyid='.$row['id'].'"  title=" '.$row['story_name'].' "> 
                    <img class="img-responsive" src="./../image/images_upload/'.$row['images'].'" width="30px" height="40px">
                </a>';
                echo'<div class="info">
                    <h2 class="title"> <a href="./introStory.php?storyid='.$row['id'].'"  title="'.$row['story_name'].'">'.$row['story_name'].'</a> </h2>
                    <div class="author">'.$authorName['author_name'].'</a></div>
                </div>
            </div>
        </li>';
        // echo($authorSearch.'<br>');
    }
}
function new_update($conn){
    $page = ($_GET['page']-1)*15;
    //$pages = ($page -1)*15;
    $sql= "SELECT * from stories WHERE status=1 or status=3 or status=4 or status=0 ORDER BY update_at DESC limit $page,15";
    $result = $conn->query($sql);
                 
    while($row= $result->fetch_assoc()){
        $story_id = $row['id'];
        $sql1 = "SELECT max(chap_number) as max from chaps where story_name='$story_id' ";
        $result1 = $conn->query($sql1);
        $row1= $result1->fetch_assoc();
        //lấy tên tác giả
        $author = $row["author_name"];
        $sqlAuthor ="SELECT author_name from author where id='$author'";
        $resultAuthor =$conn->query($sqlAuthor);
        $authorName= $resultAuthor->fetch_assoc();
        echo '<li class="list-group-item list-group-item-table">';
                echo'<div class="content1">
                    <a class="thumb" href="./introStory.php?storyid='.$row['id'].'"  title=" '.$row['story_name'].' "> 
                        <img class="img-responsive" src="./../image/images_upload/'.$row['images'].'" alt="" width="30px" height="40px">
                    </a>';
                    echo'<div class="info">
                        <h2 class="title"> <a href="./introStory.php?storyid='.$row['id'].'"  title="'.$row['story_name'].'">'.$row['story_name'].'</a> </h2>
                        <div class="author">'.$authorName['author_name'].'</a></div>
                        </div>
                        <a href="./readStory.php?story-name='.$row['story_name'].'&&chap-number='.$row1['max'].'"><div>Chap: '.$row1['max'].'</div></a>
                </div>
            </li>';
    }
    $sql= "SELECT count(*) as count from stories WHERE status=1 or status=3 or status=4 or status=0";
    $result = $conn->query($sql);
    $row=$result->fetch_assoc();
    $count =1;
    $page = $row['count'];
    echo'
    <div style="text-align: center; margin:auto; padding-top:30px">';
    while($page>0){
        echo'<a style="color: #fff;background-color:#5a9668;float:  left; width: 30px;height: 30px; border: 2px solid white;" href="./story-new-update.php?value=truyen-moi&&page='.$count.'">'.$count.'</a>';
        $page = $page-15;
        $count++;
    }
    echo'</div>';
    
}
function truyenHoanThanh($conn){
    $sql= "SELECT * from stories WHERE status = 4";
    $result = $conn->query($sql);
                 
    while($row= $result->fetch_assoc()){
        $nameStory = $row['story_name'];
        $sql1 = "SELECT max(chap_number) as max from chaps where story_name='$nameStory' ";
        $result1 = $conn->query($sql1);
        $row1= $result1->fetch_assoc();
        //lấy tên tác giả
        $author = $row["author_name"];
        $sqlAuthor ="SELECT author_name from author where id='$author'";
        $resultAuthor =$conn->query($sqlAuthor);
        $authorName= $resultAuthor->fetch_assoc();

        echo '<li class="list-group-item list-group-item-table">';
                echo'<div class="content1">
                    <a class="thumb" href="./introStory.php?storyid='.$row['id'].'"  title=" '.$row['story_name'].' "> 
                        <img class="img-responsive" src="./../image/images_upload/'.$row['images'].'" alt="" width="30px" height="40px">
                    </a>';
                    echo'<div class="info">
                        <h2 class="title"> <a href="./introStory.php?storyid='.$row['id'].'"  title="'.$row['story_name'].'">'.$row['story_name'].'</a> </h2>
                        <div class="author">'.$authorName['author_name'].'</a></div>
                        </div>
                        <p><b>Hoàn thành</b></p>
                </div>
            </li>';
    }
   
}
function truyenDeCu($conn){
    $sql= "SELECT * from stories WHERE status = 1";
    $result = $conn->query($sql);
                 
    while($row= $result->fetch_assoc()){
        $story_id = $row['id'];
        $sql1 = "SELECT max(chap_number) as max from chaps where story_name='$story_id' ";
        $result1 = $conn->query($sql1);
        $row1= $result1->fetch_assoc();
        //lấy tên tác giả
        $author = $row["author_name"];
        $sqlAuthor ="SELECT author_name from author where id='$author'";
        $resultAuthor =$conn->query($sqlAuthor);
        $authorName= $resultAuthor->fetch_assoc();
        echo '<li class="list-group-item list-group-item-table">';
                echo'<div class="content1">
                    <a class="thumb" href="./introStory.php?storyid='.$row['id'].'"  title=" '.$row['story_name'].' "> 
                        <img class="img-responsive" src="./../image/images_upload/'.$row['images'].'" alt="" width="30px" height="40px">
                    </a>';
                    echo'<div class="info">
                        <h2 class="title"> <a href="./introStory.php?storyid='.$row['id'].'"  title="'.$row['story_name'].'">'.$row['story_name'].'</a> </h2>
                        <div class="author">'.$authorName['author_name'].'</a></div>
                        </div>
                        <a href="./readStory.php?story-name='.$row['id'].'&&chap-number='.$row1['max'].'"><div>Chap: '.$row1['max'].'</div></a>

                </div>
            </li>';
    }
   
}
function add_author(){
    echo'<h4 style="color: #6b9876;">Chọn tác giả thêm truyện</h4>';
    echo'<form action="../../php/add-author.php" method="POST"style="margin-bottom: 15px;">
            <label style="color: #6b9876;">Thêm tác giả mới</label>
            <input type="text" name="authorName" placeholder="Nhập tên tác giả" style="margin-left: 5px;padding: 3px;">
            <input type="submit" value="Thêm tác giả" style="border: none;padding: 5px;background: #6b9876;color: #fff;border-radius: 5px;margin-left: 15px">
        </form>';
}
function update_story($conn){
    $idStory = $_GET["storyid"];
    $_SESSION['storyId'] = $idStory;
    $sql = "SELECT * FROM stories Where id='$idStory'";
    $result= $conn->query($sql);
        if($result!=false){
            while($row = $result->fetch_assoc()){
                $user = $row['user'];
                $sqlUser = "SELECT userName from users where id='$user'";
                $resultUser = $conn->query($sqlUser);
                $userWrite = $resultUser->fetch_assoc();
                $user = $userWrite['userName'];
                
                //lấy tên tác giả
                $author = $row["author_name"];
                $sqlAuthor ="SELECT author_name from author where id='$author'";
                $resultAuthor =$conn->query($sqlAuthor);
                $authorName= $resultAuthor->fetch_assoc();
                if($_SESSION['role']=='admin'){
                    if($row['user']==$_SESSION['id']){
                        
                        echo '<h4 class="items">Chỉnh Sửa Truyện</h4>';
                        echo'<div class="block-1">';
                            echo'<div class="row">';
                                echo '<div class="col-md-4">';
                                    $_SESSION['story_id']=$row['id'];
                                    echo'<h5 class="title">'.$row['story_name'].'</h5>';
                                    echo '<div class="story">
                                    ';
                                        echo '
                                                <form action="./../php/update-image-story.php" method="post" enctype="multipart/form-data">
                                                    <img src="../image/images_upload/'.$row["images"].'" class="img-responsive" width="85%">
                                                    <input type="file"  accept="image/*" name="imageStory" multiple="true" >
                                                    <br><br><button class="btn btn-success" type="submit">Đổi ảnh truyện</button>
                                                </form>
                                            ';
                                    echo'
                                    </div>  
                                    <div class="info">';    
                                        echo '<p><b>Tác giả:</b> '.$authorName["author_name"].'</p>';
                                        echo '<p><b>Thể loại:</b>';
                                            
                                        $paras = explode(";",$row["category"]);
                                        foreach($paras as $para){
                                            $sql1 = "SELECT * FROM categories WHERE id ='$para'";
                                            $result1 = $conn->query($sql1);
                                            if($result1!=false){
                                                while($row1 = $result1->fetch_assoc()){
                                                    echo $row1['categories_name'].';';
                                                }
                                            }
                                        }
                                        echo('<p><b>Người đăng:</b> '.$user.'</p>');
                                    echo'</div>';     
                                echo'</div>';         
                                //show list-chap, add chap
                                echo '<div class="col-md-8">';
                                echo'<h5>Thay đổi thông tin truyện</h5>
                                    <form action="./../php/update-content-story.php" method="post">
                                        <textarea name="content" id="content" style="width: 100%;" rows="10" placeholder="Nội dung của chap">'.$row['content'].'</textarea>
                                        <script>CKEDITOR.replace("content");</script>
                                        <h5>Giá</h5>
                                        <textarea name="price" id="price" style="width: 100%;" placeholder="Giá của chap">'.$row['price'].'</textarea>
                                        
                                        <input class="change" type="submit" value="Đổi thông tin">
                                        
                                    </form>
                                ';
                                    echo'<div class="status">';    
                                        $_SESSION['storyid'] = $idStory;
                                        
                                        $sql1 = "SELECT status FROM stories WHERE id='$idStory'";
                                        $result1 = $conn->query($sql1);
                                        $row1 = $result1->fetch_assoc();
                                        $statusStory = $row1['status'];
                                        echo'<b>Trạng thái truyện: </b>';
                                        if($row1['status']==2){
                                            echo'Khóa';
                                        }elseif($row1['status']==1){
                                                echo'Đề cử';
                                        }elseif($row1['status']==0){
                                                echo'Bình thường';
                                        }elseif($row1['status']==4){
                                            echo'Hoàn thành';
                                        }elseif($row1['status']==6) {
                                            echo'Mới viết';
                                        }
                                        echo'<ul class="status-content">';
                                            echo'<li><a href="./../php/set-lock-up-story.php?storyid='.$idStory.'&&status=2" name="status"value="2"type="submit">Khóa truyện</a></li>
                                                 <li><a href="./../php/set-lock-up-story.php?storyid='.$idStory.'&&status=1" name="status"value="1"type="submit">Đề cử truyện</a></li>
                                                 <li><a href="./../php/set-lock-up-story.php?storyid='.$idStory.'&&status=0" name="status"value="0"type="submit">Mở khóa truyện</a></li>
                                                 <li><a href="./../php/set-lock-up-story.php?storyid='.$idStory.'&&status=4" name="status"value="2"type="submit">Hoàn thành</a></li>
                                            </ul>';
                                    echo'</div>';       
                                echo'</div>'; 
                            echo'</div>';
                        echo'</div>';               
                        $nameStory = $row['story_name'];
                        $_SESSION['author'] = $row['author_name'];
                        $_SESSION['story']= $row['story_name'];
                        $sql1 = "SELECT * FROM chaps WHERE story_name='$idStory'";
                        $result1 = $conn->query($sql1);
                        //danh sách chap
                        echo'<div class="block-2">';
                            echo' <h4 class="items">Danh sách chương</h4>';
                                echo '<div class=row>';
                                    echo'<div class="col-md-8">
                                        <ul class="chap">';
                                            if($result1!=false){
                                                while($row1=$result1->fetch_assoc()){ 
                                                    $_SESSION['storyName']=$nameStory;
                                                    echo'<li>Chương '.$row1["chap_number"].' :'. $row1["name_chap"].'</a>
                                                    <div style="float:right; width:100px;"><a href="./display-update-chap.php?chap-number='.$row1['chap_number'].'">Sửa</a></div>
                                                    <div style="float:right; width:100px;"><a href="./../php/delete-chap.php?chap-id='.$row1['id'].'">Xóa</a>
                                                    </li>';
                                                }
                                            }
                                        echo '</ul>'; 
                                    echo '</div>';                                
                                echo'</div>';
                            echo'</div>';
                            if($statusStory!='4'){
                                echo'<div class="add-chap">';
                                echo'<h5><a href="./display-add-chap.php">Thêm chap mới</a></h5>';
                                echo'</div>';
                            }else {
                                
                            }
                        echo'</div>';
                        
                    }else {
                        echo '<h4 class="items">Admin thay đổi trạng thái truyện </h4>';
                        echo'<div class="block-1">';
                            echo'<div class="row">';
                                echo '<div class="col-md-4">';
                                    $_SESSION['story_id']=$row['id'];
                                    echo'<h5 class="title">'.$row['story_name'].'</h5>';
                                    echo '<div class="story">
                                            <img src="../image/images_upload/'.$row["images"].'" class="img-responsive" width="85%">
                                        </div>';
                                        
                                    echo'<div class="info">';    
                                        echo '<p><b>Tác giả:</b> '.$authorName["author_name"].'</p>';
                                        echo '<p><b>Thể loại:</b>';
                                            
                                        $paras = explode(";",$row["category"]);
                                        foreach($paras as $para){
                                            $sql1 = "SELECT * FROM categories WHERE id ='$para'";
                                            $result1 = $conn->query($sql1);
                                            if($result1!=false){
                                                while($row1 = $result1->fetch_assoc()){
                                                    echo $row1['categories_name'].';';
                                                }
                                            }
                                        }
                                        echo('<p><b>Người đăng:</b> '.$user.'</p>');
                                    echo'</div>';     
                                echo'</div>';         
                                //show list-chap, add chap
                                echo '<div class="col-md-8">';
                                    echo'<h5>Thay đổi thông tin truyện</h5>
                                            <div name="content" id="content" style="width: 100%;" rows="10" placeholder="Nội dung của chap">'.$row['content'].'</div>
                                        ';
                                    echo'<div class="status">';    
                                        $_SESSION['storyid'] = $idStory;
                                        
                                        $sql1 = "SELECT status FROM stories WHERE id='$idStory'";
                                        $result1 = $conn->query($sql1);
                                        $row1 = $result1->fetch_assoc();
                                        echo'<b>Trạng thái truyện: </b>';
                                        if($row1['status']==2){
                                            echo'User Khóa';
                                        }elseif($row1['status']==1){
                                                echo'Đề cử';
                                        }elseif($row1['status']==0){
                                                echo'Bình thường';
                                        }elseif($row1['status']==4){
                                            echo'Hoàn thành';
                                        }elseif($row1['status']==5){
                                            echo'Admin khóa';
                                        }elseif($row1['status']==6) {
                                            echo'Mới viết';
                                        }
                                        echo'<ul class="status-content">';
                                            echo'   
                                                <li><a href="./../php/set-lock-up-story.php?storyid='.$idStory.'&&status=1" name="status"type="submit">Đề cử truyện</a></li>
                                                <li><a href="./../php/set-lock-up-story.php?storyid='.$idStory.'&&status=0" name="status"type="submit">Bình thường</a></li>
                                                <li><a href="./../php/set-lock-up-story.php?storyid='.$idStory.'&&status=5" name="status"type="submit">Admin khóa</a></li>
                                            </ul>';
                                    echo'</div>';       
                                echo'</div>'; 
                            echo'</div>';
                        echo'</div>';               
                       
                    }
                }
                else {
                echo '<h4 class="items">Chỉnh Sửa Truyện</h4>';
                echo'<div class="block-1">';
                    echo'<div class="row">';
                        echo '<div class="col-md-4">';
                            $_SESSION['story_id']=$row['id'];
                            echo'<h5 class="title">'.$row['story_name'].'</h5>';
                            echo '<div class="story">
                                    <form action="./../php/update-image-story.php" method="post" enctype="multipart/form-data">
                                        <img src="../image/images_upload/'.$row["images"].'" class="img-responsive" width="85%">
                                        <input type="file"  accept="image/*" name="imageStory" multiple="true" >
                                        <br><br><button class="btn btn-success" type="submit">Đổi ảnh truyện</button>
                                    </form>
                                </div>';
                            echo'
                                
                                ';
                            echo'<div class="info">';    
                                echo '<p><b>Tác giả:</b> '.$authorName["author_name"].'</p>';
                                echo '<p><b>Thể loại:</b>';
                                    
                                $paras = explode(";",$row["category"]);
                                foreach($paras as $para){
                                    $sql1 = "SELECT * FROM categories WHERE id ='$para'";
                                    $result1 = $conn->query($sql1);
                                    if($result1!=false){
                                        while($row1 = $result1->fetch_assoc()){
                                            echo $row1['categories_name'].';';
                                        }
                                    }
                                }
                                echo('<p><b>Người đăng:</b> '.$user.'</p>');
                            echo'</div>';     
                        echo'</div>';         
                        //show list-chap, add chap
                        echo '<div class="col-md-8">';
                            echo'<h5>Thay đổi thông tin truyện</h5>
                                <form action="./../php/update-content-story.php" method="post">
                                    <textarea name="content" id="content" style="width: 100%;" rows="10" placeholder="Nội dung của chap">'.$row['content'].'</textarea>
                                    <script>CKEDITOR.replace("content");</script>
                                    <h5>Giá</h5>
                                    <textarea name="price" id="price" style="width: 100%;" placeholder="Giá của chap">'.$row['price'].'</textarea>
                                    
                                    <input class="change" type="submit" value="Đổi thông tin">
                                    
                                </form>
                                ';
                            echo'<div class="status">';    
                                $_SESSION['storyid'] = $idStory;
                                
                                $sql1 = "SELECT status FROM stories WHERE id='$idStory'";
                                $result1 = $conn->query($sql1);
                                $row1 = $result1->fetch_assoc();
                                echo'<b>Trạng thái truyện: </b>';
                                $statusStory = $row1['status'];
                                if($row1['status']==5){
                                    echo'Truyện này đã bị admin khóa';
                                }
                                else {
                                    if($row1['status']==2){
                                        echo'Khóa';
                                    }elseif($row1['status']==1){
                                            echo'Đề cử';
                                    }elseif($row1['status']==0){
                                            echo'Bình thường';
                                    }elseif($row1['status']==4){
                                        echo'Hoàn thành';
                                    }elseif($row1['status']==6) {
                                        echo'Mới viết';
                                    }
                                    echo'<ul class="status-content">';
                                        echo'<li><a href="./../php/set-lock-up-story.php?storyid='.$idStory.'&&status=2" name="status"value="2"type="submit">Khóa truyện</a></li>
                                             <li><a href="./../php/set-lock-up-story.php?storyid='.$idStory.'&&status=0" name="status"value="0"type="submit">Bình thường</a></li>
                                             <li><a href="./../php/set-lock-up-story.php?storyid='.$idStory.'&&status=4" name="status"value="2"type="submit">Hoàn thành</a></li>
                                        </ul>';
                                }
                                
                            echo'</div>';       
                        echo'</div>'; 
                    echo'</div>';
                echo'</div>';               
                $nameStory = $row['story_name'];
                $_SESSION['author'] = $row['author_name'];
                $_SESSION['story']= $row['story_name'];
                $sql1 = "SELECT * FROM chaps WHERE story_name='$idStory'";
                $result1 = $conn->query($sql1);
                //danh sách chap
                echo'<div class="block-2">';
                    echo' <h4 class="items">Danh sách chương</h4>';
                        echo '<div class=row>';
                            echo'<div class="col-md-8">
                                <ul class="chap">';
                                    if($result1!=false){
                                        while($row1=$result1->fetch_assoc()){ 
                                            $_SESSION['storyName']=$nameStory;
                                            echo'<li>Chương '.$row1["chap_number"].' :'. $row1["name_chap"].'</a>
                                            <div style="float:right; width:100px;"><a href="./display-update-chap.php?chap-number='.$row1['chap_number'].'">Sửa</a></div>
                                            <div style="float:right; width:100px;"><a href="./../php/delete-chap.php?chap-id='.$row1['id'].'">Xóa</a>
                                            </li>';
                                        }
                                    }
                                echo '</ul>'; 
                            echo '</div>';                                
                        echo'</div>';
                    echo'</div>';
                    if($statusStory!='4'){
                        echo'<div class="add-chap">';
                        echo'<h5><a href="./display-add-chap.php">Thêm chap mới</a></h5>';
                        echo'</div>';
                    }else {
                        
                    }
                      
                echo'</div>';
                }                     
            }
        }
        
}
function update_user($conn){

        $id = $_SESSION['id'];
        $sql = "SELECT userName,password,phoneNumber,email,avatar FROM users where id = '$id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
            echo'<div class="col p-4">
                <h3 class="title">Hồ Sơ</h3>
               
                    <div class="row">
                        
                        <div class="col-lg-3" data-aos="fade-right">
                            <form action="../../php/update-avatar.php" method="POST" enctype="multipart/form-data">';

                                if($row['avatar']==null){
                                    echo'<img id="blah" src="../../image/avt.png" class="img-fluid" alt="your image" width="100%" height="245px">';
                                }else{
                                    echo'<img id="blah" src="../../image/avatar/'.$row['avatar'].'" class="img-fluid" alt="your image" width="100%" height="245px">';
                                }
                                echo'<input type="file"  accept="image/*" name="image" multiple="true" >
                                <br><br><button class="btn btn-success" type="submit">Thay đổi ảnh</button>
                            </form>   
                        </div>
                    
                        <div class="col-lg-9 pt-4 pt-lg-0 content" data-aos="fade-left">
                            <form action="../../php/user/user-edit.php" method="POST">

                                <div class="row">
                                <h3>Đổi thông tin cá nhân</h3>
                                    <div class="col-lg-12">
                                        <div class="white-box">
                                            <div class="form-group">
                                                <label class="col-md-12">Họ Và Tên</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="Nhập họ và tên" class="form-control form-control-line" name="userName" value="'.$row['userName'].'"> </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="example-email" class="col-md-12">Email</label>
                                                <div class="col-md-12">
                                                    <input type="email" placeholder="Email" class="form-control form-control-line" name="email" value="'.$row['email'].'" id="example-email"> 
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-12">Số Điện Thoại</label>
                                                <div class="col-md-12">
                                                <input type="text" class="form-control" id="phoneNumber" placeholder="phone number " name="phoneNumber" value="0'.$row['phoneNumber'].'">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                </div>
                                <button class="btn btn-success" type="submit">Lưu Thông Tin</button>
                            </form>
                            
                        </div>
                        <hr>
                        <form action="../../php/change-password.php" method="POST">
                            <h3>Đổi mật khẩu</h3>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Nhập mật khẩu cũ</label>
                                    <input type="password" onkeypress="return event.charCode!= 32" class="form-control form-control-line" name="password" >
                                </div>
                                <div class="col-md-12">
                                    <label>Nhập mật khẩu mới</label>
                                    <input type="password" onkeypress="return event.charCode!= 32" class="form-control form-control-line" name="password1" >
                                </div>
                                <div class="col-md-12">
                                    <label>Nhập lại mật khẩu mới</label>
                                    <input type="password" class="form-control form-control-line" name="password2" >
                                </div>
                            </div>
                            <button class="btn btn-success" type="submit">Đổi mật khẩu</button>
                        </form>    
                    </div>
                 
                
            </div>';
        
}        
function header_user($conn){
    echo'<header class="truyen-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 first">
                        <a href="../index.php" class="logo">
                            <img src="../image/image_homepage/logo1.png" width="70%">
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
                                        <li><a href="../html/story-new-update.php?value=truyen-moi&&page=1">Truyện Mới</a></li>
                                        <li><a href="../html/story-new-update.php?value=truyen-hoan-thanh">Truyện Hoàn Thành</a></li>
                                        <li><a href="../html/story-new-update.php?value=truyen-de-cu">Truyện Đề Cử</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 catory2">
                                <div class="dropdown">
                                    <!-- <i class="fas fa-bars"></i> -->
                                    <a class=" btn btn-secondary dropdown-toggle" data-toggle="dropdown" href="#">Thể loại</a>
                                    <div class="dropdown-menu">
                                        <div class="row">
                                            <div class="col-md-4 " >
                                                <ul>
                                                    <li><a href="../html/result-seach.php?category=1" class="story">Tiên Hiệp</a></li>
                                                    <li><a href="../html/result-seach.php?category=2" class="story">Kiếp Hiệp</a></li>
                                                    <li><a href="../html/result-seach.php?category=3" class="story">Hiện Đại</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-4">
                                                <ul>
                                                    <li><a href="../html/result-seach.php?category=4" class="story">Dị Năng</a></li>
                                                    <li><a href="../html/result-seach.php?category=5" class="story">Huyền Huyễn</a></li>
                                                    <li><a href="../html/result-seach.php?category=6" class="story">Lịch Sử</a></li>
                                                </ul>
                                            </div>

                                            <div class="col-md-4">
                                                <ul>
                                                    <li><a href="../html/result-seach.php?category=7" class="story">Ngôn Tình</a></li>
                                                    <li><a href="../html/result-seach.php?category=8" class="story">Quân Sự</a></li>
                                                    <li><a href="../html/result-seach.php?category=9" class="story">Xuyên Không</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 thirst">
                        <form action="../html/seach-author-story.php" class="form-group" method="GET">
                            <input id="search" name="content" placeholder="Tên truyện hoặc tác giả">
                            <button type="submit">
                                    <img src="../image/image_homepage/icon-search-primary.png" width="100%">
                            </button>
                        </form>
                    </div>
                    <div class="col-md-3 block-user">';
                       if(!isset($_SESSION['role'])){
                            echo'<img src="../image/image_homepage/icon-user.png" class="responsive">
                            <a  data-toggle="modal" data-target="#dangnhapModal">Đăng nhập</a>
                            <span>|</span>
                            <a  data-toggle="modal" data-target="#dangkiModal">Đăng kí</a>';
                        }else{
                            if($_SESSION['role']=="user"){
                                echo'<a href="../html/user/user-edit.php">';
                                echo "User: ".$_SESSION['userName'];
                                echo'</a>';
                                echo'<a href="../php/logout.php"> | Đăng Xuất</a>';
                                
                            }
                            if($_SESSION['role']=="admin")
                            {
                                echo'<a href="../html/user/user-edit.php">';
                                echo "Admin: ".$_SESSION['userName'];
                                echo'</a>';
                                echo'<a href="../php/logout.php"> | Đăng Xuất</a>';
                                
                            }
                            if($_SESSION['role']=="khóa"){
                                echo'Tài khoản bị vô hiệu hóa';
                                echo'<a href="../php/logout.php"> | Đăng Xuất</a>';
                                
                            }
                            $id=$_SESSION['id'];
                            $sqlSetPoint ="SELECT point from users where id='$id'";
                            $result = $conn->query($sqlSetPoint);
                            $row = $result->fetch_assoc();

                            echo'<br><span class="fas fa fa-dollar fa-fw mr-3">'.$row['point'].'</span>';

                        }
                    echo'</div>
                </div>

            </div>
        </header>';
}
function footer(){
    echo'<footer class="truyen-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 ">
                        <div class="block1">
                            <h5 class="title">Giới thiệu</h5>
                            <div class="footer-block-content">
                                <p>ZENKUN STORY là website đọc truyện convert online cập nhật liên tục các truyện tiên hiệp, kiếm hiệp, huyền ảo được các thành viên liên tục đóng góp rất nhiều truyện hay và nổi bật</p>
                            </div>
                        </div>
                    </div>

                    

                    <div class="col-md-4 ">
                        <h5 class="title">Liên hệ</h5>
                        <div class="footer-block-list">
                            <ul>
                                <li>
                                    <a href="mailto:dattruong0108@gmail.com">
                                        <div class="icon ">
                                            <img src="../image/icon-email.png " class="icon-email">
                                            <span>Email: dattruong0108@gmail.com</span>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="tel:0394389922">
                                        <div class="icon phone ">
                                            <img src="../image/icon-phone.png" class="icon-phone">
                                            <span>Phone: 0394389922</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <i style="font-size:30px" class="fa fa-facebook-official"></i>
                                    <span>FB: <a href="https://www.facebook.com/profile.php?id=100026254987202">Trương Công Đạt</a></span>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>';
}
function footerIndex(){
    echo'<footer class="truyen-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 ">
                        <div class="block1">
                            <h5 class="title">Giới thiệu</h5>
                            <div class="footer-block-content">
                            <p>ZENKUN STORY là website đọc truyện convert online cập nhật liên tục các truyện tiên hiệp, kiếm hiệp, huyền ảo được các thành viên liên tục đóng góp rất nhiều truyện hay và nổi bật</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <h5 class="title">Liên hệ</h5>
                        <div class="footer-block-list">
                            <ul>
                                <li>
                                    <a href="mailto:dattruong0108@gmail.com">
                                        <div class="icon ">
                                            <img src="./image/icon-email.png " class="icon-email">
                                            <span>Email: dattruong0108@gmail.com</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="tel:0394389922">
                                        <div class="icon phone ">
                                            <img src="./image/icon-phone.png" class="icon-phone">
                                            <span>Phone: 0394389922</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <i style="font-size:30px" class="fa fa-facebook-official"></i>
                                    <span>FB: <a href="https://www.facebook.com/profile.php?id=100026254987202">Trương Công Đạt</a></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>';
}
function modal(){
    echo'<!-- Modal Đăng nhập -->
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
                            <label for="email1" class="col-form-label"> Email</label>
                            <input type="email" class="form-control"  placeholder="Nhập Email" name="email" id="email1" onkeyup="validate(this)">
                            <small id="email1-error" class="form-text text-danger" hidden>Email không hợp lệ. Mời nhập lại!
                            </small>
                        </div>

                        <div class="form-group">                    
                            <label for="password1" class="col-form-label">Mật khẩu</label>
                            <div class="position">
                                <input type="password" class="form-control" id="password1" placeholder="Mật khẩu" name="password" onkeyup="validate(this)" >
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
                    <form action="../php/dangky.php" method="POST">
                        <div class="form-group">
                            <label for="userName" class="col-form-label">Tài khoản</label>
                            <input type="text" class="form-control" id="userName" placeholder="Nhập tên tài khoản" name="userName">
                        </div>

                        <div class="form-group">
                            <label for="password2" class="col-form-label">Mật khẩu</label>
                            <div class="position">
                                <input type="password" class="form-control" id="password2" placeholder="Mật khẩu" name="password" onkeyup="validate2(this)" >
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
                        <button type="submit" class="sign" id="btn-signup" disabled >Đăng Ký</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <p>Bạn đã có tài khoản? <a href="#" data-toggle="modal" data-dismiss="modal" data-target="#dangnhapModal">Đăng nhập ngay</a></p>
                </div>
            </div>
        </div>
    </div>  '  ;
}
function loadComment($conn){
    $sql = "SELECT * from reportcomment where status=0";
    $result = $conn->query($sql);
    echo('
    <table>
        <tr>
            <th style="color:#508e60;font-size: 20px;padding-bottom: 10px; border:1px solid black;"> Tên người báo cáo </th>
            <th style="color:#508e60;font-size: 20px;padding-bottom: 10px; border:1px solid black;"> Nội dung báo cáo </th>
            <th style="color:#508e60;font-size: 20px;padding-bottom: 10px; border:1px solid black;"> Nội dung comment </th>
            <th style="color:#508e60;font-size: 20px;padding-bottom: 10px; border:1px solid black;"> Người viết comment </th>
        </tr>
    ');
    while($row = $result->fetch_assoc()){
        //lấy tên người report
        $userreport = $row['user_report'];
        $sql = "SELECT userName from users where id='$userreport'";
        $result1 =$conn->query($sql);
        $nameUserReport = $result1->fetch_assoc();
        // echo($nameUserReport['userName']);

        //lấy nội dung lỗi
        $error = $row['error'];
        $sql = "SELECT content from errorcomment where id = '$error'";
        $result1 =$conn->query($sql);
        $contentError = $result1->fetch_assoc();
        // echo($contentError['content']);

        //lấy nội dung comment,id người comment
        $idComment = $row['id_comment'];
        $sql = "SELECT user_comment,value from comment where id_comment='$idComment'";
        $result1 =$conn->query($sql);
        $comment = $result1->fetch_assoc();
        // echo($comment['value']);
        //lấy tên người comment bị report
        $userComment = $comment['user_comment'];
        $sql = "SELECT userName from users where id = '$userComment'";
        $result1 =$conn->query($sql);
        $userComment = $result1->fetch_assoc();
        // echo($userComment['userName']);
        echo('
        <tr>
            <td style="padding:10px;border:1px solid black;"> '. $nameUserReport['userName'].' </td>
            <td style="padding:10px;border:1px solid black;"> '. $contentError['content'].' </td>
            <td style="padding:10px;border:1px solid black;"> '. $comment['value'].' </td>
            <td style="padding:10px;border:1px solid black;"> '. $userComment['userName'].' </td>
            <td style="padding:10px;" ><a href="../../php/approved-comment.php?idCmt='.$row['id_comment'].'&&value=1&&idReport='.$row['id'].'">Xác nhận</a></td>
            <td style="padding:10px;" ><a href="../../php/approved-comment.php?idCmt='.$row['id_comment'].'&&value=2&&idReport='.$row['id'].'">Báo cáo không đúng</a></td>
        </tr>
        ');


    }
    echo'</table>';
   
}
function statistic($conn){
    $sql ="SELECT point_rate,views from views ";
    $result = $conn->query($sql);
    $countLike = 0;
    $countComment = 0;
    $countViews = 0;
    $countUsers = 0;
    $sql1 = "SELECT id_comment from comment where status>0";
    $result1 = $conn->query($sql1);

    $sql2 = "SELECT id from users where role='user'";
    $result2 = $conn->query($sql2);
    
    while($row = $result->fetch_assoc()){
        $countLike = $countLike +$row['point_rate'];
        $countViews = $countViews +$row['views'];
    }
    while($row1 = $result1->fetch_assoc()){
        $countComment++;
    }

    while($row2 = $result2->fetch_assoc()){
        $countUsers++;
    }
    //đếm số tiền đã nạp vào web
    $point =0;
    $sql = "SELECT giaThe from card where status=1";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
        $menhGia = $row['giaThe'];

        $sqlpoint= "SELECT valueCard from cardlevel where id='$menhGia'";
        $resultPoint = $conn->query($sqlpoint);
        $valueCard = $resultPoint->fetch_assoc();

        $point = $point + $valueCard['valueCard'];

    }
    //đếm số truyện
    $story_number = 0;
    $sqlstory = "SELECT id from stories";
    $result = $conn->query($sqlstory);
    while($row = $result->fetch_assoc()){
        $story_number++;
    }
    //đếm số chap
    $chap_number = 0;
    $sqlstory = "SELECT id from chaps";
    $result = $conn->query($sqlstory);
    while($row = $result->fetch_assoc()){
        $chap_number++;
    }
    //thống kê số tiền khách hàng đã rút
    $repay = 0;
    $sql = "SELECT value from repaymoney where status=1";
    $result = $conn->query($sql);
    while($row=$result->fetch_assoc()){
        $repay += $row['value'];
    }
    //đếm số truyện bị khóa
    $story_error = 0;
    $sql = "SELECT id from stories where status=2 or status=5";
    $result = $conn->query($sql);
    while($row=$result->fetch_assoc()){
        $story_error++ ;
    }
    //đếm truyện đề cử
    $story_decu = 0;
    $sql = "SELECT id from stories where status=1";
    $result = $conn->query($sql);
    while($row=$result->fetch_assoc()){
        $story_decu++ ;
    }
    //đếm truyện hoàn thành
    $story_hoanthanh = 0;
    $sql = "SELECT id from stories where status=4";
    $result = $conn->query($sql);
    while($row=$result->fetch_assoc()){
        $story_hoanthanh++ ;
    }
    //đếm số tiền của user
    $money_user = 0;
    $sql = "SELECT point from users";
    $result = $conn->query($sql);
    while($row=$result->fetch_assoc()){
        $money_user+= $row['point'] ;
    }
    echo'<div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-secondary"><i class="fas fa-book"></i></span>
                <div class="info-box-content">
                <span class="info-box-text">Số truyện đã đăng</span>
                <span class="info-box-number">'.$story_number.'</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-secondary "><i class="fas fa-newspaper"></i></span>
                <div class="info-box-content">
                <span class="info-box-text">Số chap</span>
                <span class="info-box-number">'.$chap_number.'</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fas fa-eye"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Lượt Xem</span>
              <span class="info-box-number">'.$countViews.'</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fas fa-thumbs-up"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Likes</span>
              <span class="info-box-number">'.$countLike.'</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-info"><i class="fas fa-comments"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Bình Luận</span>
              <span class="info-box-number">'.$countComment++.'</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Thành viên</span>
              <span class="info-box-number"> '.$countUsers.'</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-success"><i class="fas fa fa-dollar"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Tiền được nạp vào</span>
              <span class="info-box-number"> '.$point.'</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-success"><i class="fas fa fa-dollar"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Tiền đã rút ra </span>
              <span class="info-box-number"> '.$repay.'</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-success"><i class="fas fa fa-dollar"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Tiền trong website</span>
              <span class="info-box-number"> '.$money_user.'</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-warning"><i class="fas fa-book"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Số truyện bị khóa</span>
              <span class="info-box-number"> '.$story_error.'</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-warning"><i class="fas fa-book"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Số truyện hoàn thành</span>
              <span class="info-box-number"> '.$story_hoanthanh.'</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-warning"><i class="fas fa-book"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Số truyện đề cử</span>
              <span class="info-box-number"> '.$story_decu.'</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>';

}
function paycard($conn){
    $sql= "SELECT * from categorycard";
    $categorycard = $conn->query($sql);
    $sql2 = "SELECT * from cardlevel ";
    $cardlevel = $conn->query($sql2);

    echo'
    <p>*Nạp thẻ mệnh giá 1k=1k point vd: thẻ 10k=10k point<br>Lưu ý: tạm thời hệ thống chỉ hỗ trợ thẻ điện thoại</p>
    <form action="../../php/paycard.php" method="POST">
    <div class="row" style=" margin:10px;">
        <div class="col-md-4">
            <span>Loại thẻ</span>
        </div>
        <select name="loaiThe">
        ';
        while($row=$categorycard->fetch_assoc()){
            echo'<option value="'.$row['id'].'">'.$row['nameCard'].'</option>';
        }
        echo'</select>
    </div>
    <div class="row" style=" margin:10px;">
        <div class="col-md-4">
            <span>Mã thẻ</span>
        </div>
        <input class="col-md-8" type="text" name="maThe" placeholder="Mã thẻ">
    </div>
    <div class="row" style=" margin:10px;">
        <div class="col-md-4">
            <span>Seri</span>
        </div>
        <input class="col-md-8" type="text" name="seri" placeholder="Seri">
    </div>
    <div class="row" style=" margin:10px;">
        <div class="col-md-4">
            <span>Chọn mệnh giá thẻ</span>
        </div>
        <select name="giaThe">';
            while ($row=$cardlevel->fetch_assoc()) {
                echo'<option value="'.$row['id'].'">'.$row['valueCard'].'</option>';
            }
        echo'</select>
    </div>
    <button type="submit">Nạp thẻ</button>
    </form>
    <h3 class="title">Thẻ của bạn</h3>

    ';
    $idUser = $_SESSION['id'];
    $sql = "SELECT * from card where id_user = '$idUser' order by id desc";
    $result = $conn->query($sql);
    
    
    if(isset($result)){
        echo'<table style=" border:1px solid black;">
        <th style="color:#508e60;font-size: 20px;padding-bottom: 10px; border:1px solid black;">Loại thẻ</th>
        <th style="color:#508e60;font-size: 20px;padding-bottom: 10px;border:1px solid black;" >Mã thẻ</th>
        <th style="color:#508e60;font-size: 20px;padding-bottom: 10px;border:1px solid black;" >Seri</th>
        <th style="color:#508e60;font-size: 20px;padding-bottom: 10px;border:1px solid black;" >Giá thẻ</th>
        <th style="color:#508e60;font-size: 20px;padding-bottom: 10px;border:1px solid black;">Trạng thái</th>
        ';
        while ($row = $result->fetch_assoc()) {
            //lấy loại thẻ
            $idcard = $row['loaiThe'];
            $sql1 = "SELECT nameCard from categorycard where id = '$idcard'";
            $result1 = $conn->query($sql1);
            //Lấy mệnh giá thẻ
            $giaThe = $row['giaThe'];
            $sql2 = "SELECT valueCard from cardlevel where id = '$giaThe'";
            $result2 = $conn->query($sql2);
            $row1 = $result1->fetch_assoc();
            $row2 = $result2->fetch_assoc();
                echo'<tr>
                <td style=" border:1px solid black;">'.$row1['nameCard'].'</td>
                <td style=" border:1px solid black;">'.$row['maThe'].'</td>
                <td style=" border:1px solid black;">'.$row['seri'].'</td>
                <td style=" border:1px solid black;">'.$row2['valueCard'].'</td>
                <td style=" border:1px solid black;">';
                if($row['status']==0){
                    echo'Đang chờ duyệt';
                }elseif($row['status']==1){
                    echo'Nạp thành công';
                }elseif($row['status']==2){
                    echo'Thẻ nạp lỗi';
                }
                echo'
                </td>
                </tr>
                ';
        }
        echo'</table>';
    }
}
function setCard($conn){
    $sql = "SELECT * from card where status = 0";
    $result = $conn->query($sql);
    echo'<table style="">
        <th style="color:#508e60;font-size: 20px;padding-bottom: 10px; border:1px solid black;">Loại thẻ</th>
        <th style="color:#508e60;font-size: 20px;padding-bottom: 10px;border:1px solid black;" >Mã thẻ</th>
        <th style="color:#508e60;font-size: 20px;padding-bottom: 10px;border:1px solid black;" >Seri</th>
        <th style="color:#508e60;font-size: 20px;padding-bottom: 10px;border:1px solid black;" >Giá thẻ</th>
        ';
        while ($row = $result->fetch_assoc()) {
            //lấy loại thẻ
            $idcard = $row['loaiThe'];
            $sql1 = "SELECT nameCard from categorycard where id = '$idcard'";
            $result1 = $conn->query($sql1);
            //Lấy mệnh giá thẻ
            $giaThe = $row['giaThe'];
            $sql2 = "SELECT valueCard from cardlevel where id = '$giaThe'";
            $result2 = $conn->query($sql2);
            $row1 = $result1->fetch_assoc();
            $row2 = $result2->fetch_assoc();
                echo'<tr>
                <td style=" border:1px solid black;">'.$row1['nameCard'].'</td>
                <td style=" border:1px solid black;">'.$row['maThe'].'</td>
                <td style=" border:1px solid black;">'.$row['seri'].'</td>
                <td style=" border:1px solid black;">'.$row2['valueCard'].'</td>
                <td style=" border:1px solid black;"><a href="../../php/confirm-card.php?value=1&&money='.$row['giaThe'].'&&id='.$row['id'].'&&user='.$row['id_user'].'">Xác nhận</a></td>
                <td style=" border:1px solid black;"><a href="../../php/confirm-card.php?value=2&&money='.$row['giaThe'].'&&id='.$row['id'].'&&user='.$row['id_user'].'">Không nạp được</a></td>
                </tr>
                ';
        }
        echo'</table>';
}
function getReport($conn){
    $sql = "SELECT * from reportstory where status = 0";
    $result = $conn->query($sql);
    echo'<table style="">
        <th style="color:#508e60;font-size: 20px;padding-bottom: 10px; border:1px solid black;">Người báo cáo</th>
        <th style="color:#508e60;font-size: 20px;padding-bottom: 10px; border:1px solid black;" >Nội dung báo cáo</th>
        <th style="color:#508e60;font-size: 20px;padding-bottom: 10px; border:1px solid black;" >Nội dung chi tiết thêm</th>
        <th style="color:#508e60;font-size: 20px;padding-bottom: 10px; border:1px solid black;" >Truyện bị báo cáo</th>
        ';
    
    while ($row = $result->fetch_assoc()) {
        
        $user = $row['user_report'];
        $error = $row['error'];
        $story = $row['id_story'];
        //lấy tên người báo cáo
        $sql = "SELECT userName from users where  id = '$user'";
        $result1 = $conn->query($sql);
        $nameUser = $result1->fetch_assoc();

        //lấy nội dung lỗi
        $sql = "SELECT content from error where  id = '$error'";
        $result1 = $conn->query($sql);
        $nameError = $result1->fetch_assoc();

        //lấy tên truyện bị báo cáo
        $sql = "SELECT story_name from stories where  id = '$story'";
        $result1= $conn->query($sql);
        $nameStory = $result1->fetch_assoc();
        echo'<tr>
                <td style=" border:1px solid black;">'.$nameUser['userName'].'</td>
                <td style=" border:1px solid black;">'.$nameError['content'].'</td>
                <td style=" border:1px solid black;">'.$row['content'].'</td>
                <td style=" border:1px solid black;"><a href="../introStory.php?storyid='.$row['id_story'].'">'.$nameStory['story_name'].'</a></td>
                <td style=" border:1px solid black;"><a href="../../php/confirm-report-story.php?report=1&&id='.$row['id'].'&&story='.$story.'">Xác nhận</a></td>
                <td style=" border:1px solid black;"><a href="../../php/confirm-report-story.php?report=2&&id='.$row['id'].'">Báo cáo không đúng</a></td>
            </tr>
                ';
    }
    echo'</table>';
}
function showHistoryPayStory($conn){
    $id = $_SESSION['id'];
    $sql = "SELECT id_story from paystory where id_user = '$id' order by id desc";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $idstory = $row['id_story'];
        $sql = "SELECT story_name,images,id,price,status from stories where  id = '$idstory'and ( status!=2 or status!=5)";
        $result1 = $conn->query($sql);
        $row1 = $result1->fetch_assoc();
        if($row1!=null){
            if($row1['status']==2){
                echo('Bạn đã mua truyện 
                    <img class="img-responsive" src="../../image/images_upload/'.$row1['images'].'" alt="" width="30px" height="40px">'.$row1['story_name'].'
                với giá'.$row1['price'].' (truyện bị khóa)
                <hr>');
            }else {
                echo('Bạn đã mua truyện 
                <a class="thumb" href="../../html/introStory.php?storyid='.$row1['id'].'"> 
                    <img class="img-responsive" src="../../image/images_upload/'.$row1['images'].'" alt="" width="30px" height="40px">'.$row1['story_name'].'
                </a>
                với giá'.$row1['price'].'
                <hr>');
            }
           
        }
        }
        
}
function showHistorydonate($conn){
    $userDonate = $_SESSION['id'];
    $sql = "SELECT * from donate where user_donate = '$userDonate' order by id desc ";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $story = $row['story'];
        $user = $row['user_receive'];
        //lấy tên truyện    
        $sql ="SELECT story_name from stories where id='$story'";
        $result1 = $conn->query($sql);
        $row1 = $result1->fetch_assoc();
        //lấy tên người nhận donate
        $sql ="SELECT userName from users where id='$user'";
        $result1 = $conn->query($sql);
        $row2 = $result1->fetch_assoc();
        echo('Bạn đã donate cho truyện <a href="../introStory.php?storyid='.$row['story'].'">'.$row1['story_name'].'</a> Người đăng: '.$row2['userName'].' Số tiền: '.$row['point'].' point<hr>'

        );
    }
}
function showHistoryReceiveDonate($conn){
    $userReceiveDonate = $_SESSION['id'];
    $sql = "SELECT * from donate where user_receive = '$userReceiveDonate' order by id desc ";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $story = $row['story'];
        $user = $row['user_donate'];
        //lấy tên truyện    
        $sql ="SELECT story_name from stories where id='$story'";
        $result1 = $conn->query($sql);
        $row1 = $result1->fetch_assoc();
        //lấy tên người gửi donate
        $sql ="SELECT userName from users where id='$user'";
        $result1 = $conn->query($sql);
        $row2 = $result1->fetch_assoc();
        echo('Bạn đã nhận donate cho truyện <a href="../introStory.php?storyid='.$row['story'].'">'.$row1['story_name'].'</a> Từ: '.$row2['userName'].' Số tiền: '.$row['point'].' point<hr>'

        );
    }
}
function showHistoryReport($conn){
    $userReport = $_SESSION['id'];
    $sql = "SELECT * from reportstory where user_report='$userReport'";
    $result = $conn->query($sql);
    echo('<table>
    <th style="color:#508e60;font-size: 20px;padding-bottom: 10px; border:1px solid black;">Tên truyện</th>
    <th style="color:#508e60;font-size: 20px;padding-bottom: 10px; border:1px solid black;">Nội dung</th>
    <th style="color:#508e60;font-size: 20px;padding-bottom: 10px; border:1px solid black;">Chi tiết</th>
    <th style="color:#508e60;font-size: 20px;padding-bottom: 10px; border:1px solid black;">Trạng thái</th>

    ');
    while ($row = $result->fetch_assoc()) {
        //lấy tên truyện
        $idStory = $row['id_story'];
        $sql = "SELECT story_name,images from stories where id='$idStory'";
        $result1 = $conn->query($sql);
        $row1 = $result1->fetch_assoc();
        //lấy nội dung lỗi
        $error = $row['error'];
        $sql = "SELECT content from error where id = '$error'";
        $result2= $conn->query($sql);
        $row2 = $result2->fetch_assoc();
        echo('
        <tr>
            <td style=" border:1px solid black;">'.$row1['story_name'].'</td>
            <td style=" border:1px solid black;">'.$row2['content'].'</td>
            <td style=" border:1px solid black;">'.$row['content'].'</td>
            <td style=" border:1px solid black;">');
            if($row['status']==0){
                echo('đang chờ duyệt');
            }
            elseif ($row['status']==1) {
                echo('report thành công');
            }else {
                echo('report thất bại');
            }
            echo('</td>
        </tr>
        ');
    }
    echo('</table>');
}
function showHistoryReportComment($conn){
    $id = $_SESSION['id'];
    $sql= "SELECT * from reportcomment where user_report= '$id'";
    $result = $conn->query($sql);
    echo('
    <table>
        <tr>
            <th style="color:#508e60;font-size: 20px;padding: 10px; border:1px solid black;">Người viết bình luận</th>
            <th style="color:#508e60;font-size: 20px;padding: 10px; border:1px solid black;">Nội dung báo cáo</th>
            <th style="color:#508e60;font-size: 20px;padding: 10px; border:1px solid black;">Lỗi báo cáo</th>
            <th style="color:#508e60;font-size: 20px;padding: 10px; border:1px solid black;">Trạng thái</th>
        </tr>
    
    ');
    while($row = $result->fetch_assoc()){
        //lấy nội dung comment và id người viết cmt
        $idComment = $row['id_comment'];
        $sql = "SELECT user_comment,value from comment where id_comment='$idComment'";
        $result1= $conn->query($sql);
        $row1 = $result1->fetch_assoc();

        //lấy tên người viết cmt
        $userComment = $row1['user_comment'];
        $sql = "SELECT userName from users where id = '$userComment'";
        $result1= $conn->query($sql);
        $row2 = $result1->fetch_assoc();
        //lấy nội dung lỗi báo cáo
        $error = $row['error'];
        $sql = "SELECT content from errorcomment where id = '$error'";
        $result1= $conn->query($sql);
        $row3 = $result1->fetch_assoc();
        echo('
        <tr>
            <td style=" border:1px solid black;padding:10px;">'.$row2['userName'].'</td>
            <td style=" border:1px solid black;padding:10px;">'.$row1['value'].'</td>
            <td style=" border:1px solid black;padding:10px;">'.$row3['content'].'</td>
            <td style=" border:1px solid black;padding:10px;">');
            if($row['status']==0){
                echo("đang chờ duyệt");
            }elseif ($row['status']==1) {
                echo('report thành công');
            }else {
                echo("report không thành công");
            }
            echo('
            </td>
        </tr>
        ');

    }
    echo('</table>');
}
function cash($conn){
    echo("
    <p>Tiền của bạn sẽ được quy đổi chiết khấu 15% tức là bạn sẽ được 85% từ số point đổi ra vd: 10000point = 8500đ tiền được đổi qua tài khoản ngân hàng hoặc tiền gửi về theo số điện thoại</p>
    ");
    echo('
    <form action="../../php/rut-tien.php" method="post">
        <div style="width:100%;">
            <span>Chọn phương thức rút</span><br>
            <select name="card" class="col-md-4">
                <option value="1">Thẻ điện thoại</option>
                <option value="2">Thẻ ngân hàng</option>
            </select>
        </div>
        <div style="width:100%;">
            <span>Nhập số điện thoại hoặc số tài khoản ngân hàng</span><br>
            <input class="col-md-8" name="code" placeholder="Nhập số điện thoại hoặc tài khoản ngân hàng">
        </div>
        <div style="width:100%;">
            <span>Nhập tên chủ tài khoản hoặc tên chủ số điện thoại</span><br>
            <input class="col-md-8" name="name" placeholder="Nhập mã thẻ hoặc tài khoản ngân hàng">
        </div>
        <div style="width:100%;">
            <span>Nhập số tiền</span><br>
            <input class="col-md-8" name="point" placeholder="Nhập số điểm muốn đổi">
        </div>
        <div style="width:100%;">
            <span>Nhập nhà mạng hoặc tên ngân hàng</span><br>
            <input class="col-md-8" name="nameCard" placeholder="Nhập nhà mạng hoặc tên ngân hàng">
        </div>
        <div style="width:100%;">
            <button type="submit" style=" margin:10px 10px 10px 0px;border: none;padding: 3px 20px;background: #508e60;color: #fff;border-radius: 5px;">Gửi</button>
        </div>
    </form>
    ');
}
function aprovedRepayMoney($conn){
    $sql = "SELECT * from repaymoney where status=0";
    $result = $conn->query($sql);
    echo('
    <table>
    <tr>
        <th style="color:#508e60;font-size: 20px;padding: 10px; border:1px solid black;">Loại rút </th>
        <th style="color:#508e60;font-size: 20px;padding: 10px; border:1px solid black;">Tên người dùng rút</th>
        <th style="color:#508e60;font-size: 20px;padding: 10px; border:1px solid black;">Số tài khoản hoặc số điện thoại</th>
        <th style="color:#508e60;font-size: 20px;padding: 10px; border:1px solid black;">Tên người nhận</th>
        <th style="color:#508e60;font-size: 20px;padding: 10px; border:1px solid black;">Loại mạng nếu có</th>
        <th style="color:#508e60;font-size: 20px;padding: 10px; border:1px solid black;">Số tiền rút</th>
        <th style="color:#508e60;font-size: 20px;padding: 10px; border:1px solid black;">Số tiền nhận</th>
    </tr>
    ');
    while($row = $result->fetch_assoc()){
        //lấy user rút tiền
        $id = $row['user'];
        $sql = "SELECT userName from users where id='$id'";
        $result1 = $conn->query($sql);
        $userName = $result1->fetch_assoc();
        echo('
        <tr>
            <td style=" border:1px solid black;padding:10px;">');
            if($row['category_card']==1){
                echo('số điện thoại');
            }else {
                echo("tài khoản ngân hàng");
            }
            echo('
            </td>
            <td style=" border:1px solid black;padding:10px;">'.$userName['userName'].'</td>
            <td style=" border:1px solid black;padding:10px;">'.$row['code_card'].'</td>
            <td style=" border:1px solid black;padding:10px;">'.$row['name'].'</td>
            <td style=" border:1px solid black;padding:10px;">'.$row['name_card'].'</td>
            <td style=" border:1px solid black;padding:10px;">'.$row['value'].'</td>
            <td style=" border:1px solid black;padding:10px;">'.$row['value']*0.85.'</td>
            <td style=" border:1px solid black;padding:10px;"><a href="../../php/approved-repay-money.php?status=1&&id='.$row['id'].'">Xác nhận</a></td>
            <td style=" border:1px solid black;padding:10px;"><a href="../../php/approved-repay-money.php?status=2&&id='.$row['id'].'">Hủy</a></td>

        </tr>');
    }
    echo('</table>');
}
function getRepayMoney($conn){
    $id= $_SESSION['id'];
    $sql = "SELECT * from repaymoney where user='$id'";
    $result=$conn->query($sql);
    echo('
    <table>
    <tr>
        <th style="color:#508e60;font-size: 20px;padding: 10px; border:1px solid black;">Loại rút </th>
        <th style="color:#508e60;font-size: 20px;padding: 10px; border:1px solid black;">Tên người dùng rút</th>
        <th style="color:#508e60;font-size: 20px;padding: 10px; border:1px solid black;">Số tài khoản hoặc số điện thoại</th>
        <th style="color:#508e60;font-size: 20px;padding: 10px; border:1px solid black;">Tên người nhận</th>
        <th style="color:#508e60;font-size: 20px;padding: 10px; border:1px solid black;">Nhà mạng, ngân hàng</th>
        <th style="color:#508e60;font-size: 20px;padding: 10px; border:1px solid black;">Số tiền rút</th>
        <th style="color:#508e60;font-size: 20px;padding: 10px; border:1px solid black;">Số tiền nhận</th>
        <th style="color:#508e60;font-size: 20px;padding: 10px; border:1px solid black;">Trạng thái</th>

    </tr>
    ');
    while($row = $result->fetch_assoc()){
        //lấy tên người rút tiền
        $sql = "SELECT userName from users where id = '$id'";
        $result1=$conn->query($sql);
        $userName = $result1->fetch_assoc();    
        echo'
        <tr>
        <td style=" border:1px solid black;padding:10px;">';
        if($row['category_card']==1){
            echo('số điện thoại');
        }else {
            echo("tài khoản ngân hàng");
        }
        echo('</td>
        <td style=" border:1px solid black;padding:10px;">'.$userName['userName'].'</td>
        <td style=" border:1px solid black;padding:10px;">'.$row['name_card'].'</td>
        <td style=" border:1px solid black;padding:10px;">');
        if($row['category_card']==1){
            echo('0'.$row['code_card']);
        }else {
            echo($row['code_card']);
        }
        
        echo('</td>
        <td style=" border:1px solid black;padding:10px;">'.$row['name'].'</td>
        <td style=" border:1px solid black;padding:10px;">'.$row['value'].'</td>
        <td style=" border:1px solid black;padding:10px;">'.$row['value']*0.85.'</td>
        <td style=" border:1px solid black;padding:10px;">');
        if($row['status']==0){
            echo("đang chờ");
        }
        elseif ($row['status']==1) {
            echo("Thành công");
        }else {
            echo("Thất bại");
        }
        echo('</td>
    </tr>');
    }
    echo("</table>");
}
function story_favorite($conn){
    $sqlSelect="SELECT id_story,point_rate from views  order by point_rate desc ";
    $resultLike = $conn->query($sqlSelect);
    $i=0;
    while($storyFavorite = $resultLike->fetch_assoc()){
        //echo($storyFavorite['id_story'].'<br>');
        //lấy thông tin truyện
        $id_story = $storyFavorite['id_story'];
        $sqlStory ="SELECT id,story_name,images,status from stories where id ='$id_story'";
        $resultStory = $conn->query($sqlStory);
        $story = $resultStory->fetch_assoc();
        if( $story['status']==2|| $story['status']==5){

        }else {
            echo('
                <div class="col-md-2">
                <a style="text-decoration: none" href="./html/introStory.php?storyid='.$story['id'].'">
                    <img src="./image/images_upload/'.$story['images'].'" width="170px" height="260px"><br>
                    <div class="row">
                        <div class="col-md-9">
                            <span  style=";color: #3c3c3c;font-weight: bold" href="">'.$story["story_name"].'</span>
                            </a>
                        </div>
                        <div class="col-md-2">
                            <i class="fas fa-thumbs-up" style="color:#007bff;">'.$storyFavorite['point_rate'].'</i>&nbsp;
                        </div>
                    </div>
                </div>
                ');
        $i++;
        }
        if($i==6){
            return;
        }
       
    }
}
function story_views($conn){
    $sqlSelect="SELECT id_story,views from views order by views desc ";
    $resultLike = $conn->query($sqlSelect);
    $i=0;
    while($storyViews = $resultLike->fetch_assoc()){
        //echo($storyViews['id_story'].'<br>');
        //lấy thông tin truyện
        $id_story = $storyViews['id_story'];
        $sqlStory ="SELECT id,story_name,images,status from stories where id ='$id_story'";
        $resultStory = $conn->query($sqlStory);
        $story = $resultStory->fetch_assoc();
        if( $story['status']==2|| $story['status']==5){

        }else {
            echo('
            <div class="col-md-2">
            <a style="text-decoration: none;"href="./html/introStory.php?storyid='.$story['id'].'">
                <img src="./image/images_upload/'.$story['images'].'" width="170px" height="260px"><br>
                <div class="row">
                    <div class="col-md-9">
                        <span style="color: #3c3c3c;font-weight: bold" >'.$story["story_name"].'</span>
                        </a>
                    </div>
                    <div class="col-md-2">
                    <i class="fas fa-eye"> '.$storyViews['views'].'</i>
                    </div>
                </div>

                
            </div>
            ');
            $i++;
        }
        if($i==6){
            return;
        }
       
    }
}

?>

