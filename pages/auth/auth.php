<?php
    session_start();
    if(!$_SESSION['login']){
        header("location: /m/pages/auth");
        exit;
    }
?>