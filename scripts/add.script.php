<?php

if (isset($_POST['add-submit'])) {
    include 'config.php';

    $f_name = trim(mysqli_real_escape_string($conn, $_POST['add-f_name']));
    $l_name = trim(mysqli_real_escape_string($conn, $_POST['add-l_name']));
    $email = trim(mysqli_real_escape_string($conn, $_POST['add-email']));

    if (empty($f_name) || empty($l_name) || empty($email)) {
        header('Location: ../index.php?add=empty');
        exit();
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header('Location: ../index.php?add=email');
            exit();
        } else {
            $emailCheck = "SELECT email FROM accounts WHERE email='$email'";
            $emailCheckResult = mysqli_query($conn, $emailCheck);
            $emailCheckResultCheck = mysqli_num_rows($emailCheckResult);
            if ($emailCheckResultCheck > 0) {
                header('Location: ../index.php?add=taken');
                exit();
            } elseif ($emailCheckResultCheck == 0) {
                $user_id = uniqid();
                $insertUser = "INSERT INTO accounts (f_name, l_name, email, user_id) VALUES ('$f_name', '$l_name', '$email', '$user_id')";
                if (mysqli_query($conn, $insertUser)) {
                    header('Location: ../index.php?add=success');
                    exit();
                } else {
                    header('Location: ../signup.php?add=error');
                    exit();
                    /*printf(mysqli_error($conn));*/
                }
            }
        }
    }
} else {
    header('Location: ../index.php');
    exit();
}

?>