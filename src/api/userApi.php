<?php
$model = new UserModel();
if(isset($_GET["user_email"]) && isset($_GET["password"])){
    foreach ($model->getReportByLogin($_GET["user_email"], $_GET["password"]) as $index){
        print json_encode($index);
    }
}
else if (isset($_GET["user_email"])) {
    foreach ($model->getReportByEmail($_GET["user_email"]) as $index){
        print json_encode($index);
    }
}