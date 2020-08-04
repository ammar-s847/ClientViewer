<?php

define(SERVER, '');
define(DATABASE, '');
define(USERNAME, '');
define(PASSWORD, '');

$conn = new mysqli(SERVER, USERNAME, PASSWORD, DATABASE);

if ($conn->connect_errno) {
    die("MySQL connection Error: " . $conn->connect_error);
}

$ADMIN_ID = ''; /* Enter the ID (from the database user_id section) of the Admin user. */

?>