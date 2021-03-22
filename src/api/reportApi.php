<?php
//dies ist eine Test push
$model = new ReportModel();
if (isset($_GET["id"])) {
    foreach ($model->getReportById($_GET["id"]) as $index){
        print json_encode($index);
    }
}else{
    foreach ($model->getAllReports() as $index){
        print json_encode($index);
    }
}