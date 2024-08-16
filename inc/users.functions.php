<?php
include BASE_PATH . '/inc/constants.php';

function isRegistrationRequestValid(): bool
{
    return isset($_POST['submit']) && $_POST['submit'] === BTN_REGISTER_VALUE;
}

function isRegistrationRequestMethodValid(): bool
{
    return strtoupper($_SERVER['REQUEST_METHOD']) === VALID_REQUEST_METHOD;
}

function isUserSubmittedValidInputs(): bool
{
    return filter_has_var(INPUT_POST, FULL_NAME_FIELD_KEY) && filter_has_var(INPUT_POST, EMAIL_FIELD_KEY) && filter_has_var(INPUT_POST, PASSWORD_FIELD_KEY);
}

function passwordHash(string $password): string
{
    return password_hash($password, PASSWORD_BCRYPT);
}

function createAnArrayOfUserRegistrationInputs(): array
{
    return [
        FULL_NAME_FIELD_KEY => $_POST['fullname'],
        EMAIL_FIELD_KEY => $_POST['email'],
        PASSWORD_FIELD_KEY => $_POST['password'],
    ];
}

function insertUserToDB(): void
{
    $inputs = createAnArrayOfUserRegistrationInputs();

    $inputs[PASSWORD_FIELD_KEY] = passwordHash($inputs[PASSWORD_FIELD_KEY]);

    $connection = include BASE_PATH . "inc/db.php";
    $query = "INSERT INTO users (full_name, email, password) VALUES(:fullname, :email, :password)";
    $statement = $connection->prepare($query);
    $statement->execute($inputs);
}

function setUserRegistrationErrorsState(array $errors)
{
    $_SESSION[ERROR_SESSION_KEY] = $errors;
}

function setTemporaryUserRegistrationInputs()
{
    $_SESSION[INPUT_SESSION_KEY] = createAnArrayOfUserRegistrationInputs();
}

function destroyUserRegistrationErrorsState()
{
    $_SESSION[ERROR_SESSION_KEY] = null;
}


function destroyUserRegistrationInputs()
{
    $_SESSION[INPUT_SESSION_KEY] = [];
}

function setUserRegistrationSuccessState()
{
    $_SESSION[SUCCESS_SESSION_KEY] = SUCCESS_MESSAGE;
}
