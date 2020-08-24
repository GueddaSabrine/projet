<?php
require "function/app-function.php";
?>

<?php

session_start();

if(isset($_POST['connexion'])){

    $connexion = db_connexion();
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $requet = $connexion->prepare("select * from register where email=? AND password=?");
    $requet->execute([$email, $password]);
    $userexist=$requet->rowcount();
    if($userexist==1)
    {
        header("Location:calculatrice.php");
    }
    $erreur = '';
}
?>

<?php build_header("Page connexion"); ?>

<div class="login">
    <h1>Connexion</h1>

    <form>

        <fieldset>

            <legend>Connectez vous</legend>

            <div class="form-group">
                <label for="email">email</label> <br>
                <input size="40" type="email" id="email" placeholder="email">
            </div>

            <div class="form-group">
                <label for="password">password</label> <br>
                <input size="40" type="password" id="password" placeholder="password">
            </div>

            <button type="submit" class="bg-primary text-white" href="calculatrice.php">Enregistrer</button>
            <button type="submit" class="bg-danger text-white">Réinitialiser</button>
            <img src="https://img.icons8.com/nolan/100/password1.png"/>
        </fieldset>

    </form>

</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

