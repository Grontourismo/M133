<?php

set_error_handler(function () {
    sleep(3);
    print "Error";
});
$loginValid = false;
require_once("../models/UserModel.php");
$model = new UserModel();
session_start();
if (isset($_GET["email"]) && isset($_GET["pw"])) {
    $result = $model->getUsersForLogin();

    foreach ($result as $index) {
        if ($_GET["email"] == $index["User_email"]) {
            if (password_verify($_GET["pw"], $index["User_password"])) {
                $loginValid = true;
                $_SESSION["email"] = $_GET["email"];
                $_SESSION["pw"] = $_GET["pw"];
                print "success";
            }
        }
    }
}
if (!$loginValid) {
    sleep(3);
    $data = file_get_contents("../Logs/Logfile.txt");
    $data = $data . "\nInvalid login: email = " . $_GET['email'];
    file_put_contents("../Logs/Logfile.txt", $data);
    print "Failed";
}
restore_error_handler();
