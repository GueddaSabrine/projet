<?php

require_once "functions/app_functions.php";

$connexion = db_connexion();

//on definit la variable page pour la pagination
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;

//on definit le nombre d'enregistrement par page
$nb_employes_par_page = 5;

//requete sql parametrée à preparer
$sql ="select * from employes order by id limit ?, ?";

//On prepare la requete
$req_preparee = $connexion->prepare($sql);

//on lui passe les parametre
$req_preparee->bindValue(1,($page - 1) * $nb_employes_par_page,PDO::PARAM_INT);
$req_preparee->bindValue(2,$nb_employes_par_page,PDO::PARAM_INT);

//on execute la requete
$req_preparee->execute();

//On encapsule le resultat dans £employes
$employes = $req_preparee->fetchAll(PDO::FETCH_ASSOC);

//nb total des employes en BDD
$nb_employes_total = $connexion->query("select count(*) from employes")->fetchColumn();

?>

<?php
build_header("Page Employés");
?>

<div>
<h1>Liste des employes</h1>
    <p>
        <a href="employe-ajouter.php" class="btn btn-primary">Ajouter des employer </a>
    </p>

<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Prenom</th>
        <th scope="col">ddn</th>
        <th scope="col">fonction</th>
        <th scope="col">email</th>
        <th scope="col">salaire</th>
        <th scope="col" colspan="3">Action</th>
    </tr>
    </thead>


<tdody>
<?php
foreach ($employes as $employe){
    echo <<<EOT
<tr>
<td>{$employe['id']}</td>
<td>{$employe['prenom']}</td>
<td>{$employe['ddn']}</td>
<td>{$employe['fonction']}</td>
<td>{$employe['email']}</td>
<td>{$employe['salaire']}</td>
<td><a href="employe-modifier.php?id={$employe['id']}">Modifier</a></td>
<td><a href="employe-supprimer.php?id={$employe['id']}">Supprimer</a></td>
<td><a href="employe-detail.php?id={$employe['id']}">Detail</a></td>
</tr>

EOT;

}
?>
</tdody>
</table>
</div>