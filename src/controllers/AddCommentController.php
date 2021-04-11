<?php
require_once("../models/UserModel.php");
require_once("../models/CommentModel.php");
$model = new CommentModel();
$userModel = new UserModel();
session_start();
if (isset($_GET["comment"]) && isset($_GET["report_id"])){
    strip_tags($_GET["comment"]);
    strip_tags($_GET["report_id"]);

    $users = $userModel->getUserByEmail($_SESSION["email"]);

    $user_fk = null;
    foreach ($users as $user){
        $user_fk = $user["User_id"];
    }

    $model->addCommentToDB($_GET["comment"], $user_fk, $_GET["report_id"]);

    header("Location: ../views/showReport.html?id=".$_GET["report_id"]);
}