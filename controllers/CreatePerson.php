<?php

include_once("../models/model.php");

if (!isset($_POST['name']) || !isset($_POST['surname']) || !isset($_POST['birth_place']) || !isset($_POST['birth_country'])){
    return "Cannot be empty";
}

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

echo (new OlympicsModel())->createPerson($postArr);
