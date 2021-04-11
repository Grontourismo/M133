<?php
require_once("../models/ReportModel.php");
require_once("../models/UserModel.php");

$model = new ReportModel;
$userModel = new UserModel();
session_start();
if (isset($_POST['submit']) && isset($_POST['title']) && isset($_POST['comment']) && isset($_POST['lat']) && isset($_POST['lng']) && isset($_POST['uploadfile'])) {

	if(is_numeric($_POST['lat']) && is_numeric($_POST['lng'])){

		if ($_POST['lat'] >= -90 && $_POST['lat'] <= 90 && $_POST['lng'] >= -180 && $_POST['lat'] <= 180){

			strip_tags($_POST['title']);
			strip_tags($_POST['comment']);
			strip_tags($_POST['lat']);
			strip_tags($_POST['lng']);
			strip_tags($_POST['uploadfile']);


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

			header("Location: ../views/home.html");
		}
	}
}