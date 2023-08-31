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

function create_account($mysqli, $name, $email, $password_hash)
{
    $sql = "INSERT INTO user (name, email, password_hash) VALUES (?, ?, ?)";

    $stmt = $mysqli->stmt_init();

    if (!$stmt->prepare($sql)) {
        die("SQL error: " . $mysqli->error);
    }

    $stmt->bind_param("sss", $name, $email, $password_hash);

    if ($stmt->execute()) {
        header("Location: signup-success.html");
        exit;
    } else {
        if ($mysqli->errno === 1062) {
            die("Email already taken");
        } else {
            die($mysqli->error . " " . $mysqli->errno);
        }
    }
}

create_account($mysqli, $name, $email, $password_hash);

print_r($_POST);
var_dump($password_hash);
