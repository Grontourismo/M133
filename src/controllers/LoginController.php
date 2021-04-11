<?php
require_once("../models/UserModel.php");

$model = new UserModel();
$loggedin = false;
if(isset($_GET["email"]) && isset($_GET["pw"])){

    foreach ($model->getUsers() as $user){
        if($user[3] == $_GET['email'] && $user[4] == $_GET['pw']){

            $loggedin = true;

            $result = $model->getUserByLogin($_GET["email"], $_GET["pw"]);
    
            if ($result != []){
                session_start();
                $_SESSION["email"] = $_GET["email"];
                header("Location: ../views/index.html");
            }
        }
    }
    if(!$loggedin){
        header("Location: ../views/login.html");
    }
}
