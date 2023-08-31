<?php

require __DIR__ . "/validation/signup.php";
$mysqli = require __DIR__ . "/database.php";

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$password_confirmation = $_POST["password_confirmation"];

validate_name($name);
validate_email($email);
validate_password($_POST["password"]);
validate_password_confirmation($password, $password_confirmation);

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

print_r($_POST);
var_dump($password_hash);
