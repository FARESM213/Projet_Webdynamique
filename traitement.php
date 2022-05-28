<?php

header('Content-Type: text/html; charset=UTF-8');

include('db_config.php');


/// Main 


$db="BDD";
$db_id="root";
$adress="localhost";
$db_mdp=""; 
$db_handle=mysqli_connect($adress,$db_id,$db_mdp,$db);
$data="";

//Connect to MysQL

if(verification($adress,$db_id,$db_mdp,$db,$db_handle,$data) )
{

	//ajouter_patient($db_handle);
	//ajouter_medecin($db_handle);
	//connexion($db_handle,'Admin');
	//update_element($db_handle,'patient','patlogin','fares.messaoudi@edu.ece.fr','fafff');

}



function vide($required)
{
	// Loop over field names, make sure each one exists and is not empty
	$error = false;
	foreach($required as $field) 
	{
	  if (empty($_POST[$field])) 
	  {
	    $error = true;
	  }
	}
	return $error;
}

function test2 ($db_handle) 
    {
       $sql="SELECT * FROM labo";
       $res= mysqli_query($db_handle,$sql);
       while ($row = mysqli_fetch_row($res)) 
       {
           echo "  <a data-bs-toggle='modal'   data-id='".$row[0]."' href='#mod3' class='list-group-item list-group-item-action' aria-current='true'>
           <div class='d-flex w-100 justify-content-between'>
             <h5 class='mb-1'>".utf8_encode($row[1])."</h5>
           </div>
           <p class='mb-1'>".$row[4]."</p>
         </a>
           ";
       }

   }

function message_erreur($required)
{
	foreach($required as $field) 
	{
	  if (empty($_POST[$field])) 
	  {
	  	if ($field=="Mdplog")
	  	{
	  		 echo "Le champ mot de passe n'as pas ete rempli ! <br> <br>";
	  	}
	  	else if ($field=="Emaillog")
	  	{
	  		echo "Le champ Email n'as pas ete rempli ! <br> <br>";
	  	}
	  	else
	  	{
	    	echo "Le champ $field n'as pas ete rempli ! <br> <br>";

	  	}
	   
	  }
	}
}


 function verification($adress,$db_id,$db_mdp,$db,$db_handle,$data) 
     {
		// Connect to BDD "BDD"
		$db_found=mysqli_select_db($db_handle,$db);


		if($db_found)
			return true;
		else
			return false;
     }

function connexion($db_handle,$table) 
     {
		if (isset($_POST['Connexion']))
		{
			if(!vide(['Emaillog','Mdplog']))
			{

				$email =$_POST['Emaillog'] ;
				$mdp = $_POST['Mdplog'] ;
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

				$sql="SELECT * FROM $table WHERE email='$email'AND $genre='$mdp' ";

				$res= mysqli_query($db_handle,$sql);
				if($row=mysqli_num_rows($res)>0)
				{
					return "Connexion validee";
				}
				else
				{
					$sql="SELECT * FROM $table WHERE email='$email' ";
					$res= mysqli_query($db_handle,$sql);
					if(mysqli_num_rows($res)>0)
					{

						return " Mot de passe incorrect ";
					}
					else

					{
						return "Aucun compte '$email' present dans nos fichiers";
					}

				}
			}
			else
			{
				message_erreur(['Emaillog','Mdplog']);
			}
     	}
 }

 function test ($db_handle,$message) 
     {
		$sql="SELECT * FROM medecin WHERE medjob='Generale'";
		$res= mysqli_query($db_handle,$sql);
		while ($row = mysqli_fetch_row($res)) 
		{
			echo "  <a data-bs-toggle='modal' href='#mod1' class='list-group-item list-group-item-action' aria-current='true'>
                            <div class='d-flex w-100 justify-content-between'>
                              <h5 class='mb-1' id=''>".utf8_encode($row[1])."</h5>
                            </div>
                            <p class='mb-1'>Medecin Généraliste.</p>
                          </a>
			";
		}
		
	}


	function affich_spe ($db_handle) 
     {
     	if ($_SESSION["Specialite"]!="")
     	{  
     		$job=$_SESSION["Specialite"];
	     	$sql="SELECT * FROM medecin WHERE medjob='$job'";
			$res= mysqli_query($db_handle,$sql);

			while ($row = mysqli_fetch_row($res)) 
			{
				echo "  <a data-bs-toggle='modal' href='#mod2' class='list-group-item list-group-item-action' aria-current='true'>
	                            <div class='d-flex w-100 justify-content-between'>
	                              <h5 class='mb-1' id=''>".utf8_encode($row[1])."</h5>
	                            </div>
	                            <p class='mb-1'>".$job."</p>
	                          </a>
				";
			}
     	}
		
	}
	

function ajouter_patient($db_handle,$message) 
     {
		if (isset($_POST['insert']))
		{
			if(!vide(['Nom','Login','Mdp','Email']))
			{
				$sql="SELECT * FROM patient";
				$res= mysqli_query($db_handle,$sql);
				$id =mysqli_num_rows($res)+2;
				$nom = $_POST['Nom'] ;
				$login = $_POST['Login'] ;
				$mdp = $_POST['Mdp'] ;
				$email = $_POST['Email'] ;

				$sql="SELECT * FROM patient WHERE email='$email'";
				$res= mysqli_query($db_handle,$sql);


				if(mysqli_num_rows($res)>0)
					{
						echo "L'adresse mail ' $email ' est deja presente dans nos fichiers";
						return false;
					}
					else
					{

						$db="BDD";
						$db_id="root";
						$adress="localhost";
						$db_mdp=""; 
						$db_handle=mysqli_connect($adress,$db_id,$db_mdp,$db);
						$data="";


						$_SESSION['NomCreation']=$nom;
						$_SESSION['PseudoCreation']=$login;
						$_SESSION['MailCreation']=$email;
						$_SESSION['MdpCreation']=$mdp;


						return true;
					}
				
			}
			else
			{
				message_erreur(['Id','Nom','Login','Mdp','Email']);
			}

     	}
 }

 function ajouter_patient2($db_handle,$message) 
     {
		if (isset($_POST['signup']))
		{
			if(!vide(['AdL1','AdL2','Ville','Pays','CodeP','NumT','CarteV']))
			{

				$sql="SELECT * FROM patient";

				$result= mysqli_query($db_handle,"SELECT MAX(patno) AS maximum FROM patient");
				$row = mysqli_fetch_array($result); 
				$id = $row['maximum']+1;


				$Nom=$_SESSION['NomCreation'];
				$Pseudo=$_SESSION['PseudoCreation'];
				$Mail=$_SESSION['MailCreation'];
				$Mdp=$_SESSION['MdpCreation'];

				$AdL1=$_POST['AdL1'];
				$AdL2=$_POST['AdL2'];
				$Ville=$_POST['Ville'];
				$Pays=$_POST['Pays'];
				$CodeP=$_POST['CodeP'];
				$NumT=$_POST['NumT'];
				$CarteV=$_POST['CarteV'];
				

				$sql="INSERT INTO `patient`(`patno`, `patname`, `patlogin`, `patpassword`, `email`,`addresse1`, `adresse2`, `ville`, `Pays`, `CodePostal`, `Telephone`, `CarteVitale`) VALUES ('$id','$Nom','$Pseudo','$Mdp','$Mail','$AdL1','$AdL2','$Ville','$Pays','$CodeP','$NumT','$CarteV')";
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
			else
			{
				message_erreur(['AdL1','AdL2','Ville','Pays','CodeP','NumT','CarteV']);
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
				$rdv_horaire = $_POST['rdv_horaire'];
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



 function update_element($db_handle,$table,$element,$email,$valeur,&$message)
     {
		if ((isset($_POST['Update']))||(isset($_POST['Upload'])))
		{

			$sql="UPDATE $table SET $element ='$valeur' WHERE email='$email'";
			$res= mysqli_query($db_handle,$sql);
			if($res)
				{
				$message ="Changement effectuer ";
				}
				else
				{
					$message ="Changement impossible ";
				}
     	}
 }


 function changer_mdp($db_handle,&$message) 
     {
		if (isset($_POST['Update']))
		{
			$login = $_POST['LoginC'] ;
			$email = $_POST['EmailC'] ;

			$Mdp1 = $_POST['Mdp1'] ;
			$Mdp2 = $_POST['Mdp2'] ;	

			$sql="SELECT patno FROM patient WHERE email='$email' AND patlogin='$login'";
			$res= mysqli_query($db_handle,$sql);

			if(mysqli_num_rows($res)>0)
			{
				if ($Mdp1==$Mdp2)
				{
					update_element($db_handle,'patient','patpassword',$email,$Mdp1,$message);
				    return true;
				}
				else
				{
					$message= " Les deux mots de passe sont diffenrents ";
					return false;
				}
			}
			else
			{
				$message="Impossible de recuperer les donnees du compte";
				return false;

			}

     	}
 }

 function supprimer_element($db_handle,$table,$id,$valeur,$message) 
     {
		if (isset($_POST['Update']))
		{

			$sql="DELETE FROM $table WHERE $id ='$valeur'";
			$res= mysqli_query($db_handle,$sql);
			if($res)
				{
					$message = "Changement effectué ";
				}
				else
				{
					$message= "Changement impossible ";
				}
     	}
 }

function image_display($db_handle,$id)
{
		if(!empty($id))
		{
			$table=$_SESSION['Type'];
			$data2="";

                  if($_SESSION["Type"]=='medecin')
                     {
                             $data2="medno";

                     } 
                      else if ($_SESSION["Type"]=="patient")
                     {
                             $data2="patno";
                     }
                    else
                    {
                      $data2="adno";
                     }        



			$result= mysqli_query($db_handle," SELECT Image AS count FROM $table WHERE $data2='$id'");

			$row = mysqli_fetch_assoc($result); 
			if ($row)
			{
				$img = $row['count'];     

				$_SESSION['Image']=$img;

				echo " <img style='width: 120px' class='img-radius' alt='User-Profile-Image'";
		    	echo 'src="data:image/png;base64,'.base64_encode( $row['count'] ).'"/>';
			}
			else
			{
				echo "Probleme ";
			}
		  
		}


}




if(isset($_POST["Upload"])&& !empty($_POST['Upload']))
{
	if($_SESSION["Type"]=='medecin')
                     {
                             $data4="medpassword";
                             $data5="medlogin";
                             $data6="medno";

                     } 
                      else if ($_SESSION["Type"]=="patient")
                     {
                             $data4="patpassword";
                             $data5="patlogin";
                             $data6="patno";


                     }
                    else
                    {
                      $data4="adpassword";
                      $data5="adlogin";
                      $data6="adno";


                     }       

			if (!empty($_FILES["userImage"]["tmp_name"]))
			{
			    $b = getimagesize($_FILES["userImage"]["tmp_name"]);
			     //Check if the user has selected an image
			    if($b !== false)
			    {
			        //Get the contents of the image
			        $file = $_FILES['userImage']['tmp_name'];
			        $image = addslashes(file_get_contents($file));
			        $Type=$_SESSION["Type"];
			        $num= $_SESSION['IdClient'];
			     	$sql="UPDATE $Type SET Image ='$image' WHERE $data6='$num'";
					$res= mysqli_query($db_handle,$sql);
			        //Insert the image into the database
			        if($res)
			        {
			            echo "File uploaded successfully.";
			        }
			        else
			        {
			            echo "File upload failed.";
			        } 
			    }
			    else
			    {
			        echo "Please select an image to upload.";
			    }

			}

			  

          $message="";

		 update_element($db_handle,$_SESSION['Type'],$data5,$_SESSION['Client'],$_POST['Login'],$message);
		 update_element($db_handle,$_SESSION['Type'],$data4,$_SESSION['Client'],$_POST['password'],$message);
		 $_SESSION['LoginClient']=$_POST['Login'];
		 $_SESSION['MdpClient']=$_POST['password'];


		  
}





function Mesrdv()  // Du coup la on verifie bien qu'on a post MedecinId avec javascript
{
	
	     if($_SESSION["Type"]=='medecin')
              {
                             $data4="medno";

                     } 
                      else if ($_SESSION["Type"]=="patient")
                     {
                             $data4="patno";
                     
                     }
                    else
                    {
                      $data4="adno";
             
                     }        
    $data="";
    $data2=$_SESSION['IdClient'];	
    $data3=$_SESSION['Type_Rdv'];
    if( $_SESSION['Type_Rdv']=="Labo")
    {
    	 $data='dispo';	
    }
    else
    {
    	 $data='etat';	

    }
    $dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$db = "BDD";
	$con = mysqli_connect($dbhost, $dbuser, $dbpass , $db) or die($con);
    $query = " SELECT DISTINCT * FROM rendez_vous WHERE etat='1' AND $data4='$data2' ORDER BY rdv_date ASC,rdvno ASC"; 
    $result = $con->query($query);
   if ($result->num_rows > 0)
     {
        while ($row = $result->fetch_assoc()) 
        {
       		 echo " <a data-bs-toggle='modal' data-target='#fin' href='#fin' class='list-group-item list-group-item-action' aria-current='true' data-id='".$row['rdvno']."'value='".$row['rdv_horaire']."'> ".$row['rdv_horaire']."h";
        }

        echo " <script>                 
					      $('.list-group-item list-group-item-action').on('click', function()
					      { 
								      var button = $(event.relatedTarget) // Button that triggered the modal
			      					  var getID = button.data('id')
							          $('.active').removeClass('active');
							          $(this).addClass('active');					
							          alert(getID);
						  }); 

				</script>";
    } 
    else 
    {
        echo " <a class='list-group-item list-group-item-action' aria-current='true''> Aucun Rendez-vous disponible";
    }
}


if(isset($_POST["interest"])&& !empty($_POST['interest']))
{
	$_SESSION['Rdv_Supp']=$_POST["interest"];

	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$db = "BDD";
	$con = mysqli_connect($dbhost, $dbuser, $dbpass , $db) or die($con);

	$data=$_POST["interest"];
	$Type=$_POST["type"];

	if ($Type=="Labo")
	{

		 $query = " SELECT DISTINCT * FROM labordv WHERE rdvNo='$data'"; 
			    $result = $con->query($query);
			   if ($result->num_rows > 0)
			     {
			     	  while ($row = $result->fetch_assoc()) 
			          {
					$data=$row['laboID'];

					$query = "SELECT DISTINCT * FROM labo WHERE laboID='$data'"; 
					$result = $con->query($query);
					  while ($row2 = $result->fetch_assoc()) 
			       		 {
			        	echo "<h5> Horaire : ".$row['rdv_horaire']. " h </h5> <h5> Date :".$row['rdv_date']." </h5> <h5> Laboratoire : ".$row2['nomLab']." </h5> ";
			        	}
			     	}

			  }
	}
	else
	{
			   $query = " SELECT DISTINCT * FROM rendez_vous WHERE rdvno='$data'"; 
			    $result = $con->query($query);
			   if ($result->num_rows > 0)
			     {
			     	  while ($row = $result->fetch_assoc()) 
			        {
			        	$data=$row['medno'];

			        	$query = "SELECT DISTINCT * FROM medecin WHERE medno='$data'"; 
						$result = $con->query($query);
					    while ($row2 = $result->fetch_assoc()) 
			       		 {
			        	echo "<h5> Horaire : ".$row['rdv_horaire']. " h </h5> <h5> Date : ".$row['rdv_date']." </h5> <h5> Medecin : ".$row2['medname']."  </h5> <h5> Specialite : ".$row2['medjob']. "</h5> ";
			        	}

			     	}

			     }


	}
   
}

if(isset($_POST["Supprimer"])&& !empty($_POST['Supprimer']))
{
	$valeur= $_POST["Supprimer"];		
	$Type=$_POST["type"];

	if ($Type=="Labo")
	{
		$sql="UPDATE labordv SET dispo ='0' WHERE rdvNo='$valeur' ";
		$res= mysqli_query($db_handle,"UPDATE labordv SET dispo ='1' WHERE rdvNo='$valeur'" );	 
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "";
		$db = "BDD";
		$con = mysqli_connect($dbhost, $dbuser, $dbpass , $db) or die($con);
		$sql="UPDATE labordv SET patNo ='0' WHERE rdvNo='$valeur'";
		$res= mysqli_query($db_handle,$sql);
		if($res)
		{
			header("Location: mesRdv.php");
		}
		else
		{

		}
	}
	else
	{
		    $sql="UPDATE rendez_vous SET etat ='0' WHERE rdvno='$valeur'";
			$res= mysqli_query($db_handle,$sql);
			if($res)
			{
				$message = "Changement effectué ";
				header("Location: mesRdv.php");
			}
			else
			{
				$message= "Changement impossible ";
			}
			$sql="UPDATE rendez_vous SET patNo ='0' WHERE rdvNo='$valeur'";
			$res= mysqli_query($db_handle,$sql);

	}


}


function getTableContents ($db_handle) 
    {
       $sql="SELECT * FROM patient";
       $res= mysqli_query($db_handle,$sql);
       while ($row = mysqli_fetch_row($res)) 
       {
		       	if($row[0]!=0)
		       	{
		       		  echo "  
		   <tr>
		   						<td><input style='width:150px; font-size:0.8em;' type='text' name='idClient' id='idClient' value=".$row[0]." disabled></td>

                                <td><input style='width:150px; font-size:0.8em;  background-color: #363636; color:white;' type='text' name='nomClient' id='nomClient' value=".$row[1]."></td>

                                <td><input style='width:150px;font-size:0.8em;'type='text' name='loginClient' id='loginClient' value=".$row[2]."></td>

                                <td><input style='width:150px;font-size:0.8em;'type='password' name='passClient' id='passClient' value=".$row[3]." pattern='^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}$' required ></td>

                                <td><input style='width:150px;font-size:0.8em;'type='email' name='mailClient' id='mailClient' value=".$row[4]. " required></td>

                                <td><input style='width:150px;font-size:0.8em;'type='text' name='adresseClient' id='adresseClient' value=".$row[6]."></td>

                                <td><input style='width:150px;font-size:0.8em;'type='text' name='villeClient' id='villeClient' value=".$row[8]."></td>

                                <td><input style='width:150px;font-size:0.8em;'type='text' name='paysClient' id='paysClient' value=".$row[9]."></td>

                                <td><input style='width:150px;font-size:0.8em;'type='text' name='codePostal' id='codePostal' value=".$row[10]."></td>

                                <td><input style='width:150px;font-size:0.8em;'type='tel' name='numeroClient' id='numeroClient' minlength='10' maxlength='10' pattern='[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}' required  value=".$row[11]."></td>

								<td><input style='width:150px;font-size:0.8em;'type='text' name='carteVital' id='carteVital' value='".$row[12]."' minlength='15' maxlength='15' required></td>
								</tr>";

		       	}
         
       }

   }


function getTableContents2 ($db_handle) 
{
       $sql="SELECT * FROM medecin";
       $res= mysqli_query($db_handle,$sql);
       while ($row = mysqli_fetch_row($res)) 
       {
           echo "
				<tr>
				<td><input style='width:150px; font-size:0.8em;' type='text' name='idMedecin' id='idMedecin' value=".$row[0]." disabled></td>

				<td><input style='width:150px; font-size:0.8em;' type='text' name='nomDocteur' id='nomDocteur' value=".$row[1]."></td>

				<td><input style='width:150px;font-size:0.8em;'  type='text' name='loginDocteur' id='loginDocteur' value=".$row[2]."></td>

				<td><input style='width:150px;font-size:0.8em;'  type='password' name='passDocteur' id='passDocteur' value=".$row[3]."  pattern='^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}$' required ></td>

				<td><input style='width:150px;font-size:0.8em;'  type='text' name='speDoc' id='speDoc' value=".$row[4]."></td>
				
				<td><input style='width:150px;font-size:0.8em;'  type='email' name='mailDocteur' id='mailDocteur' value=".$row[5]."></td>

				<td><input style='width:150px;font-size:0.8em;'  type='text' name='hopitalDoc' id='hopitalDoc' value=".utf8_encode($row[7])."></td>

				<td><input style='width:150px;font-size:0.8em;' type='tel' name='tel' id='tel' minlength='10' maxlength='10' pattern='[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}' required  value=".$row[8]."></td>
				</tr>";
       }

}

function getTableContents3 ($db_handle) 
{
       $sql="SELECT * FROM labo";
       $res= mysqli_query($db_handle,$sql);
       while ($row = mysqli_fetch_row($res)) 
       {

           echo "  
		   <tr>
		 		<td><input style='width:150px; font-size:0.8em;' type='text' name='idLabo' id='idLabo' value=".$row[0]." disabled/></td>
                <td><input style='width:150px; font-size:0.8em;' type='text' name='nomLabo' id='nomLabo' value=".$row[1]."/></td>
                <td><input style='width:150px;font-size:0.8em;'type='email' name='mailLabo' id='mailLabo' value=".$row[2]."/></td>
				<td><input style='width:150px;font-size:0.8em;' type='tel' name='tellabo' id='tellabo' minlength='10' maxlength='10' pattern='[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}' required  value=".$row[3]."/></td>
                <td><input style='width:150px;font-size:0.8em;'type='text' name='typeLabo' id='typeLabo' value=".$row[4]."/></td>
            </tr>";
       }

}



?>
