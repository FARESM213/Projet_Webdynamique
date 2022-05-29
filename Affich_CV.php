<?php

// Start the session
session_start();

    $data=$_SESSION['Nom_CV'];
	$nom_fichier= "CVS/".$data.".xml";
	$proc = new XSLTProcessor;
	$xml = new DOMDocument;	
	$xml->load($nom_fichier);
	$xsl = new DOMDocument;
	$xsl->load('cv.xsl');
	$proc->importStyleSheet($xsl);
	if($html= $proc->transformToXML($xml))
	{
		echo $html;
		
	}else
	{
		trigger_error('La transformation XSL à échouée.', E_USER_ERROR);
	}

?>