<?php 

$fournisseur="";
$besoin="";
$destinataire="";
$numero=0;
$produit="";
$quantite=0;
$nom_service="";
$type_envoi="";
$mode_livraison="";
$date_livre=null;
$prix_unit=0;
$remise=0;
$tva=0;
$ttc=0;
$total=0;


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
   		$produit = $_POST['besoin'];
   		$quantite =5;
   		$quantite = $_POST['quantiter'];
   		$nom_service = $_POST['serv_dest'];
   		$type_envoi = $_POST['env_type'];
   		$mode_livraison = $_POST['livr_mode'];
   		$date_livre = $_POST['livr_date'];
   		$prix_unit = $_POST['prix_uni'];
   		$remise = $_POST['remise']/100;
   		$tva = $_POST['tva']/100;
   		$ttc = $_POST['ttc']/100;
   		$total = ($prix_unit * $quantite)+$tva+$ttc-$remise;


   		 $sql = "UPDATE besoin_departement SET commander=1  WHERE idbesoin_departement=:id";
	    $stmt= $conn->prepare($sql);
	    $stmt->execute($data); 
	    $fournisseur = $_POST['fournisseur'];
		}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>	bon de commande</title>
</head>
<body>
		<div class="titre" style=" width: 40%; height: 50px; position: absolute; right: 18%; top:1%;" >
			<font size="6" style="color:teal;">BON DE COMMANDE</font>
		</div>

		<div class="adresse" style=" width: 25%; height: 120px; margin-top:2%; position: absolute; left: 11%;"> 
			<p style="margin: 5px; padding: 0px; border-bottom: 2px solid black; width: 80%;">Nom du societe : ECMA</p>
			<p style="margin: 5px; padding: 0px; border-bottom: 2px solid black; width: 80%;">Adresse : LOGT 102 TANA</p>
			<p style="margin: 5px; padding: 0px; border-bottom: 2px solid black; width: 80%;">Ville : ANTANANATARIVO </p>
			<p style="margin: 5px; padding: 0px; border-bottom: 2px solid black; width: 80%;">Code Postal : 102 </p>
		</div>

		<div class="date" style=" height: 100px; width: 20%; position: absolute; right: 14%; margin-top: 50px;">	
				<p style="margin: 5px; padding: 0px; border-bottom: 2px solid black; width: 120%;">DATE : <?php 
				echo date('l \t\h\e jS'); ?></p>
				<p style="margin: 5px; padding: 0px; border-bottom: 2px solid black; width: 120%;">COMMANDE N° <?php echo rand(25664564 ,52548845);?> :</p>
		</div>
		<div style=" width: 400px ; height: 250px; position: absolute; left: 10%; margin-top: 130px;">
				<p style="margin: 15px; padding: 0px; border-bottom: 2px solid teal; width: 90%;">CLIENT : ECMA</p>
				<p style="margin: 15px; padding: 0px; border-bottom: 2px solid teal; width: 90%; margin-top: 40px;">NOM DU CONTACT : ECMA</p>
				<p style="margin: 15px; padding: 0px; border-bottom: 2px solid teal; width: 90%;">NOM DE LA SOCIETE CLIENTE : ECMA</p>
				<p style="margin: 15px; padding: 0px; border-bottom: 2px solid teal; width: 90%;">ADRESSE : <?php echo $destinataire ;?> </p>
				<p style="margin: 15px; padding: 0px; border-bottom: 2px solid teal; width: 90%;">TELEPHONE : +261 0329371764 </p>
		</div>
		<div style=" width: 400px;  height: 250px; position: absolute; left:   520px;  margin-top: 130px;">
				<p style="margin: 15px; padding: 0px; border-bottom: 2px solid teal; width: 90%;">ADRESSE A : </p>
				<p style="margin: 15px; padding: 0px; border-bottom: 2px solid teal; width: 90%; margin-top: 40px;">NOM / SERVICE : <?php  echo $fournisseur; ?></p>
				<p style="margin: 15px; padding: 0px; border-bottom: 2px solid teal; width: 90%;">NOM DE LA SOCIETE CLIENTE  : <?php  echo $fournisseur; ?></p>
				<p style="margin: 15px; padding: 0px; border-bottom: 2px solid teal; width: 90%;">ADRESSE : <?php  echo $destinataire; ?></p>
				<p style="margin: 15px; padding: 0px; border-bottom: 2px solid teal; width: 90%;">TELEPHONE : <?php echo $numero; ?></p>
		</div>
		<div style="width: 80%; height: 120px; position: absolute; left: 12%;  margin-top: 370px;"> 	
				<table style="width: 100%; height: 100%;">
				   <thead> <!-- En-tête du tableau -->
				       <tr>
				           <th style="text-align: center; vertical-align: middle;">ENVOI PAR</th>
				           <th style="text-align: center; vertical-align: middle;">MODE DE LIVRAISON</th>
				           <th style="text-align: center; vertical-align: middle;">CONDITION DE LIRAISON</th>
				           <th style="text-align: center; vertical-align: middle;">DATE</th>
				       </tr>
				   </thead>
				   <tbody> <!-- Corps du tableau -->
				       <tr>
				           <td style="height: 20px; text-align: center; vertical-align: bottom;"><?php  echo $type_envoi; ?></td>
				           <td style="height: 20px; text-align: center; vertical-align: bottom;"><?php  echo $mode_livraison; ?></td>
				           <td style="height: 20px; text-align: center; vertical-align: bottom;"><?php  echo $mode_livraison; ?> APRES LIVRAISON </td>
				           <td style="height: 20px; text-align: center; vertical-align: bottom;"><?php  echo $date_livre; ?></td>
				       </tr>
				   </tbody>
				</table>
		</div>
		<div style="width: 80%; height: 120px; position: absolute; left: 12%;  margin-top: 500px;"> 	
				<table style="width: 100%; height: 100%;">
				   <thead> <!-- En-tête du tableau -->
				       <tr>
				           <th style="text-align: center; vertical-align: middle;">CODE</th>
				           <th style="text-align: center; vertical-align: middle;">NOM DU PRODUIT</th>
				           <th style="text-align: center; vertical-align: middle;">PRIX UNITAIRE </th>
				           <th style="text-align: center; vertical-align: middle;">QUANTITE</th>
				       </tr>
				   </thead>
				   <tbody> <!-- Corps du tableau -->
				       <tr>
				           <td style="height: 20px; text-align: center; vertical-align: bottom;"><?php echo rand(645465,5454545); ?></td>
				           <td style="height: 20px; text-align: center; vertical-align: bottom;"><?php echo $produit; ?></td>
				           <td style="height: 20px; text-align: center; vertical-align: bottom;"><?php echo $prix_unit; ?> </td>
				           <td style="height: 20px; text-align: center; vertical-align: bottom;"> <?php echo $quantite; ?> </td>
				       </tr>
				   </tbody>
				</table>
		</div>
		<div style="width: 40%; height: 120px; position: absolute; left: 12%;  margin-top: 610px; "> 	
				<p style="margin: 15px; padding: 0px; border-bottom: 2px solid teal; width: 90%;">REMISE  : <?php echo $remise * 100; ?>%</p>
				<p style="margin: 15px; padding: 0px; border-bottom: 2px solid teal; width: 90%;">TAUX TVA  : <?php echo $tva * 100 ; ?>%</p>
				<p style="margin: 15px; padding: 0px; border-bottom: 2px solid teal; width: 90%;">TAUX TTC  : <?php echo $ttc * 100 ;?>%</p>
		</div>
		<div style="width: 40%; height: 120px; position: absolute; right:  8%;  margin-top: 610px; "> 	
				<p style="margin: 15px; padding: 0px; border-bottom: 2px solid teal; width: 90%;">TOTAL  : <?php echo $total; ?></p>
				<p style="margin: 15px; padding: 0px;  ">SIGNIATURE  :</p>
		</div>
</body>
<style type="text/css">
	 tr , td ,th{
    border-right:  1px solid #333;
    border-bottom:   1px solid #333;
    border-top:   1px solid #333;
    border-left:   1px solid #333;
}
td{
	border-top: none;
	border-bottom: : none;
}
</style>
</html>