<?php

if (!isset($_SESSION)) {
    session_start();
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Google Fonts --><link href="https://fonts.googleapis.com/css2?family=Roboto&family=Source+Sans+Pro&display=swap" rel="stylesheet">
        <!-- Bootstrap --><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link href="style.css" rel="stylesheet">
        <title>ClientViewer</title>
    </head>
    <body>
        <header class="navbar navbar-expand navbar-dark" style="background-color: rgb(52, 88, 235);">
            <a class="navbar-brand" href="index.php">ClientViewer</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav bd-navbar-nav flex-row">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                </ul>
            </div>

            <?php if (isset($_SESSION['user_id'])) { ?>
                <ul class="navbar-nav ml-md-auto">
                    <li class="nav-item active">
                        <a style="color: white;">Logged in as <?php echo $_SESSION['f_name'] . ' ' . $_SESSION['l_name']; ?></a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-md-auto" style="padding-left: 10px;">
                    <li class="nav-item">
                        <form action="scripts/logout.php" method="post">
                            <input type="submit" name="logout-submit" value="Log Out">
                        </form>
                    </li>
                </ul>
            <?php } ?>
        </header>

        <style>
            form * {
                margin: 5px;
            }

            .container-sm {
                margin-top: 25px;
            }
        </style>

        <?php if (isset($_SESSION['user_id'])) { ?>

            <div class="container" style="margin-top: 15px; text-align: center;">
                <form action="scripts/add.script.php" method="post">
                    <input type="text" name="add-f_name" placeholder="First Name">
                    <input type="text" name="add-l_name" placeholder="Last Name">
                    <input type="text" name="add-email" placeholder="Email">
                    <input type="submit" name="add-submit" value="Add">
                </form>
            </div><br>

            <div class="container">
                <?php
                    include 'scripts/config.php';
                    $sql = "SELECT * FROM accounts";
                    $query = mysqli_query($conn, $sql);

                    if ($query -> num_rows > 0) { ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <td><b>First Name</b></td>
                                    <td><b>Last Name</b></td>
                                    <td><b>Email</b></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $query -> fetch_assoc()) { ?>
                                    <tr>
                                        <td><?php echo $row['f_name']; ?></td>
                                        <td><?php echo $row['l_name']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <!--<form style="display: inline-block;" action="index.php" method="POST">
                                            <button name="delete-number" value="<?php echo $row['user_id'] ?>">X</button>
                                        </form>-->
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    <?php } else {
                        echo "Database Empty";
                    } ?>
            </div>

        <?php } else { ?>

            <div class="container-sm" style="text-align: center;">
                <form action="signup.php" method="post">
                    <input type="submit" value="Sign Up" name="signup-link">
                </form>
                <hr>
                <form action="scripts/login.php" method="post">
                    <input type="text" name="login-email" placeholder="Email">
                    <br>
                    <input type="password" name="login-password" placeholder="Password">
                    <br>
                    <input type="submit" name="login-submit" value="Log In">
                </form>
            </div>

        <?php } ?>

        <!-- Bootstrap Scripts -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
</html>