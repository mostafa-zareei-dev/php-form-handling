<?php

const FULL_NAME_REQUIRED = "please enter your fullname!";
const EMAIL_REQUIRED = "please enter your email address!";
const EMAIL_INVALID = "please enter correct email address!";
const PASSWORD_REQUIRED = "please enter your password!";

function validateRegisterFormInputs(string $fullname, string $email, string $password): array
{
    $errors = [];

    $fullname = trim(htmlspecialchars(strip_tags($fullname)));

    if (empty($fullname)) {
        $errors['fullname'] = FULL_NAME_REQUIRED;
    }

    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    if (!$email) {
        $errors['email'] = EMAIL_REQUIRED;
    } else {
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);

        if (!$email) {
            $errors['email'] = EMAIL_INVALID;
        }
    }

    $password = trim($password);

    if (empty($password)) {
        $errors['password'] = PASSWORD_REQUIRED;
    }

    return $errors;
}
