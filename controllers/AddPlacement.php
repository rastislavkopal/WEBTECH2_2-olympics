<?php

include_once("../../config.php");
include_once("../models/model.php");

if (empty($username) || empty($password) || empty($servername))
    echo "Could not load config.";

$model = new OlympicsModel($username, $password, $servername);


if (!isset($_POST['person_id']) || !isset($_POST['oh_id']) || !isset($_POST['placing']) || !isset($_POST['discipline'])){
    echo "Cannot be empty";
    return;
}

$postArr = array("person_id" => $_POST['person_id'],
    "oh_id" => $_POST['oh_id'],
    "placing" => $_POST['placing'],
    "discipline" => $_POST['discipline']);

$res = $model->createPlacing($postArr);
echo $res;