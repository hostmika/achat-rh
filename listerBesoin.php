<?php 
$valdier=0;
include("connexion_base.php");
if(!isset($_GET['departement'])) {
    $sql = "SELECT * FROM besoin_departement LEFT JOIN departement ON besoin_departement.idDepartement = departement.idDepartement LEFT JOIN produit ON besoin_departement.idProduits = produit.id_produit WHERE besoin_departement.valider = 0 and  besoin_departement.commander =0";
    $besoin = $conn->prepare($sql);
 //   $besoin->bindParam(1, $valdier);
    $besoin->execute();

}else {
    $sql = "SELECT * FROM besoin_departement LEFT JOIN departement ON besoin_departement.idDepartement = departement.idDepartement LEFT JOIN produit ON besoin_departement.idProduits = produit.id_produit WHERE departement.idDepartement = ? and besoin_departement.valider = 0 and  besoin_departement.commander =0";
    $besoin = $conn->prepare($sql);
    $besoin->bindParam(1, $_GET['departement']);
    $besoin->execute();

}


?>