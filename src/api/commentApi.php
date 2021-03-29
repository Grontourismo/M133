<?php
$model = new CommentModel();
if($_GET["reportID"]){
    foreach ($model->getCommentByReportID($_GET["reportID"]) as $index){
        print json_encode($index);
    }
}