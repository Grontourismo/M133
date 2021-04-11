<?php
require_once("../models/UserModel.php");

$model = new UserModel();
$loginValid = false;
session_start();
if (isset($_POST["email"]) && isset($_POST["pw"])) {
    strip_tags($_POST["email"]);
    strip_tags($_POST["pw"]);
    $result = $model->getUsers();

    foreach ($result as $index) {
        if ($_POST["email"] == $index["User_email"]) {
            if ($_POST["pw"] == $index["User_password"]) {
                $loginValid = true;
                $_SESSION["email"] = $_POST["email"];
                header("Location: ../views/home.html");
            }
        }
    }
}
if (!$loginValid) {
    header("Location: ../views/index.html");
}
