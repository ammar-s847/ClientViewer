<?php

/* if a user has their email registered in the client database, the sign up script replaces their current password with what they set it as in the sign up form. 
*/

if (isset($_POST['signup-submit'])) {
    include 'config.php';

    $input = array(
        trim(mysqli_real_escape_string($conn, $_POST['f_name'])),
        trim(mysqli_real_escape_string($conn, $_POST['l_name'])),
        trim(mysqli_real_escape_string($conn, $_POST['email'])),
        mysqli_real_escape_string($conn, $_POST['password']),
        $_POST['conf_password']
    );

    foreach ($input as $item) {
        if (empty($item)) {
            header('Location: ../signup.php?status=empty');
            exit();
        }
    }

    if ($input[3] != $input[4]) {
        header('Location: ../signup.php?status=password');
        exit();
    } else {
        if (!filter_var($input[2], FILTER_VALIDATE_EMAIL)) {
            header('Location: ../signup.php?status=email');
            exit();
        } else {
            $emailCheck = "SELECT email FROM accounts WHERE email='$input[2]'";
            $emailCheckResult = mysqli_query($conn, $emailCheck);
            $emailCheckResultCheck = mysqli_num_rows($emailCheckResult);
            if ($emailCheckResultCheck > 0) {
                header('Location: ../signup.php?status=taken');
                exit();
            } elseif ($emailCheckResultCheck == 0) {
                $hashedPassword = password_hash($input[3], PASSWORD_DEFAULT);
                $user_id = uniqid();
                $insertUser = "INSERT INTO accounts (f_name, l_name, email, password, user_id) VALUES ('$input[0]', '$input[1]', '$input[2]', '$hashedPassword', '$user_id')";
                if (mysqli_query($conn, $insertUser)) {
                    header('Location: ../index.php?status=signup-success');
                    exit();
                } else {
                    header('Location: ../signup.php?status=error');
                    exit();
                    /*printf(mysqli_error($conn));*/
                }
            }
        }
    }
} else {
    header('Location: ../signup.php');
    exit();
}

?>