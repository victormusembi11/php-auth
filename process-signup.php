<?php

// Validate name
if (empty($_POST["name"])) {
    die("Name is required");
}

// Validate email address
if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email required");
}

function validate_password($password)
{
    if (strlen($password) < 8) {
        die("Password must be at least 8 characters");
    }

    if (!preg_match("/[a-z]/i", $password)) {
        die("Password must contain at least one letter");
    }

    if (!preg_match("/[0-9]/", $password)) {
        die("Password must contain at least one number");
    }
}

validate_password($_POST["password"]);

// Validate confirmation password
if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}

print_r($_POST);