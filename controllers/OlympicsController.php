<?php

include_once("../../config.php");
include_once("../models/model.php");

if (empty($username) || empty($password) || empty($servername))
    echo "Could not load config.";

$model = new OlympicsModel($username, $password, $servername);

if(!isset($_GET['id'])){
    $arr = $model->getOlympicWinners();
    echo $arr;
} else{
    $arr = $model->getPlacementsById($_GET['id']);
    echo $arr;
}


