<?php
    $path = '../images/abc/def/abcdef/upload/biatruyen.jpg';
    $name = explode('/',$path);
    print_r($name);
    echo $name[count($name)-1];
    print_r($name);
