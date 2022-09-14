<?php
    if (!isset($_SESSION) ) {
        session_start();
    }
    session_destroy();
    echo("<script>window.alert('Log out efetuado');</script>");
    header("Location: index.php");
?>