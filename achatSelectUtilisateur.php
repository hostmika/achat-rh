<?php 

include("connexion_base.php");
$sql = "SELECT * FROM besoin_departement where commander=1";
$produit = $conn->prepare($sql);
$produit->execute();

$sql = "SELECT * FROM departement";
$departement = $conn->prepare($sql);
$departement->execute();



?>