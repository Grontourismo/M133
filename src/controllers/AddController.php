<?php
require_once("../models/ReportModel.php");
require_once("../models/UserModel.php");

$model = new ReportModel;
$userModel = new UserModel();
session_start();
if (isset($_POST['submit']) && isset($_POST['title']) && isset($_POST['comment']) && isset($_POST['lat']) && isset($_POST['lng'])) {


    $title = strip_tags($_POST['title']);
    $comment = strip_tags($_POST['comment']);
    $lat = strip_tags($_POST['lat']);
    $lng = strip_tags($_POST['lng']);
    $uploadFile = strip_tags($_POST['uploadfile']);


    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "../report-img/" . $filename;

    $users = $userModel->getUserByEmail($_SESSION["email"]);

    $user_fk = null;
    foreach ($users as $user) {
        $user_fk = $user["User_id"];
    }

    $model->addReportToDB($title, $comment, $lat, $lng, $filename, $user_fk);

    move_uploaded_file($tempname, $folder);

    header("Location: ../views/home.html");
}