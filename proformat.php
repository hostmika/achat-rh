<?php 

$fournisseur="";
$besoin="";
$destinataire="";
$numero=0;
$mail="";
$produit="";
$quantite=0;

	if(isset($_POST["commander"]))
	{
		
	    $data = [
	    'id' => $_POST['id'],
	    ];
		include("connexion_base.php");
		$fournisseur=$_POST["fournisseur"];
		$besoin=$_POST["besoin"];
		$destinataire=$_POST["adr_dest"];
		$numero=$_POST["num_dest"];
		$mail=$_POST["mail_dest"];
   		$produit = $_POST['besoin'];
   		$quantite = $_POST['quantiter'];

   		 $sql = "UPDATE besoin_departement SET commander=1  WHERE idbesoin_departement=:id";
	    $stmt= $conn->prepare($sql);
	    $stmt->execute($data); 
	    $fournisseur = $_POST['fournisseur'];
		}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Proformat</title>
</head>
<body>
	<div style=" margin-left: 40%;  width: 20% ; height:40px;  margin-bottom: 10px;">
      <h2 style="position: absolute; margin-left: 2% "> PROFORMAT  </h2>
    </div>
    <div style=" margin-left: 65%;  width: 25% ; height:30px; border: solid; border-color: solid black; margin-bottom: 10px; padding-bottom: 20px;">
      <h4 style="position: absolute; margin-left: 2% "> Numero proformat : <?php echo rand(25645566,595548521); ?> </h4>
    </div>
    <div style=" margin-left: 10%;  width: 80% ; height: 110px; border: solid; border-color: solid black; padding:0px; ">
      <h5 style="position: absolute; margin-left: 2% "> Adresse de l'expediteur : Societe Ecma</h5>
      <br> 
      <h5 style="position: absolute; margin-left: 2%"> Numero de telephone : +261 329371764</h5>
      <br> 
      <h5 style="position: absolute; margin-left: 2%"> adresse email : ecma@gmail.com </h5>
    </div>
    <div style=" margin-left: 10%;  width: 80% ; height: 110px; border: solid; border-color: solid black; padding:0px; margin-top: 2%; padding-bottom: 2%;">
      <h5 style="position: absolute; margin-left: 2% "> Adresse du destinataire : <?php echo $destinataire; ?></h5> <br> 
      <h5 style="position: absolute; margin-left: 2%"> Numero de telephone : <?php echo $numero; ?> </h5>
      <br> 
      <h5 style="position: absolute; margin-left: 2%"> adresse email : <?php echo $mail;; ?></h5>
    </div>
    <div style=" margin-left: 10%;  width: 80% ; height: 150px; border: solid; border-color: solid black; padding:0px; margin-top: 2%; padding-bottom: 2%;">
    	<table style="width: 100%; height: 115%;">
		   <thead> <!-- En-tête du tableau -->
		       <tr>
		           <th>Fournisseur</th>
		           <th>Besoins</th>
		           <th>Quantité</th>
		       </tr>
		   </thead>
		   <tbody> <!-- Corps du tableau -->
		       <tr>
		           <td style="height: 20px;"><?php echo $fournisseur; ?></td>
		           <td style="height: 20px;"><?php echo $produit; ?> </td>
		           <td style="height: 20px;"><?php echo $quantite; ?></td>
		       </tr>
		   </tbody>
		</table>
		

    </div>
    <div style=" margin-left: 10%;  width: 80% ; height: 60px padding:0px; margin-top: 1%; padding-bottom: 2%;">
      <div style="position: absolute; left: 20%" >
      		<p>Lieu et date </p>
      </div>
      <div style="position: absolute ; left: 70%">
      		<p>Signiature </p>
      </div>
    </div>
</body>

<style type="text/css">
	table,
td {
    border: 1px solid #333;
}

</style>
</html>
