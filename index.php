<?php
// index.php
include_once 'includes/functions.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'home';
include 'pages/' . $page . '.php';
?>
