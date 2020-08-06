<?php

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['logout-submit'])) {
    unset($_SESSION['user_id']);
    unset($_SESSION['f_name']);
    unset($_SESSION['l_name']);
    unset($_SESSION['email']);
    header("Location: ../index.php");
    exit();
} else {
    header("Location: ../index.php");
    exit();
}

?>