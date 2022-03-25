<?php
    session_start();
    include_once("./../php/controller.php");
    include_once("./../php/connect.php");
    alert();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin truyện</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/styleIntro.css">
    <link rel="stylesheet" type="text/css" href="../css/eyePassLogin.css">
    <link rel="stylesheet" type="text/css" href="../css/eyePassSignin.css">
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
        <main class="truyen-main" style="background:none;">
            <div class="container">
                    <?php
                        intro_story($conn);
                    ?>           
            </div>
        </main>
        <?php
            footer();
        ?>
    </div>
    <?php 
        modal();
    ?>
    <script src="../js/scriptIndex.js"></script>
</body>

</html>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="./../php/donate.php" method="post">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Số tiền bạn muốn donate</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="number" name="point">  point
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Donate</button>
            </div>
            </div>
        </div>
    </form>
</div>
<div class="modal fade" id="modalReport" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Lỗi vi phạm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="./../php/report-story.php" method="post">
                <div class="modal-body">
                    
                    <?php
                        $id = $_SESSION['story_id'];
                        // phpAlert($id);
                        $sql = "SELECT user from stories where id = '$id'";
                        $result = $conn->query($sql);
                        $row1 = $result->fetch_assoc();
                        $_SESSION['user-reported'] = $row1['user'];
                        // phpAlert($_SESSION['user-reported']);

                        $sql = "SELECT * from error";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            echo('<input type="radio" style="margin:10px;" value="'.$row['id'].'" name="errorStory">'.$row['content'].'<br>');
                        }
                        echo('<input style="width:100%;" name="content" placeholder="Chi tiết thêm">');

                    ?>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Báo cáo</button>
                </div>
            </from>
        </div>
    </div>
</div>