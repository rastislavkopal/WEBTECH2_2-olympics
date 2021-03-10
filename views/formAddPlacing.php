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