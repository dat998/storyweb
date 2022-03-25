<?php
        
        
    function recomment(){
        $username = "root"; // Khai báo username
        $password = "";      // Khai báo password
        $server   = "localhost";   // Khai báo server
        $dbname   = "story";      // Khai báo database
        $conn=new mysqli($server,$username,$password,$dbname);
        $sql = "SELECT * from stories where status= '1' ORDER BY update_at DESC";
        
        $result = $conn->query($sql);
    
        $count=0;
        // echo' <div class="carousel-inner" style="width: 100%;height: 400px;">';
        while($row= $result->fetch_assoc()){
            // echo '<a href="./html/introStory.php?storyid='.$row['id'].'">'; 
            // echo '<div class="truyen" style="width: 18%; height: 100%; margin-left: 16px; padding-top:10px; ">';
                
            //     echo '<div style="width: 100%; height: 350px">';
            //     echo '<img src="./image/images_upload/'.$row['images'].' " style="width: 100%; height: 100%;" alt="#img">';
            //     echo '</div>';
    
            //     echo '<div style="width: 100%; height: 50px;">';
            //     echo $row["story_name"];
            //     echo '</div>';
    
            // echo '</div>';
            // echo'</a>';
            if(++$count%5==0){
                break;
            }  
        }
        // echo'</div>' ;
        //     echo'<div class="carousel-item active">';
                        
        //     if($count == 0){
        //         echo'<ul class="list-story">';
        //         echo'<li>
        //                 <div class="truyen" style="width: 19%; height: 100%; margin: 5px;">
        //                     <a href="./html/introStory.php?storyid='.$row['id'].'"><img src="./image/images_upload/'.$row['images'].'" width="270px" height="400px"></a>
        //                 </div>
        //             </li>';
        //         $count++;
        //     }
        //     else if($count<4){
                
        //         echo'<li><a href="./html/introStory.php?storyid='.$row['id'].'"><img src="./image/images_upload/'.$row['images'].'" width="270px" height="400px"></a></li>';
        //         $count++;
        //         if($count==3){
        //             echo' </ul>';
        //             echo'</div>';
        //         }
                
        //     }
        //     elseif($count>=4){
        //         if($count%4==0){
        //             echo '<div class="carousel-item">
        //             <ul style="display: flex; justify-content: space-between; list-style-type: none;">';
        //         }
        //             echo'<li><a href="./html/introStory.php?storyid='.$row['id'].'"><img src="./image/images_upload/'.$row['images'].'" width="270px" height="400px"></a></li>';
        //             $count++;
        //         if($count%4==3){
        //             echo' </ul>
        //             </div>';
        //         }
        //     }
        //     // elseif($count<=15){
        //     //     echo'</div>';
        //     //     break;
        //     // }
        // }
        // echo'</div>';
        
        // echo'<a class="carousel-control-prev" href="#demo" data-slide="prev">
        //     <span class="carousel-control-prev-icon"></span>
        //     </a>
        //     <a class="carousel-control-next" href="#demo" data-slide="next">
        //         <span class="carousel-control-next-icon"></span>
        //     </a>';
        // //echo'</div>' ;
    }
    
?>