<?php

include_once("../models/model.php");

if (!isset($_GET['id']))
    echo (new OlympicsModel())->getOlympicWinners();
else
    echo (new OlympicsModel())->getPlacementsById($_GET['id']);

