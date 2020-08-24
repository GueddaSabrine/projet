<?php


/** permet de construire le haut d'une page HTML5
 * @param $titre_page
 */
function build_header($titre_page)
{
    echo <<<TAG
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/css/style.css">

<!--    font awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>

<!-- Debut NAV BAR-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <img src="https://img.icons8.com/nolan/96/calculator.png"/>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">

        <div class="navbar-nav mr-auto mt-2 mt-lg-0">
         <a class="nav-link" href="./enregistrement.php">Enregistrement</a>
         <a class="nav-link" href="./connexion.php">Connexion</a>
        </div>

        <div class="navbar-nav form-inline my-2 my-lg-0">
        <a class="nav-link" href="./calculatrice.php">Calculatrice</a>
        <a class="nav-link" href="./deconnexion.php">Deconnexion</a>
        </div>

    </div>

</nav>
<!--Fin nav bar-->
TAG;

}

function db_connexion()
{
    $database = "calculatrice";
    $user = "root";
    $pass = "";
    $url = "mysql:host=127.0.0.1;dbname=$database;charset=utf8";

    try {
        $connexion = new PDO($url, $user, $pass);
        $connexion->exec("set lc_time_names='fr_FR'");
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connexion;
    } catch (PDOException $e) {
        exit($e->getMessage());
    }
}


