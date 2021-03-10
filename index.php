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

<?php include('./views/header.php') ?>


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
<!--        <form class="my-5 mx-5" action="http://wt78.fei.stuba.sk/zadanie2/controllers/CreatePerson.php" method="post">-->
        <form class="my-5 mx-5" id="formAddPerson">
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

            <button type="button" class="btn btn-primary my-2" id="post-btnCreatePerson" onclick="createPerson()">Odoslať</button>
        </form>
    </div>

    <div id="divAddPlacement">
<?php

    include_once("./models/model.php");

    $model = new OlympicsModel();

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


<?php include('./views/footer.php') ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
<script src="./assets/js/myscript.js"></script>
</body>
</html>