
<?php
    session_start();
    // unset($_SESSION['userName']);
    // unset($_SESSION['id']);
    // unset($_SESSION['role']);
    // unset($_SESSION['author']);
    session_destroy();
    header("Location: ../index.php");

?>