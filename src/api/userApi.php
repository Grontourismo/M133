<?php
require_once("../models/UserModel.php");
$model = new UserModel();
if (isset($_GET["user_email"])) {
    $array = [];
    foreach ($model->getUserByEmail($_GET["user_email"]) as $index){
        array_push($array, $index);
    }
    print json_encode($array);
}else{
    $array = [];
    foreach ($model->getUsers() as $index){
        array_push($array, $index);
    }
    print json_encode($array);
}