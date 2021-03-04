<!doctype  html>
<html lang="sk">
<head>
    <title>Zadanicko 2</title>
    <meta charset="utf-8">
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>
<body>

<nav class="navbar navbar-dark navbar-expand-lg bg-dark py-4">
    <a class="navbar-brand mb-0 h1 ml-2" href="http://wt78.fei.stuba.sk/zadanie2/">Domov</a>
</nav>

<?php

include_once("../../config.php");
include_once("../models/model.php");

if (empty($username) || empty($password) || empty($servername))
    echo "Could not load config.";

$model = new OlympicsModel($username, $password, $servername);

$person = $model->getUserData($_GET['id']);
?>


<div class="container">
    <div class="row">
        <div class="col col-lg-8 px-2 py-2">
            <h1 id="personProfile" class="display-5 mx-auto">Profil športovca s ID: <?php echo $person['id'] ?> </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-3 py-4">
            <img src="https://i.ibb.co/D9VBcQd/american-football.png" alt="avatar" width="200" height="200">
        </div>
        <div class="col-6 py-4">
            <b>meno:</b> <?php echo $person['name'] ?><br>
            <b>priezvisko:</b>  <?php echo $person['surname'] ?><br>
            <b>datum narodenia:</b>  <?php echo $person['birth_day'] ?><br>
            <b>miesto narodenia:</b>  <?php echo $person['birth_place'] ?><br>
            <b>krajina narodenia:</b>  <?php echo $person['birth_country'] ?><br>
            <?php if(!empty($person['death_day'])) {
                echo "<b>datum umrtia:</b>" . $person['death_day'] . "<br>";
                echo "<b>miesto umrtia:</b> " . $person['death_place'] . "<br>";
                echo "<b>krajina umrtia:</b> " . $person['death_country'] . "<br>";
            }
            ?>

        </div>
    </div>
</div>


<!--GENERATE TABLE WITH DATATABLES-->
<div id="table_div">
    <table id="table_user_profile"></table>
</div>


<?php include('./footer.php') ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
<!--<script src="./assets/js/myscript.js"></script>-->
<script src="../assets/js/userProfile.js"></script>
</body>
</html>