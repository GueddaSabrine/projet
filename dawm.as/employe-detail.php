<?php
require_once "functions/app_functions.php";

$connexion = db_connexion();
$id = htmlspecialchars($_GET['id']);
$sql = "select * from employes where id = ?";
$req_preparee = $connexion->prepare($sql);
$req_preparee->execute([$id]);
$employe = $req_preparee->fetch(PDO::FETCH_ASSOC);

if (empty($employe)) {
    header("Location:employes.php");
    exit();
}

?>


<?php build_header("Page Details"); ?>

<div>

    <h1>Détails employé</h1>
    <div class="col-7">
        <p class="prenom"><?php echo "Prénom : " . $employe['prenom'] ?? ''; ?></p>
        <p class="date"><?php echo strtoupper($employe['ddn']). " son jour d'anniversaire" ?? ''; ?></p>
        <p class="texte"><?php echo strtoupper($employe['fonction']). " de l'entreprise"  ?? ''; ?></p>
        <p class="email"><?php echo strtoupper($employe['email']) ?? ''; ?></p>
        <p class="salaire"><?php echo strtoupper($employe['salaire']). " en Euros et par mois " ?? ''; ?></p>
    </div>