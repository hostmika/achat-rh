<?php 
include("achatSelect.php");
include("listerBesoin.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List besoin</title>
</head>
<body>
    <h2>Liste Besoin</h2>
    <div>
        <H4>departement</H4>
        <form action="listBesoinRH.php" method="GET">
             <select name="departement"  required>
                <?php foreach($departement as $row2) {  ?>

                <option value="<?php echo($row2[0]);?>" style="color: grey;"><?php echo($row2[1]);?></option>
                <?php }?>
            </select>
            <input type="submit" value="rechercher">
        </form>
    </div>
    <br>
    
    
    <div>
        <ul>
            <?php $i= 0; foreach($besoin as $row2) {  ?>
            <li>
                <ul>
                    <form action="validerBesoin.php" method="POST">
                        <li>departement :<?php echo($row2['departement']);?></li>
                        <li>besoin :<?php echo($row2['nom_produit']);?></li>
                        <li>Quantiter :<?php echo($row2['quantiter']);?></li>
                        <input type="hidden" name="departement" value="<?php echo($row2['departement']);?>">
                        <input type="hidden" name="besoin" value="<?php echo($row2['nom_produit']);?>">
                        <input type="hidden" name="quantiter" value="<?php echo($row2['quantiter']);?>">
                        <input type="hidden" name="id" value="<?php echo($row2['idbesoin_departement']);?>">
                        <input type="submit" name="valider" value="valider" >
                     </form>
                     <?php $i++;?>
                </ul>
                <br>
            </li>
            <?php }?>
        </ul>
    </div>
    <div>
        <?php 
    include("pagination.php")
    ?>
    </div>
    <p> <a href="commander.php">Proformat</a></p>
</body>
</body>
</html>