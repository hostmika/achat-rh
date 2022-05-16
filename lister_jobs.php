<?php 
	 require 'connexion_base.php';

	 if (isset($_GET['page_no']) && $_GET['page_no']!="") 
	 {
	    $page_no = $_GET['page_no'];
	 } 
	 else 
	 {
	    $page_no = 1;
	 }

	$total_records_per_page = 5;

	$offset = ($page_no-1) * $total_records_per_page;
	$previous_page = $page_no - 1;
	$next_page = $page_no + 1;
	$adjacents = "2";

	$resultat = "SELECT COUNT(*)  FROM annonce";
	$statement = $conn->query($resultat);
	$count = $statement->fetchAll(PDO::FETCH_ASSOC);
	$total_no_of_pages = ceil($count[0]['COUNT(*)'] / $total_records_per_page);
	$second_last = $total_no_of_pages - 1;

	$sql = "SELECT * FROM `annonce` LIMIT $offset , $total_records_per_page";
	$statement = $conn->query($sql);
	$publishers = $statement->fetchAll(PDO::FETCH_ASSOC);
	
 ?>
