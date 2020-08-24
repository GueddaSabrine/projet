<?php
require_once "functions/app_functions.php";

$method = $_SERVER['REQUEST_METHOD'];

if($method==="GET" && empty($_GET['id'])){
    $id = $_GET['id'];

    $sql = "select * from employes where id = ?";

    $connexion = db_connexion();

    $req_preparee = $connexion->prepare($sql);
    $req_preparee->execute([$id]);
    $employe = $req_preparee->fetch(PDO::FETCH_ASSOC);


    if (!$employe){
        header("Location:employes.php");
    }
}

if($method==="GET" && !empty($_GET['id'])){
    $id = $_GET['id'];

    $sql = "select * from employes where id = ?";

    $connexion = db_connexion();

    $req_preparee = $connexion->prepare($sql);
    $req_preparee->execute([$id]);
    $employe = $req_preparee->fetch(PDO::FETCH_ASSOC);


    if (!$employe){
        header("Location:employes.php");
    }
}

$prenom ='';
$ddn ='';
$fonction ='';
$email ='';
$salaire ='';

if($method==="POST" && !empty($_POST)){

    $connexion = db_connexion();

    //on recupére le infos saisie par le user
    $id = !empty($_POST['id']) ? $_POST['id']:'';
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
        $sql = "update employes set prenom=?, ddn=?, fonction=?, email=?, salaire=? where id=?";
        //on prepare la requete
        $req_preparee = $connexion->prepare($sql);
        //on execute la requete en passant les valeurs
        $req_preparee->execute([$prenom, $ddn, $fonction, $email, $salaire, $id]);
        header("Location:employes.php");
        exit();
    }
}

?>

<?php build_header("page modifier"); ?>


<div>

    <h1>Modifier employé</h1>

    <form method="post" autocomplete="off">
        <input type="hidden" name="id" value="<?php
        if (!empty($employe['id'])){
            $id = $employe['id'];
        }
        echo $id;
        ?>">


        <div class="form-group">
            <label for="prenom">Prenom</label>
            <input type="text" class="form-control" id="prenom"
                   placeholder="prenom" name="prenom" required
                   value="<?php
                   if (!empty($employe['prenom'])){
                       $id = $employe['prenom'];
                   }
                   echo $prenom;
                   ?>">
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
            <input type=date class="form-control" id="ddn" placeholder="DDN"
                   name="ddn" required
                   value="<?php
                   if (!empty($employe['ddn'])){
                       $id = $employe['ddn'];
                   }
                   echo $ddn;
                   ?>">
        </div>

        <div class="form-group">
            <label for="fonction">Fonction</label>
            <input type="text" class="form-control" id="fonction"
                   placeholder="fonction" name="fonction" required
                   value="<?php
                   if (!empty($employe['fonction'])){
                       $id = $employe['fonction'];
                   }
                   echo $fonction;
                   ?>">
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
            <input type="email" class="form-control"
                   id="email" placeholder="email" name="email"
                   required value="<?php
            if (!empty($employe['email'])){
                $id = $employe['email'];
            }
            echo $email;
            ?>">
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
            <input type="text" class="form-control" id="salaire"
                   placeholder="salaire" name="salaire" required
                   value="<?php
                   if (!empty($employe['salaire'])){
                       $id = $employe['salaire'];
                   }
                   echo $salaire;
                   ?>">
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
