<?php 
include("connexion_base.php");
    $sql = "SELECT * FROM besoin_departement LEFT JOIN departement ON besoin_departement.idDepartement = departement.idDepartement LEFT JOIN produit ON besoin_departement.idProduits = produit.id_produit WHERE besoin_departement.valider = 1 and  besoin_departement.commander =1 ";
    $besoin = $conn->prepare($sql);
    $statement = $conn->query($sql);
	$besoin = $statement->fetchAll(PDO::FETCH_ASSOC);

	$sql3 = "SELECT * FROM besoin_departement LEFT JOIN departement ON besoin_departement.idDepartement = departement.idDepartement LEFT JOIN produit ON besoin_departement.idProduits = produit.id_produit WHERE besoin_departement.valider = 1 and  besoin_departement.commander =1  and  besoin_departement.boncommande =0";
    $commande = $conn->prepare($sql);
    $statements = $conn->query($sql);
	$commande = $statements->fetchAll(PDO::FETCH_ASSOC);

    $sql2 = "SELECT * FROM fournisseur ";
   	$statement = $conn->query($sql2);
	$fournisseur = $statement->fetchAll(PDO::FETCH_ASSOC);

?>