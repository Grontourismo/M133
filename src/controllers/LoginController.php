<?php
$model = new UserModel();
if(isset($_GET["email"]) && isset($_GET["password"])){
    $result = $model->getReportByLogin($_GET["email"], $_GET["password"]);
    if ($result != []){
        session_start();
        $_SESSION["email"] = $_GET["email"];
        header("Location: index.html");
    }
}