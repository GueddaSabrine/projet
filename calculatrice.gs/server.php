<?php
build_header("Calcultrice");
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


