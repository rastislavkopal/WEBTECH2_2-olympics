<?php
// TODO remove
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>


<!doctype  html>
<html lang="sk">
<head>
    <title>DirOps</title>
    <meta charset="utf-8">
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
</head>
<body>

<nav class="navbar navbar-dark bg-dark py-4">
    <a class="navbar-brand mb-0 h1 ml-2" href="http://wt78.fei.stuba.sk/zadanie2/">Domov</a>
<!--    <ul class="nav navbar-nav navbar-right">-->
<!--        <li>-->
<!--            <div id="navbar_upload" class="btn-nav"><a class="btn btn-primary btn-small navbar-btn mx-3 py-2" onclick="showUploadForm()">UPLOAD</a>-->
<!--            </div>-->
<!--        </li>-->
<!--    </ul>-->
</nav>

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