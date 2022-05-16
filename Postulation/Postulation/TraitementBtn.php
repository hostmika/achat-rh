<?php

    $id = $_POST['id'];
    $bouton = $_POST['bouton'];
    echo $bouton;
    if($bouton == "CV"){
        header('location: TraitementLien.php?CV='.$id);
    }
    else{
        header('location: TraitementLien.php?Lettre='.$id);
    }
    

?>