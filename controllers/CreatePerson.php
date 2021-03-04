<?php

include_once("../../config.php");
include_once("../models/model.php");

if (empty($username) || empty($password) || empty($servername))
    echo "Could not load config.";

$model = new OlympicsModel($username, $password, $servername);

$postArr = array("name" => $_POST['name'],
    "surname" => $_POST['surname'],
    "birth_place" => $_POST['birth_place'],
    "birth_country" => $_POST['birth_country'],
    "death_place" => $_POST['death_place'],
    "death_country" => $_POST['death_country']);

if (!empty($_POST['death_day'])){
    $postArr['death_day'] = date('d.m.Y', strtotime($_POST['death_day']));
}else {
    $postArr['death_day'] = null;
}

$postArr['birth_day'] = date('d.m.Y', strtotime($_POST['birth_day']));

$res = $model->createPerson($postArr);
echo $res;
