<?php
// TODO remove
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!doctype  html>
<html lang="sk">
<head>
    <title>Zadanicko 2</title>
    <meta charset="utf-8">
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
</head>
<body>

<nav class="navbar navbar-dark navbar-expand-lg bg-dark py-4">
    <a class="navbar-brand mb-0 h1 ml-2" href="http://wt78.fei.stuba.sk/zadanie2/">Domov</a>

    <ul class="navbar-nav mr-auto mx-4">
        <li class="nav-item">
            <a class="nav-link" href="#" onclick="showTopTen()">TOP 10</a>
        </li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
        <li>
            <div id="navbar_upload" class="btn-nav" onclick="showAddForm()"><a class="btn btn-primary btn-small navbar-btn mx-3 py-2">PRIDAJ</a>
            </div>
        </li>
    </ul>
</nav>


<!-- ADD NEW DATA FORM-->
<div id="uploader_div">
    <!-- Choose action   -->
    <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="selectedAddPerson" checked>
        <label class="form-check-label" for="selectedAddPerson">
            Pridať osobu
        </label>
    </div>
    <div class="form-check mb-1">
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="selectedAddPlacement">
        <label class="form-check-label" for="selectedAddPlacement">
            Pridať umiestnenie pre osobu
        </label>
    </div>

    <div id="divAddPerson">
        <form class="my-5 mx-5" action="http://wt78.fei.stuba.sk/zadanie2/controllers/CreatePerson.php" method="post">
            <div class="row">
                <div class="col">
                    <label for="name">Krstné meno</label>
                    <input type="text" class="form-control" placeholder="Meno" name="name" id="name" required >
                </div>
                <div class="col">
                    <label for="surname">Priezvisko</label>
                    <input type="text" class="form-control" placeholder="Priezvisko" name="surname" id="surname" required>
                </div>
            </div>

            <!--  BIRTH INFO  -->
            <div class="row my-3">
                <div class="col">
                    <label for="birth_day" class="col-form-label">Dátum narodenia</label>
                    <input class="form-control" type="date" id="birth_day" name="birth_day" >
                </div>
            </div>

            <div class="row my-3">
                <div class="col">
                    <label for="birth_place">Mesto narodenia</label>
                    <input type="text" class="form-control" placeholder="Mesto"  name="birth_place" id="birth_place" required>
                </div>
                <div class="col">
                    <label for="birth_country">Krajina narodenia</label>
                    <input type="text" class="form-control" placeholder="Krajina" name="birth_country" id="birth_country" required>
                </div>
            </div>


            <div class="row my-5">
                <div class="col-12">
                    <label for="death_day" class="col-form-label">Dátum úmrtia</label>
                    <input class="form-control" type="date" id="death_day"  name="death_day">
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="death_place">Mesto úmrtia</label>
                    <input type="text" class="form-control" placeholder="Mesto" name="death_place" id="death_place">
                </div>
                <div class="col">
                    <label for="death_country">Krajina úmrtia</label>
                    <input type="text" class="form-control" placeholder="Krajina" name="death_country" id="death_country">
                </div>
            </div>

            <button type="submit" class="btn btn-primary my-2" name="submit" id="post-createUser">Odoslať</button>
        </form>
    </div>

    <div id="divAddPlacement">
<?php

    include_once("../config.php");
    include_once("./models/model.php");

    if (empty($username) || empty($password) || empty($servername))
        echo "Could not load config.";

    $model = new OlympicsModel($username, $password, $servername);

    $persons = $model->getPersons_id_name_surname();
    $olympics = $model->getOlympics_id_type_year();
?>
        <form class="my-5 mx-5" id="formAddPlacement">
            <div class="form-group">
                <label for="person_id">Výber osoby</label>
                <select class="form-control" name="person_id" id="person_id">
                    <?php
                        foreach ($persons as $key => $value){
                            echo "<option value='" . $value['id'] . "'>" . $value['name'] . ' ' . $value['surname'] ."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="oh_id">výber olympiády</label>
                <select class="form-control" name="oh_id" id="oh_id">
                    <?php
                    foreach ($olympics as $key => $value){
                        echo "<option value='" . $value['id'] . "'>" . $value['type'] . ' - ' . $value['year'] ."</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="row">
                <div class="col">
                    <label for="placing">Umiestnenie</label>
                    <input type="number" class="form-control" placeholder="Umiestnenie" name="placing" id="placing" min="1" max="9999" required >
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="discipline">Disciplína</label>
                    <input type="text" class="form-control" placeholder="Disciplína" name="discipline" id="discipline" required >
                </div>
            </div>

            <button type="button" class="btn btn-primary my-2" id="post-btnCreatePlacement" onclick="createPlacement()">Odoslať</button>
        </form>
    </div>
</div>


<!--GENERATE TABLE WITH DATATABLES-->
<div id="table_div">
    <table id="table_id" class="display"></table>
</div>


<footer id="indexFooter" class="text-center text-white bg-dark py-3">
    <div class="text-center p-3 bg-dark">
        © 2021 Copyright:
        <a class="text-white" href="https://mdbootstrap.com/">Rastislav Kopál</a>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
<script src="./assets/js/myscript.js"></script>
</body>
</html>