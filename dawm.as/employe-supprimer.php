<?php
require_once "functions/app_functions.php";

if (!empty($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
    employe_supprimer($id);
}
?>