<?php
	
	session_start();

	require("traitement.php");
	header( 'content-type: text/html; charset=utf-8' );
	include('db_config.php');
	//--------------------------------RECUPERATION INFORMATIONS PRINCIPALES-----------------------------------------
	$Nom = isset($_POST["Nom"])? $_POST["Nom"] : "";
	$Adresse = isset($_POST["Adresse"])? $_POST["Adresse"] : "";	
	$Telephone = isset($_POST["Telephone"])? $_POST["Telephone"] : "";
	$Email = isset($_POST["Email"])? $_POST["Email"] : "";
	$Intro = isset($_POST["Intro"])? $_POST["Intro"] : "";

	$Diplome1 = isset($_POST["Diplome1"])? $_POST["Diplome1"] : "";
	$Etablissement1= isset($_POST["Etablissement1"])? $_POST["Etablissement1"] : "";
	$from1 = isset($_POST["from1"])? $_POST["from1"] : "";
	$to1 = isset($_POST["to1"])? $_POST["to1"] : "";


	$Diplome2 = isset($_POST["Diplome2"])? $_POST["Diplome2"] : "";
	$Etablissement2= isset($_POST["Etablissement2"])? $_POST["Etablissement2"] : "";
	$from2 = isset($_POST["from2"])? $_POST["from2"] : "";
	$to2 = isset($_POST["to2"])? $_POST["to2"] : "";


	$Emploi1 = isset($_POST["Emploi1"])? $_POST["Emploi1"] : "";
	$Entreprise1 = isset($_POST["Entreprise1"])? $_POST["Entreprise1"] : "";
	$form3 = isset($_POST["form3"])? $_POST["form3"] : "";
	$to3 = isset($_POST["to3"])? $_POST["to3"] : "";


	$Description1 = isset($_POST["Description1"])? $_POST["Description1"] : "";
	$Achievement11 = isset($_POST["achievement11"])? $_POST["achievement11"] : "";
	$Achievement12 = isset($_POST["achievement12"])? $_POST["achievement12"] : "";

	$Achievement13 = isset($_POST["achievement13"])? $_POST["achievement13"] : "";


	$Emploi2 = isset($_POST["Emploi2"])? $_POST["Emploi2"] : "";
	$Entreprise2 = isset($_POST["Entreprise2"])? $_POST["Entreprise2"] : "";
	$form4 = isset($_POST["form4"])? $_POST["form4"] : "";
	$to4 = isset($_POST["to4"])? $_POST["to4"] : "";


	$Description2 = isset($_POST["Description2"])? $_POST["Description2"] : "";
	$Achievement21 = isset($_POST["achievement21"])? $_POST["achievement21"] : "";
	$Achievement22 = isset($_POST["achievement22"])? $_POST["achievement22"] : "";

	$Achievement23 = isset($_POST["achievement23"])? $_POST["achievement23"] : "";

	$Interet = isset($_POST["Interet"])? $_POST["Interet"] : "";

	$Situation = isset($_POST["Situation"])? $_POST["Situation"] : "";
	$Mail2 = isset($_POST["Mail2"])? $_POST["Mail2"] : "";
	$Tel2 = isset($_POST["Tel2"])? $_POST["Tel2"] : "";


	//creation d'un fichier xml
	$xml = new DomDocument('1.0','utf-8');
	$xml->formatOutput=true;
	$xml->preserveWhiteSpace=false;
	//create element using createElement()
	//append child to parent using appendChild()

	//cv
	$cv=$xml->createElement("cv");
	$xml->appendChild($cv);

	//me
		$me = $xml->createElement("me",$Intro);
		$cv->appendChild($me);

		$name = $xml->createAttribute('name');
		$name->value = $Nom;
		$me->appendChild($name);

		$address = $xml->createAttribute('address');
		$address->value = $Adresse;
		$me->appendChild($address);

		$telephone = $xml->createAttribute('telephone');
		$telephone->value = $Telephone;
		$me->appendChild($telephone);

		$email = $xml->createAttribute('email');
		$email->value = $Email;
		$me->appendChild($email);



	//education 

		$education = $xml->createElement("education");
		$cv->appendChild($education);


		$qualification_edu1 = $xml->createElement("qualification");
		$education->appendChild($qualification_edu1);


		$establishment_edu1 = $xml->createAttribute('establishment');
		$establishment_edu1->value = $Etablissement1;
		$qualification_edu1->appendChild($establishment_edu1);

		$type_edu1 = $xml->createAttribute('type');
		$type_edu1->value = $Diplome1;
		$qualification_edu1->appendChild($type_edu1);

		$from_edu1 = $xml->createAttribute('from');
		$from_edu1->value = $from1;
		$qualification_edu1->appendChild($from_edu1);

		$to_edu1 = $xml->createAttribute('to');
		$to_edu1->value = $to1;
		$qualification_edu1->appendChild($to_edu1);
		/////////////////////////////////////

		$qualification_edu2 = $xml->createElement("qualification");
		$education->appendChild($qualification_edu2);

		$establishment_edu2 = $xml->createAttribute('establishment');
		$establishment_edu2->value = $Etablissement2;
		$qualification_edu2->appendChild($establishment_edu2);

		$type_edu2 = $xml->createAttribute('type');
		$type_edu2->value = $Diplome2;
		$qualification_edu2->appendChild($type_edu2);

		$from_edu2 = $xml->createAttribute('from');
		$from_edu2->value = $from2;
		$qualification_edu2->appendChild($from_edu2);

		$to_edu2 = $xml->createAttribute('to');
		$to_edu2->value = $to2;
		$qualification_edu2->appendChild($to_edu2);


	//employment 

		$employment = $xml->createElement("employment");
		$cv->appendChild($employment);

			$experience1 = $xml->createElement("experience");
			$employment->appendChild($experience1);


					$establishment_exp1 = $xml->createAttribute('establishment');
					$establishment_exp1->value = $Entreprise1;
					$experience1->appendChild($establishment_exp1);

					$job_exp1 = $xml->createAttribute('job_title');
					$job_exp1->value = $Emploi1;
					$experience1->appendChild($job_exp1);

					$from_exp1 = $xml->createAttribute('from');
					$from_exp1->value = $form3;
					$experience1->appendChild($from_exp1);

					$to_exp1 = $xml->createAttribute('to');
					$to_exp1->value = $to3;
					$experience1->appendChild($to_exp1);


			$description1 = $xml->createElement("description",$Description1);
			$experience1->appendChild($description1);

					$achievement11 = $xml->createElement("achievement",$Achievement11);
					$experience1->appendChild($achievement11);
					$achievement12 = $xml->createElement("achievement",$Achievement12);
					$experience1->appendChild($achievement12);
					$achievement13 = $xml->createElement("achievement",$Achievement13);
					$experience1->appendChild($achievement13);


			/////////////////////////////////////

			$experience2 = $xml->createElement("experience");
			$employment->appendChild($experience2);

					$establishment_exp2 = $xml->createAttribute('establishment');
					$establishment_exp2->value = $Entreprise2;
					$experience2->appendChild($establishment_exp2);

					$job_exp2 = $xml->createAttribute('job_title');
					$job_exp2->value = $Emploi2;
					$experience2->appendChild($job_exp2);

					$from_exp2 = $xml->createAttribute('from');
					$from_exp2->value =$form4;
					$experience2->appendChild($from_exp2);

					$to_exp2 = $xml->createAttribute('to');
					$to_exp2->value =$to4;
					$experience2->appendChild($to_exp2);

			$description2 = $xml->createElement("description",$Description2);
			$experience2->appendChild($description2);

					$achievement21 = $xml->createElement("achievement",$Achievement21);
					$experience2->appendChild($achievement21);
					$achievement22 = $xml->createElement("achievement",$Achievement22);
					$experience2->appendChild($achievement22);
					$achievement23 = $xml->createElement("achievement",$Achievement23);
					$experience2->appendChild($achievement23);

		$hobandint = $xml->createElement("hobandint",$Interet);
		$cv->appendChild($hobandint);



	$references = $xml->createElement("references");
	$cv->appendChild($references);

			$contact = $xml->createElement("contact");
			$references->appendChild($contact);


				$email = $xml->createAttribute('email');
				$email->value = $Mail2;
				$contact->appendChild($email);

				$telephone2 = $xml->createAttribute('telephone');
				$telephone2->value = $Tel2;
				$contact->appendChild($telephone2);

				$relationship = $xml->createAttribute('relationship');
				$relationship->value = $Situation;
				$contact->appendChild($relationship);


///////////////////////// Suavegarder le fichier ///////////////////////////////////


$data=$_SESSION['Nom_create'];
$nom_fichier= "CVS/".$data.".xml";

$xml->save($nom_fichier) or die("Error, Unable to create XML file");

///////////////////////// AFFICHER LE FICHIER XML ///////////////////////////////////

$_SESSION['Nom_create']="";
 echo '<script>
						alert("Cv sauvegardé ");
						window.location.href="admin.php";
						</script>';	 

?>