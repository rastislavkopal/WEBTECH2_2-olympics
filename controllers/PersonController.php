<?php

include_once("../../config.php");
include_once("../models/model.php");

if (empty($username) || empty($password) || empty($servername))
    echo "Could not load config.";

$model = new OlympicsModel($username, $password, $servername);

if (!isset($_GET['action']) || !isset($_GET['id'])) {
    echo "ERROR, request neobsahuje pozadovane parametre.";
}

if ($_GET['action'] == "update")
{
    $postArr = array("name" => $_POST['name'],
        "surname" => $_POST['surname'],
        "birth_day" => $_POST['birth_day'],
        "birth_place" => $_POST['birth_place'],
        "birth_country" => $_POST['birth_country'],
        "death_day" => $_POST['death_day'],
        "death_place" => $_POST['death_place'],
        "death_country" => $_POST['death_country']);
    echo $model->updateUserById($postArr, $_GET['id']);
    header( "Location: http://wt78.fei.stuba.sk/zadanie2/" );
} else if ($_GET['action'] == "delete")
{
    echo $model->deletePersonById($_GET['id']);
}