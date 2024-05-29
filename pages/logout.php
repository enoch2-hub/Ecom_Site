<?php
// logout.php
session_start();

function destroySession() {
    $_SESSION=array();
    if(session_id() != "" || isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time()-2592000, '/');
    } else {
        session_destroy();
    }
}

if(isset($_SESSION['username'])) {
    unset($_SESSION['username']);
    destroySession();
    header('Location: index.php?page=home');
    exit();
}


?>