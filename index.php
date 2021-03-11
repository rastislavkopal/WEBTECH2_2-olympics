<!doctype  html>
<html lang="sk">
<head>
    <title>Zadanicko 2</title>
    <meta charset="utf-8">
    <meta name="description" content="Webtech assignment 2021 FEI STU">
    <meta name="author" content="Rastislav Kopál">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
</head>
<body>

<?php include('./views/header.php') ?>


<!-- ADD NEW DATA FORM-->
<div id="uploader_div">
    <!-- Choose action   -->
    <div class="btn-group btn-group-toggle form-check" data-toggle="buttons">
        <label class="btn btn-outline-primary active mr-2 px-5">
            <input type="radio" name="options" id="selectedAddPerson" class="form-check-input" checked> Pridať osobu
        </label>
        <label class="btn btn-outline-primary mx-2 px-4">
            <input type="radio" name="options" id="selectedAddPlacement" class="form-check-input"> Pridať umiestnenie
        </label>
    </div>

    <?php include('./views/formAddPerson.php') ?>

    <?php include('./views/formAddPlacing.php') ?>

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