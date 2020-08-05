<?php

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['login-submit'])) {
    include 'config.php';

    $email = trim(mysqli_real_escape_string($conn, $_POST['login-email']));
    $password = mysqli_real_escape_string($conn, $_POST['login-password']);

    if (empty($email) || empty($password)) {
        header('Location: ../index.php?login=empty');
        exit();
    } else {
        $loginCheck = "SELECT * FROM accounts WHERE email='$email'";
        $loginQuery = mysqli_query($conn, $loginCheck);
        if (mysqli_num_rows($loginQuery) > 0) {
            $row = mysqli_fetch_assoc($loginQuery);
            $dehashedPassword = password_verify($password, $row['password']);
            if (!$dehashedPassword) {
                header("Location: ../index.phplogin=password");
                exit();
            } else if ($dehashedPassword) {
                $_SESSION['f_name'] = $row['f_name'];
                $_SESSION['l_name'] = $row['l_name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['user_id'] = $row['user_id'];
                header("Location: ../index.php?login=success");
                exit();
            } else {
                header("Location: ../index.php?login=error");
                exit();
            }
        } elseif (mysqli_num_rows($loginQuery) == 0) {
            header('Location: ../index.php?login=invalid');
            exit();
        }
    }
} else {
    header('Location: ../index.php');
    exit();
}

?>