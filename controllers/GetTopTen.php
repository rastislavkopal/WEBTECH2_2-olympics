<?php

include_once("../models/model.php");

echo (new OlympicsModel())->getTopTen();