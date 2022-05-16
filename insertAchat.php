<?php 
session_start();
include("connexion_base.php");
//var_dump($_POST);
$departement = $_POST['departement'];
$produit = $_POST['produit'];
$quantiter = $_POST['quantiter'];
$idUtilisateur =$_SESSION['idProfil'];
$sql = "INSERT INTO besoin_departement(idDepartement  , quantiter , idProduits , idUtilisateur) VALUES (? , ? , ?,?)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $departement);
$stmt->bindParam(2,$quantiter);
$stmt->bindParam(3, $produit);
$stmt->bindParam(4, $idUtilisateur);
$stmt->execute();
header("Location:inseretBesoin.php?notif=1");
?>