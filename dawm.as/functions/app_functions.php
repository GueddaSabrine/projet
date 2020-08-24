<?php

/**
 * permet de construire le haut d'une page HTML5
 * @param $titre_page
 */
function build_header($titre_page)
{
    echo <<<TAG
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./assets/css/bootstrap.css"/>
    <link rel="stylesheet" href="./assets/css/app.css"/>

      <!-- Notre propre CSS -->

    <title>Page Accueil</title>
  </head>
  <body>
  <div class="container">

      <!-- debut navbar -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
          <a class="navbar-brand" href="#">DAWM Asnieres</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
              <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                      <a class="nav-link" href="employes.php">Employés</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="index.php">Se déconecter</a>
                  </li>
              </ul>
          </div>
      </nav>
      <!-- fin navbar -->
TAG;

}

function db_connexion(){
    $database = "crud_pdo_db";
    $user = "root";
    $pass = "";

    //URL de la BDD
    $url = "mysql:host=127.0.0.1;dbname=$database;charset=utf8";

    try {
        //on essaie d'etablir une connexion a la bdd
        $connexion = new PDO($url, $user, $pass);

        //en cas de prblm prend en charge la gestion des erreurs
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //on retourne instance de PDO
        return $connexion;
    }catch (Exception $e){
        exit($e->getMessage());
    }
}

/**
 * Permet de supprimer de la BDD l'employé dont l'id est passé en parametre
 * @param $id
 */
function employe_supprimer($id)
{
    $connexion = db_connexion();
    if (!empty($id)) {
        $id = htmlspecialchars($id);
        $sql_suppression = "delete from Employes where id = ?";
        $req_preparee = $connexion->prepare($sql_suppression);
        $req_preparee->execute([$id]);
    }
    header("Location:employes.php");
}