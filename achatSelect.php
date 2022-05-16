<?php 

include("connexion_base.php");
$sql = "SELECT * FROM produit";
$produit = $conn->prepare($sql);
$produit->execute();

$sql = "SELECT * FROM departement";
$departement = $conn->prepare($sql);
$departement->execute();



?>