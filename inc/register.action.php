<?php
include BASE_PATH . "/inc/validation.php";
include BASE_PATH . "/inc/functions.php";
include BASE_PATH . "/inc/users.functions.php";

$registerFormUrl = $_SERVER['REQUEST_URI'];

if (isRegistrationRequestValid()) {
    if (isRegistrationRequestMethodValid()) {
        if (isUserSubmittedValidInputs()) {
            $validationErrors = validateRegisterFormInputs($_POST['fullname'], $_POST['email'], $_POST['password']);

            if (count($validationErrors) > 0) {
                setUserRegistrationErrorsState($validationErrors);
                setTemporaryUserRegistrationInputs();

                redirect($registerFormUrl);
            }

            insertUserToDB();

            destroyUserRegistrationErrorsState();
            destroyUserRegistrationInputs();

            setUserRegistrationSuccessState();
            redirect($registerFormUrl);
        } else {
            redirect($registerFormUrl);
        }
    } else {
        redirect($registerFormUrl);
    }
} else {
    redirect($registerFormUrl);
}
