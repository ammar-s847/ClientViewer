<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Google Fonts --><link href="https://fonts.googleapis.com/css2?family=Roboto&family=Source+Sans+Pro&display=swap" rel="stylesheet">
        <!-- Bootstrap --><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link href="style.css" rel="stylesheet">
        <title>Sign Up | ClientViewer</title>
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
        </header>

        <style>
            form * {
                margin: 5px;
            }

            .container-sm {
                margin-top: 25px;
            }
        </style>

        <div class="container-sm" style="text-align: center;">
            <h3>Sign Up</h3>

            <form action="scripts/signup.script.php" method="post">
                <input type="text" name="f_name" placeholder="First Name" style="width: 60%;">
                <br>
                <input type="text" name="l_name" placeholder="Last Name" style="width: 60%;">
                <br>
                <input type="text" name="email" placeholder="Email" style="width: 60%;">
                <br>
                <input type="password" name="password" placeholder="Password" style="width: 60%;">
                <br>
                <input type="password" name="conf_password" placeholder="Confirm Password" style="width: 60%;">
                <br>
                <input type="submit" name="signup-submit" value="Sign Up">
            </form>
        </div>

        <!-- Bootstrap Scripts -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
</html>