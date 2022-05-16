<?php 
 include("connexion_base.php");

    $data = [
    'id' => $_POST['id'],
    ];

   $sql = "UPDATE besoin_departement SET recue=1  WHERE idbesoin_departement=:id";
    $stmt= $conn->prepare($sql);
    $stmt->execute($data); 

     header('Location:listeBesoinUtilisateur.php');      
 ?>