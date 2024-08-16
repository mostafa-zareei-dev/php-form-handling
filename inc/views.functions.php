<?php
const INVALID_CLASS = 'is-invalid';

function isFullNameInvalid(): bool
{
    return isset($_SESSION['errors']['fullname']);
}

function isEmailInvalid(): bool
{
    return isset($_SESSION['errors']['email']);
}

function isPasswordInvalid(): bool
{
    return isset($_SESSION['errors']['password']);
}

function isSuccessState(): bool
{
    return isset($_SESSION['success']);
}

function successMessage(): string
{
    return isset($_SESSION['success']) ? $_SESSION['success'] : '';
}

function invalidClassSelector(): string
{
    return INVALID_CLASS;
}

function errorMessage(string $key): string
{
    return $_SESSION['errors'][$key] ?? '';
}

function inputs(string $key): string
{
    return $_SESSION['inputs'][$key] ?? '';
}
