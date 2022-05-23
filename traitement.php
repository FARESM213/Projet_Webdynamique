<?php

/// Funcction

function vide($required)
{
	// Loop over field names, make sure each one exists and is not empty
	$error = false;
	foreach($required as $field) {
	  if (empty($_POST[$field])) {
	    $error = true;
	  }
	}

	if ($error) {
	  echo "Tout les champs sont requis ! <br> <br>";
	} 
	return $error;
}


 function verification($adress,$db_id,$db_mdp,$db,$db_handle) 
     {
		// Connect to BDD "BDD"
		$db_found=mysqli_select_db($db_handle,$db);

		if($db_found)
		{
				echo "Connexion reussi <br> <br>";
				return true;
		}

		else
		{
			echo " Connexion echouée <br> <br>"; 
			return false;
		}
     }

function connexion($db_handle,$table) 
     {
		if (isset($_POST['Connexion']))
		{
			if(!vide(['Email','Mdp']))
			{

				$email = $_POST['Email'] ;
				$mdp = $_POST['Mdp'] ;
				$genre='';

				if($table=='medecin')
				{
					$genre='medpassword';
				} 
				else if ($table=="patient")
				{
					$genre='patpassword';
				}
				else
				{
					$genre='adpassword';
				}

				$sql="SELECT * FROM $table WHERE email='$email' AND $genre='$mdp' ";

				$res= mysqli_query($db_handle,$sql);
				if(mysqli_num_rows($res)>0)
					{
						echo "Connexion validee";
					}
					else
					{
						echo "Connexion refusee, veuillez reesayer";
					}
			}
     	}
 }


function ajouter_patient($db_handle) 
     {
		if (isset($_POST['insert']))
		{
			if(!vide(['Id','Nom','Login','Mdp','Email']))
			{
				$id = $_POST['Id'] ;
				$nom = $_POST['Nom'] ;
				$login = $_POST['Login'] ;
				$mdp = $_POST['Mdp'] ;
				$email = $_POST['Email'] ;
				$sql="INSERT INTO patient(`patno`, `patname`, `patlogin`, `patpassword`, `email`) VALUES('$id','$nom','$login','$mdp','$email')";

				$res= mysqli_query($db_handle,$sql);
				if($res)
					{
						echo "Clear insertion ";
					}
					else
					{
						echo "Unable to insert ";
					}
			}

     	}
 }

 function ajouter_medecin($db_handle) 
     {
		if (isset($_POST['insert']))
		{
			if(!vide(['Id','Nom','Login','Mdp','Email','Spec','Hospital']))
			{
				$id = $_POST['Id'] ;
				$nom = $_POST['Nom'] ;
				$login = $_POST['Login'] ;
				$mdp = $_POST['Mdp'] ;
				$email = $_POST['Email'] ;
				$spec = $_POST['Spec'];
				$hospital = $_POST['Hospital'];

				$sql="INSERT INTO `medecin`(`medno`, `medname`, `medlogin`, `medpassword`, `medjob`, `email`, `hopital`) VALUES('$id','$nom','$login','$mdp','$spec','$email','$hospital')";

				$res= mysqli_query($db_handle,$sql);
				if($res)
					{
						echo "Clear insertion ";
					}
					else
					{
						echo "Unable to insert ";
					}
			}
     	}
 }


function ajouter_rdv($db_handle) 
     {
		if (isset($_POST['insert']))
		{
			if(!vide(['rdvno','medno','patno','rdv_date','rdv_motif','rdv_duree','rdv_horaire','loc','etat','Type']))
			{
				$rdvno = $_POST['rdvno'] ;
				$medno = $_POST['medno'] ;
				$patno = $_POST['patno'] ;
				$rdv_date = $_POST['rdv_date'] ;
				$rdv_motif = $_POST['rdv_motif'] ;
				$rdv_duree = $_POST['rdv_duree'];
				$rdv_horaire ,= $_POST['rdv_horaire'];
				$loc = $_POST['loc'] ;
				$etat = $_POST['etatetat'];
				$Type = $_POST['Type'];

				$sql="INSERT INTO `rendez_vous`(`rdvno`, `medno`, `patno`, `rdv_date`, `rdv_motif`, `rdv_duree`, `rdv_horaire`, `loc`, `etat`, `Type`) VALUES('$rdvno','$medno','$patno','$rdv_date','$rdv_motif','$rdv_duree','$rdv_horaire','$loc','$etat','$Type')";


				$res= mysqli_query($db_handle,$sql);
				if($res)
					{
						echo "Clear insertion ";
					}
					else
					{
						echo "Unable to insert ";
					}
			}
     	}
 }



 function update_element($db_handle,$table,$element,$email,$valeur) 
     {
		if (isset($_POST['Update']))
		{

			$sql="UPDATE $table SET $element ='$valeur' WHERE email='$email'";
			$res= mysqli_query($db_handle,$sql);
			if($res)
				{
					echo "Changement effectuer ";
				}
				else
				{
					echo "Changement impossible ";
				}
     	}
 }



 function supprimer_element($db_handle,$table,$id,$valeur) 
     {
		if (isset($_POST['Update']))
		{

			$sql="DELETE FROM $table WHERE $id ='$valeur'";
			$res= mysqli_query($db_handle,$sql);
			if($res)
				{
					echo "Changement effectuer ";
				}
				else
				{
					echo "Changement impossible ";
				}
     	}
 }




/// Main 


$db="BDD";
$db_id="root";
$adress="localhost";
$db_mdp=""; 
$db_handle=mysqli_connect($adress,$db_id,$db_mdp,$db);



//Connect to MysQL

if(verification($adress,$db_id,$db_mdp,$db,$db_handle) )
{

	//ajouter_patient($db_handle);
	//ajouter_medecin($db_handle);
	//connexion($db_handle,'Admin');
	//update_element($db_handle,'patient','patlogin','fares.messaoudi@edu.ece.fr','fafff');

}


?>