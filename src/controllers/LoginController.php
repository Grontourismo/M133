<?php
require_once("../models/UserModel.php");

$model = new UserModel();
$loginValid = false;
session_start();
if (isset($_GET["email"]) && isset($_GET["pw"])) {
    $result = $model->getUsers();

    foreach ($result as $index) {
        if ($_GET["email"] == $index["User_email"]) {
            if ($_GET["pw"] == $index["User_password"]) {
                $loginValid = true;
                $_SESSION["email"] = $_GET["email"];
                $_SESSION["pw"] = $_GET["pw"];
                return $index;
            }
        }
    }
}
if (!$loginValid) {
    return "Failed";
}
