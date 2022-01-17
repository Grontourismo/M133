<?php
require_once("../models/ReportModel.php");
require_once("../models/UserModel.php");
session_start();

$model = new ReportModel;
$userModel = new UserModel();
if (isset($_GET["value"]) && isset($_GET["id"])){
    $user = $userModel->getUserByEmail($_SESSION["email"]);
    $report = $model->getReportById($_GET["id"]);

    if ($report->User_fk == $user->User_id) {
        $model->updateStatus($_GET["value"], $_GET["id"]);
        header("Location: ../views/showReport.html?id=" . $_GET["id"]);
    }
}