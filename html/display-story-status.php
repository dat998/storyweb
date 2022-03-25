<?php
    session_start();
    include_once("../php/connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý truyện</title>
</head>
<body>
    <?php
        $id=$_SESSION['id'];
        $sql = "SELECT * From stories where user='$id'";
        $result = $conn->query($sql);
        echo '<h4>Chỉnh sửa trạng thái truyện</h4>
        <tr>0 là bình thường</tr> <tr> 1 là truyện đề cử </tr>';
        echo "<table>";
        echo '<th>id</th>';
        echo '<th>user</th>';
        echo '<th>author</th>';
        echo '<th>category</th>';
        echo '<th>story name</th>';
        //echo '<th>content</th>';
        echo "<th>status </th>";
        while($row = $result->fetch_assoc()){
            
            echo '<form action="../php/story-status.php" method="POST">';
            echo '<tr>';
            echo '<td style="width: 100px;">'. $row['id']."</td>";
            echo '<td style="width: 100px;">'. $row['user']."</td>";
            echo '<td style="width: 100px;">'. $row['author_name']."</td>";
            echo '<td style="width: 100px;">'. $row['category']."</td>";
            echo '<td style="width: 100px;">'. $row['story_name']."</td>";
            //echo'<td><textarea name="content" style="width: 300px;" rows="10" placeholder="'. $row['content'].'"></textarea></td>';
      //      echo '<td ><input style="width: 400px;height: 200px;" value="'. $row['content'].'" ></td>';
            echo'<td><input type="text" value="'.$row['status'].'" name="status"></td>';
            echo'<td> <button type="submit" name="id" value="'.$row['id'].'">sửa</button>';
            
            echo'</tr>';
            echo'</form>';
           
        }
        echo"</table>";
    ?>
    <button><a href="../index.php">về trang chủ</a></button>
</body>
</html>