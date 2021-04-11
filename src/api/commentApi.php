<?php
require_once("../models/CommentModel.php");
$model = new CommentModel();
if(isset($_GET["reportID"])){
    $array = [];
    foreach ($model->getCommentByReportID($_GET["reportID"]) as $index){
        array_push($array, $index);
    }
    print json_encode($array);
}