<?php
require_once("../models/ReportModel.php");
require_once("../models/UserModel.php");

$model = new ReportModel;
$userModel = new UserModel();
session_start();
if (isset($_POST['submit'])) {

	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "../report-img/".$filename;

	$users = $userModel->getUserByEmail($_SESSION["email"]);

	$user_fk = null;
	foreach ($users as $user){
	    $user_fk = $user["User_id"];
    }

	$model->addReportToDB($_POST["title"], $_POST["comment"], $_POST["lat"], $_POST["lng"], $filename, $user_fk);

	move_uploaded_file($tempname, $folder);

	header("Location: ../views/index.html");
}