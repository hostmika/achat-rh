<?php 
	require 'connexion_base.php';
	$poste="";
	if(isset($_GET['job']) and $_GET['job'] != "")
	{
		$poste= $_GET['job'];
	}
	$stmt = $conn->prepare("SELECT * FROM `annonce` WHERE poste=?");
	$stmt->execute($poste);
 ?>