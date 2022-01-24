<?php
require_once("../models/ReportModel.php");
require_once("../models/UserModel.php");
session_start();

$model = new ReportModel;
$userModel = new UserModel();
if (isset($_GET["value"]) && isset($_GET["id"])){
    $value = strip_tags($_GET['value']);
    $id = strip_tags($_GET['id']);
    $user = $userModel->getUserByEmail($_SESSION["email"]);
    $report = $model->getReportById($id);

    if ($report->User_fk == $user->User_id) {
        $model->updateStatus($value, $id);
        header("Location: ../views/showReport.html?id=" . $id);
    }
}