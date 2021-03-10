<?php

include_once("../models/model.php");

if (!isset($_GET['action']) || !isset($_GET['id']))
    echo "ERROR, request neobsahuje pozadovane parametre.";


if ($_GET['action'] == "update")
{
    if (!isset($_GET['name']) || !isset($_GET['surname']) || !isset($_GET['birth_day']) || !isset($_GET['birth_place']) || !isset($_GET['birth_country']))
        echo "ERROR, request neobsahuje pozadovane parametre.";
    $postArr = array("name" => $_POST['name'],
        "surname" => $_POST['surname'],
        "birth_day" => $_POST['birth_day'],
        "birth_place" => $_POST['birth_place'],
        "birth_country" => $_POST['birth_country'],
        "death_day" => $_POST['death_day'],
        "death_place" => $_POST['death_place'],
        "death_country" => $_POST['death_country']);
    echo (new OlympicsModel())->updateUserById($postArr, $_GET['id']);
    header( "Location: http://wt78.fei.stuba.sk/zadanie2/" );
} else if ($_GET['action'] == "delete")
{
    echo (new OlympicsModel())->deletePersonById($_GET['id']);
}