<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once("../models/model.php");

if (!isset($_GET['id']))
    echo (new OlympicsModel())->getOlympicWinners();
else
    echo (new OlympicsModel())->getPlacementsById($_GET['id']);

