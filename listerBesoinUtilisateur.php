<?php 
$valdier=0;

include("connexion_base.php");

    $sql = "SELECT * FROM besoin_departement LEFT JOIN departement ON besoin_departement.idDepartement = departement.idDepartement LEFT JOIN produit ON besoin_departement.idProduits = produit.id_produit WHERE besoin_departement.commander =1 and besoin_departement.recue=0";
    $besoin = $conn->prepare($sql);
    $besoin->execute();



?>