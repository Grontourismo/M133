<?php
require_once("../models/ReportModel.php");

$model = new ReportModel;
if (isset($_POST['submit'])) {

	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "../report-img/".$filename;

    print $_POST["title"]. $_POST["comment"]. $_POST["lat"]. $_POST["lng"]. $filename;

	$model->addReportToDB($_POST["title"], $_POST["comment"], $_POST["lat"], $_POST["lng"], $filename);

	move_uploaded_file($tempname, $folder);

	header("Location: ../views/index.html");
}