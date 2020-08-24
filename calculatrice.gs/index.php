<?php
require_once "function/app-function.php";
$connexion = db_connexion();
build_header("Calculatrice");
?>

<!doctype html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Jeu de Multiplication</title>

    <!-- FONT AWESOME KIT -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.css"/>
    <link rel="stylesheet" href="assets/css/style.css"/>
</head>
<body>

<div class="bnj">
    <p>
        Bonjour, pour commencer le jeu de multiplication <br><br>
        1 : Onglet enregistrement <br> Pense à t'inscrire pour suivre ton amélioration <br><br>
        2 : Onglet connexion <br> Prêt pour une amélioration <br><br>
        3 : A vous de jouer <br> Entre-nous il est question d'entrainement <br>
        <img src="https://img.icons8.com/nolan/100/medal2.png"/>
    </p>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/script.js" defer></script>
</body>
</html>

