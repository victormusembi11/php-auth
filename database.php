<?php

$hostname = "localhost";
$database = "login_db";
$username = "root";
$password = "qw3rty1234";

$mysqli = new mysqli($hostname, $username, $password, $database);

if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;
