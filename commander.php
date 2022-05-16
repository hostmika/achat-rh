<?php 
	include("listeValider.php");
	if(empty($besoin)){
		 header('Location:achat.php');     
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Proformat</h1>
	<form action="testpdf.php" method="POST">
			<p><label for="fournisseur">Choisir un fournisseur:</label>
			<select id="fournisseur" name="fournisseur">
                <?php foreach($fournisseur as $row) { ?>
                	<option value="<?php echo $row['nom_fournisseur'] ;  ?>"><?php echo $row['nom_fournisseur'] ;  ?>
                	</option>
               <?php } ?>
             </select> </p><p>
			<label for="besoin">Choisir un besoin:</label>
			<select id="besoin" name="besoin">
                <?php foreach($besoin as $row) {  ?>
                	<option value="<?php echo $row['nom_produit'] ;  ?>"><?php echo $row['nom_produit'] ;  ?>
                	</option>
               <?php } ?>
             </select>  </p>
		</p>
		<p> Adresse du destinataire :<input type="text" name="adr_dest"></p>
		<p> Numero du destinataire :<input type="number" name="num_dest"></p>
		<p> Email du destinataire :<input type="mail" name="mail_dest"></p>

		<input type="hidden" name="departement" value="<?php  echo($row['departement']);?>">
        <input type="hidden" name="besoin" value="<?php echo($row['nom_produit']);?>">
        <input type="hidden" name="quantiter" value="<?php echo($row['quantiter']);?>">
		<input type="hidden" name="id" value="<?php echo($row['idbesoin_departement']);?>">
		<input type="submit" name="commander" value="commander">
	</form>
	<p> <a href="listBesoinRh.php">Liste besoins RH</a></p>
</body>
</html>
