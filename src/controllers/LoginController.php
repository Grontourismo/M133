<?php
require_once("../models/UserModel.php");

$model = new UserModel();
$loginValid = false;
session_start();
if (isset($_GET["email"]) && isset($_GET["pw"])) {
    sleep(3);
    $result = $model->getUsersForLogin();

    foreach ($result as $index) {
        if ($_GET["email"] == $index["User_email"]) {
            if (password_verify($_GET["pw"], $index["User_password"])) {
                $loginValid = true;
                $_SESSION["email"] = $_GET["email"];
                $_SESSION["pw"] = $_GET["pw"];
                print $index;
            }
        }
    }
}
if (!$loginValid) {
    $data = file_get_contents("../Logs/Logfile.txt");
    $data = $data . "\nInvalid login: email = " . $_GET['email'];
    file_put_contents("../Logs/Logfile.txt", $data);
    print "Failed";
}
