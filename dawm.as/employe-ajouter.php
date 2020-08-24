<?php
require_once "functions/app_functions.php";

//on recupere la methode de type get
$method = $_SERVER['REQUEST_METHOD'];
//echo"<h3>$method</h3>"

//on verifie les donnée ont bien ete envoyé
if($method==="POST" && !empty($_POST)){

    $connexion = db_connexion();

    //on recupére le infos saisie par le user
    $prenom = !empty($_POST['prenom']) ? $_POST['prenom']:'';
    $ddn = !empty($_POST['ddn']) ? $_POST['ddn']:'';
    $fonction = !empty($_POST['fonction']) ? $_POST['fonction']:'';
    $email = !empty($_POST['email']) ? $_POST['email']:'';
    $salaire = !empty($_POST['salaire']) ? $_POST['salaire']:'';

    //on fait des verifications sur les saisies
    $prenomValide= strlen(trim($prenom)) !== 0;
    $fonctionValide= strlen(trim($fonction)) !== 0;
    $emailValide= filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $salaireValide= filter_input(INPUT_POST, 'salaire', FILTER_VALIDATE_INT);

    if(!$prenomValide){
        $msgPrenom = "Le prénom est requis pour ce champ";
    }

    if(!$fonctionValide){
        $msgFonction = "Le fonction est requise pour ce champ";
    }

    if(!$emailValide){
        $msgEmail = "saisie non valide";
    }

    if(!$salaireValide){
        $msgSalaire = "saisie non valide pour le champ Salaire";
    }

    if($prenomValide && $fonctionValide && $emailValide && $salaireValide){

        //connecte a la BDD
        $connexion = db_connexion();

        //Instruction sql insertion
        $sql = "insert into employes(prenom, ddn, fonction, email, salaire) values (?,?,?,?,?)";

        //on prepare la requete
        $req_preparee = $connexion->prepare($sql);

        //on execute la requete en passant les valeurs
        try {
            $req_preparee->execute([$prenom, $ddn, $fonction, $email, $salaire]);
            header("Location:employes.php");
        }catch (Exception $e){
            exit("<h2 class='text-danger text-center'>un probleme est survenu lors de l'execution de la requête</h2>");
        }
    }
}

?>

<?php build_header("Page Ajouter"); ?>

<div>

    <h1>Nouvel employé</h1>

    <form method="post" autocomplete="off">

        <div class="form-group">
            <label for="prenom">Prenom</label>
            <input type="text" class="form-control" id="prenom" placeholder="prenom" name="prenom" required>
        </div>

        <?php
        if (!empty($msgPrenom)){
            echo <<<EQT
            <small class="text-danger small">($msgPrenom)</small>
EQT;
        }
        ?>

        <div class="form-group">
            <label for="DDN">ddn</label>
            <input type=date class="form-control" id="ddn" placeholder="DDN" name="ddn" required>
        </div>

        <div class="form-group">
            <label for="fonction">Fonction</label>
            <input type="text" class="form-control" id="fonction" placeholder="fonction" name="fonction" required>
        </div>

        <?php
        if (!empty($msgFonction)){
            echo <<<EQT
            <small class="text-danger small">($msgFonction)</small>
EQT;
        }
        ?>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="email" name="email" required>
        </div>

        <?php
        if (!empty($msgEmail)){
            echo <<<EQT
            <small class="text-danger small">($msgEmail)</small>
EQT;
        }
        ?>

        <div class="form-group">
            <label for="salaire">Salaire</label>
            <input type="text" class="form-control" id="salaire" placeholder="salaire" name="salaire" required>
        </div>

        <?php
        if (!empty($msgSalaire)){
            echo <<<EQT
            <small class="text-danger small">($msgSalaire)</small>
EQT;
        }
        ?>

        <button type="submit" class="btn btn-primary">Enregistrer</button>

    </form>

</div>
