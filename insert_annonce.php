<?php 

require("connexion_base.php");
if(isset($_POST["poste"]) AND isset($_POST["diplome"]) AND isset($_POST["experience"]) AND isset($_POST["date_lim"]) AND isset($_POST["description"]) AND isset($_POST["contrat"])) {
    $poste = $_POST["poste"];
    $diplome = $_POST["diplome"];
    $experience = $_POST["experience"];
    $date_lim = $_POST["date_lim"];
    $description = $_POST["description"];
    $contrat = $_POST["contrat"];
    $age_min = 0;
    $age_max = 0;
    $sexe = null;
    $ajout = 0;

    if(isset($_POST["sexe"])) {
        $sexe = true;
    }

    $sql = "INSERT INTO annonce (poste, diplome , experience,";
    if(!empty($_POST["age_min"]) ){
        $age_min = $_POST["age_min"];
        $sql = $sql . " age_min ,";
        $ajout++;
    }if(!empty($_POST["age_max"]) ){
        $age_max = $_POST["age_max"];
        $sql = $sql . " age_max ,";
        $ajout++;
    }
    $sql = $sql . " description ,";
    if(isset($_POST["sexe"])) {
        $sexe = $_POST["sexe"];
        $sql = $sql . "sexe , ";
        $ajout++;
    }
    $sql = $sql . "contrat , date_limite) VALUES ( ? , ? , ? , ? , ? , ? ";
    $i = 0;
    while ( $i < $ajout ) {
        $sql = $sql . " , ?";
        $i++;
    }
    $sql = $sql . " )";

    echo($sql);
    $stmt = $conn->prepare($sql);
    $j = 1;
    $stmt->bindParam($j , $poste);
    $j++;
    $stmt->bindParam($j, $diplome);
    $j++;
    $stmt->bindParam($j, $experience);
    $j++;
    if(!empty($_POST["age_min"]) ){
        $stmt->bindParam($j, $_POST["age_min"]);
        $j++;
    }
    if(!empty($_POST["age_max"]) ){
        $stmt->bindParam($j, $_POST["age_max"]);
        $j++;
    }
    $stmt->bindParam($j, $description);
    $j++;
    if(isset($_POST["sexe"])) {
        $stmt->bindParam($j, $_POST["sexe"]);
        $j++;
    }

    $stmt->bindParam($j, $contrat);
    $j++;
    $stmt->bindParam($j, $date_lim);
    echo($j);

    $stmt->execute();

     header('Location:annonce.php?insert=ok');  
}

?>