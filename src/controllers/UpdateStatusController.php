<?php
require_once("../models/ReportModel.php");

$model = new ReportModel;
if (isset($_GET["value"]) && isset($_GET["id"])){
    $model->updateStatus($_GET["value"], $_GET["id"]);
    header("Location: ../views/showReport.html?id=".$_GET["id"]);
}