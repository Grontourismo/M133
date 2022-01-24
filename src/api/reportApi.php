<?php
require_once("../models/ReportModel.php");
require_once("../models/UserModel.php");
$userModel = new UserModel();
$model = new ReportModel();
session_start();
if (isset($_GET["id"])) {
    $array = [];
    foreach ($model->getReportById($_GET["id"]) as $index) {
        array_push($array, $index);
    }
    print json_encode($array);
} else {
    $array = [];
    foreach ($model->getAllReports() as $index) {
        array_push($array, $index);
    }
    print json_encode($array);
}