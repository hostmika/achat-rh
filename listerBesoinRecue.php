<?php 
session_start();
$valdier=0;
$idUtilisateur=$_SESSION['idProfil'];
include("connexion_base.php");

    $sql = "SELECT * FROM besoin_departement LEFT JOIN departement ON besoin_departement.idDepartement = departement.idDepartement LEFT JOIN produit ON besoin_departement.idProduits = produit.id_produit WHERE besoin_departement.commander =1 and besoin_departement.recue=1 and besoin_departement.idUtilisateur=?";
    $besoin = $conn->prepare($sql);
    $besoin->bindParam(1, $idUtilisateur);
    $besoin->execute();



?>