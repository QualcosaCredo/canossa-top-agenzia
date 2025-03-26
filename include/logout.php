<?php
    session_start();

    if(isset($_SESSION['logged'])){
        $_SESSION['logged'] = false;
        $_SESSION['permission'] = 0;
        
        header("Location: ../php/loginPage.php");
    }
?>