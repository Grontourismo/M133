<?php
require_once("../models/ReportModel.php");

$model = new ReportModel;
if (isset($_POST['submit'])) {

	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "../report-img/".$filename;

	$model->addReportToDB($_POST["title"], $_POST["comment"], $_POST["lat"], $_POST["lng"], $filename);

	if (move_uploaded_file($tempname, $folder)) {
		$msg = "Image uploaded successfully";
	}else{
		$msg = "Failed to upload image";
	}
}