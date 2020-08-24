<?php
require "function/app-function.php";
build_header("Page enregistrement");
?>

<?php
session_start();

$method = $_SERVER['REQUEST_METHOD'];

if($method==="POST" && !empty($_POST)){

    $connexion = db_connexion();

    $prenom = !empty($_POST['prenom']) ? $_POST['prenom']:'';
    $email = !empty($_POST['email']) ? $_POST['email']:'';
    $password = !empty($_POST['password']) ? $_POST['password']:'';

    $prenomValide= strlen(trim($prenom)) !== 0;
    $emailValide= filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $passwordValide= strlen(trim($password)) !== 0;

    if(!$prenomValide){
        $msgPrenom = "Le prénom est requis pour ce champ";
    }
    if(!$emailValide){
        $msgEmail = "saisie non valide";
    }
    if(!$passwordValide){
        $msgPassword = "saisie non valide";
    }


    $sql = "insert into register (prenom, email, password) values (?,?,?)";

    $req_preparee = $connexion->prepare($sql);

    try {
        $req_preparee->execute([$prenom, $email, $password]);
        header("Location:connexion.php");
    }catch (Exception $e){
        exit("<h2 class='text-danger text-center'>un probleme est survenu lors de l'execution de la requête</h2>");
    }
}

?>


<div>

    <h1>Enregistrement</h1>

    <form method="post" autocomplete="off">
        <fieldset>

            <legend>Crée votre compte</legend>

            <div class="form-group">
                <label for="prenom">Prenom</label> <br>
                <input size="40" type="text" id="prenom" placeholder="prenom" name="prenom">
            </div>

            <?php
            if (!empty($msgPrenom)){
                echo <<<EQT
            <small class="text-danger small">($msgPrenom)</small>
EQT;
            }
            ?>

            <div class="form-group">
                <label for="email">Email</label> <br>
                <input size="40" type="email" id="email" placeholder="email" name="email" required>
            </div>

            <?php
            if (!empty($msgEmail)){
                echo <<<EQT
            <small class="text-danger small">($msgEmail)</small>
EQT;
            }
            ?>

            <div class="form-group">
                <label for="password">password</label> <br>
                <input size="40" type="password" id="password" placeholder="password" name="password" required>
            </div>

            <?php
            if (!empty($msgpassword)){
                echo <<<EQT
            <small class="text-danger small">($msgpassword)</small>
EQT;
            }
            ?>

            <button type="submit" class="bg-primary text-white">Enregistrer</button>
            <button type="submit" class="bg-danger text-white">Réinitialiser</button>
            <img src="https://img.icons8.com/nolan/100/one-free.png"/>

        </fieldset>

    </form>

</div>