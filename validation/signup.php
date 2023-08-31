<?php

function validate_name($name)
{
    if (empty($name)) {
        die("Name is required");
    }
}

function validate_email($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Valid email required");
    }
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

function validate_password_confirmation($password, $password_confirmation)
{
    if ($password !== $password_confirmation) {
        die("Passwords must match");
    }
}
