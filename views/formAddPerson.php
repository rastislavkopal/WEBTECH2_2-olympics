<div id="divAddPerson">
    <form class="my-3 mx-3" id="formAddPerson">
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

    <hr>

        <div class="row my-3">
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