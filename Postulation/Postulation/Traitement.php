<?php
    try{
        $mysqlClient = new PDO('mysql:host=localhost;dbname=gestion_rh;charset=utf8', 'root', '');
    }
    catch(Exception $e){
            die('Erreur : '.$e->getMessage());
    }

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $cv = $_FILES['cv']['name'];
    $lettre = $_FILES['lettre']['name'];

    function insertPostuation($nom, $prenom, $telephone, $email, $cv, $lettreDeMotivation){
        $bdd = mysqli_connect('localhost','root','','gestion_rh');
        $sql = "INSERT INTO Postulation(idAnnonce, nom, prenom, telephone, email, cv, lettreDeMotivation) VALUES (1,'$nom','$prenom','$telephone','$email','$cv','$lettreDeMotivation')";
        mysqli_query($bdd,$sql);
        echo $sql;
    }

    insertPostuation($nom,$prenom,$tel,$email,$cv,$lettre);

    function getId($mysqlClient){
        $sqlQuery = "SELECT idPostulation FROM postulation order by idPostulation DESC LIMIT 1";
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
        $idDernierEmp = $recipesStatement->fetch();
        return $idDernierEmp['idPostulation'];
    }

    echo getId($mysqlClient);

    function uploadCV($mysqlClient){
        $nomDossier = 'uploadFiles/'. getId($mysqlClient)."/"."CV/";
        if (!file_exists($nomDossier)) {
            mkdir($nomDossier, 0777, true);
        }

        $targetfolder = 'uploadFiles/'. getId($mysqlClient)."/"."CV/";

        $targetfolderCV = $targetfolder.basename( $_FILES['cv']['name']);
        if(move_uploaded_file($_FILES['cv']['tmp_name'], $targetfolderCV)){       
            echo "The file ". basename( $_FILES['cv']['name']). " is uploaded"; 
        }
        else {
            echo "Problem uploading file";
        }
    }

    function uploadLettre($mysqlClient){
        $nomDossier = 'uploadFiles/'. getId($mysqlClient)."/"."Motivation/";
        if (!file_exists($nomDossier)) {
            mkdir($nomDossier, 0777, true);
        }

        $targetfolder = 'uploadFiles/'. getId($mysqlClient)."/"."Motivation/";

        $targetfolderCV = $targetfolder.basename( $_FILES['lettre']['name']);
        if(move_uploaded_file($_FILES['lettre']['tmp_name'], $targetfolderCV)){       
            echo "The file ". basename( $_FILES['lettre']['name']). " is uploaded"; 
        }
        else {
            echo "Problem uploading file";
        }   
    }

    uploadCV($mysqlClient);
    uploadLettre($mysqlClient);
    header('location: index.php');
?>