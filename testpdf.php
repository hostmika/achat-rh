<?php 
require  'vendor/autoload.php' ;
//require_once  'dompdf/autoload.inc.php' ;
    // référence l'espace de noms 
use Dompdf\Dompdf;
use Dompdf\options;

ob_start();
require_once'proformat.php';
$html=ob_get_contents();
ob_end_clean();


// instancie et utilise la classe 
$dompdf = new Dompdf ();
$dompdf->loadHtml($html);

// (Facultatif) Configurez le format et l'orientation du papier 
$dompdf->setPaper('A4' , 'landscape');

// Rendu HTML au format PDF 
$dompdf->render();

// Exporte le PDF généré vers le navigateur 

$fichier = "proformats.pdf";

$dompdf->stream($fichier );
 ?>