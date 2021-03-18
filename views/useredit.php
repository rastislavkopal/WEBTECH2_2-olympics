<?php
include_once("../models/model.php");

if (!isset($_GET['id']))
    echo "ERROR, request neobsahuje pozadovane parametre.";

$arr = (new OlympicsModel())->getUserData($_GET['id']);

// change dates into
$date = str_replace('/', '-', $arr['birth_day']);
$arr['birth_day'] = date('Y-m-d', strtotime($date));

if ($arr['death_day'] != null){
    $date = str_replace('/', '-', $arr['death_day']);
    $arr['death_day'] = date('Y-m-d', strtotime($date));
}

?>

<!doctype  html>
<html lang="sk">
<head>
    <title>Edit user</title>
    <meta charset="utf-8">
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>
<body>

<nav class="navbar navbar-dark navbar-expand-lg bg-dark py-3 sticky-top">
    <a class="navbar-brand mb-0 h1 ml-2" href="https://wt78.fei.stuba.sk/zadanie2/">Domov</a>
</nav>

<form class="my-5 mx-5 pb-5" action="https://wt78.fei.stuba.sk/zadanie2/controllers/PersonController.php?action=update&id=<?php echo $arr['id'] ?>" method="post">
    <h3 id="id">ID: <?php echo $arr['id'] ?></h3><br>
    <div class="row">
        <div class="col">
            <label for="name">Krstné meno</label>
            <input type="text" class="form-control" placeholder="Meno" name="name" id="name" required value="<?php echo $arr['name'] ?>">
        </div>
        <div class="col">
            <label for="surname">Priezvisko</label>
            <input type="text" class="form-control" placeholder="Priezvisko" name="surname" id="surname" required value="<?php echo $arr['surname'] ?>">
        </div>
    </div>

<!--  BIRTH INFO  -->
    <div class="row my-3">
        <div class="col">
            <label for="birth_day" class="col-form-label">Dátum narodenia</label>
            <input class="form-control" type="date" id="birth_day" name="birth_day" value="<?php echo $arr['birth_day'] ?>">
        </div>
    </div>

    <div class="row my-3">
        <div class="col">
            <label for="birth_place">Mesto narodenia</label>
            <input type="text" class="form-control" placeholder="Mesto"  name="birth_place" id="birth_place" required value="<?php echo $arr['birth_place'] ?>">
        </div>
        <div class="col">
            <label for="birth_country">Krajina narodenia</label>
            <input type="text" class="form-control" placeholder="Krajina" name="birth_country" id="birth_country" required value="<?php echo $arr['birth_country'] ?>">
        </div>
    </div>


    <div class="row my-5">
        <div class="col-12">
            <label for="death_day" class="col-form-label">Dátum úmrtia</label>
            <input class="form-control" type="date" id="death_day"  name="death_day" value="<?php echo $arr['death_day'] ?>">
        </div>
    </div>
    <div class="row my-3">
        <div class="col">
            <label for="death_place">Mesto úmrtia</label>
            <input type="text" class="form-control" placeholder="Mesto" name="death_place" id="death_place" value="<?php echo $arr['death_place'] ?>">
        </div>
        <div class="col">
            <label for="death_country">Krajina úmrtia</label>
            <input type="text" class="form-control" placeholder="Krajina" name="death_country" id="death_country" value="<?php echo $arr['death_country'] ?>">
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Odoslať</button>
</form>

<?php include('./footer.php') ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
<script src="../assets/js/myscript.js"></script>
</body>
</html>