<?php
require_once("../models/UserModel.php");
require_once("../models/CommentModel.php");
$model = new CommentModel();
$userModel = new UserModel();
session_start();
if (isset($_GET["comment"]) && isset($_GET["report_id"]) && isset($_GET["user_email"])){
    if ($_GET["user_email"] == $_SESSION["email"]) {

        $comment = strip_tags($_GET['comment']);
        $report_id = strip_tags($_GET['report_id']);
        $user_email = strip_tags($_GET['user_email']);

        $users = $userModel->getUserByEmail($_SESSION["email"]);

        $user_fk = null;
        foreach ($users as $user) {
            $user_fk = $user["User_id"];
        }

        $model->addCommentToDB($comment, $user_fk, $report_id);

        header("Location: ../views/showReport.html?id=" . $report_id);
    }else{
        header("Location: ../../index.html");
    }
}