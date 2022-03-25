<?php
    $myfile = fopen("./textfile/hello.txt", "r") or die("Unable to open file!");
    //echo fread($myfile,filesize("./textfile/hello.txt"));
    $line = explode("\n",fread($myfile,filesize("./textfile/hello.txt")));
    foreach($line as $mline){
        echo '<p>'.$mline.'</p>';
    }
    //fclose($myfile);
?>