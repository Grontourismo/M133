<?php
require_once("../models/UserModel.php");

$model = new UserModel();
$loginValid = false;
if (isset($_POST["email"]) && isset($_POST["pw"])) {
    $result = $model->getUsers();

    foreach ($result as $index) {
        if ($_POST["email"] == $index["User_email"]) {
            if ($_POST["pw"] == $index["User_password"]) {
                $loginValid = true;
                session_start();
                $_SESSION["email"] = $_GET["email"];
                header("Location: ../views/index.html");
            }
        }
    }
}
if (!$loginValid) {
    header("Location: ../views/login.html");
}
