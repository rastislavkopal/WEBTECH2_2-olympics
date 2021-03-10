<?php

include_once("../models/model.php");

if (!isset($_POST['person_id']) || !isset($_POST['oh_id']) || !isset($_POST['placing']) || !isset($_POST['discipline'])){
    return "Cannot be empty";
}

$postArr = array("person_id" => $_POST['person_id'],
    "oh_id" => $_POST['oh_id'],
    "placing" => $_POST['placing']);

echo (new OlympicsModel())->createPlacing($postArr, $_POST['discipline']);