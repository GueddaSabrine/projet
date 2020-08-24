<?php
require_once "function/app-function.php";
build_header("Calculatrice");
$connexion = db_connexion();
?>

<div class="container">
    <div class="monForm">
        <div class="titreForm"></div>
        <h1> <img class="image" src="https://img.icons8.com/nolan/100/statistics.png"/> <br>
            Le jeu de multiplication </h1>
        <form id="mon_form">
            <input id="id" type="hidden" name="id">
            <div class="form-group">
                <h2>Voici votre défi du jour</h2>
                <div class="ligne">
                    valeur 1 : <input type="number" id="v1" placeholder="note un nombre">
                </div>
                <br>
                <div class="ligne">
                    valeur 2 : <input type="number" id="v2" placeholder="note un nombre">
                </div>
                <br>
                <div class="ligne">
                    résultat : <input type="number" id="resultat" placeholder="Et le tour est joué">
                </div>
                <br>
                <div class="ligne">
                    <button type="button" id="bouton-multiplication">multiplication</button>
                </div>
                <script>
                    document.getElementById('bouton-multiplication').onclick = function () {
                        v1 = document.getElementById('v1').value;
                        v2 = document.getElementById('v2').value;
                        resultat = parseFloat(v1) * parseFloat(v2);
                        document.getElementById('resultat').value = resultat;
                    };
                </script>
        </form>
    </div>

    <div class="calculatrice">
        <table class="table">
            <thead class="text-center">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Multiplication</th>
                <th scope="col">Reponse</th>
                <th scope="col">Correct</th>
            </tr>
            </thead>
        </table>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/script.js" defer></script>

