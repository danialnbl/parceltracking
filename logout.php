<?php
    session_start();
    unset($_SESSION["User"]); 
    session_destroy();
    header("Location:staff_login.php");
?>