<?php
// Include the database connection file
include('db_config.php');

session_start();

if (isset($_POST['medecinId']) && !empty($_POST['medecinId']))  // Du coup la on verifie bien qu'on a post MedecinId avec javascript
{
	$data=$_POST['medecinId']; 
	$query = " SELECT * FROM rendez_vous WHERE medno='$data' ORDER BY rdv_date ASC,rdvno ASC"; 
	$result = $con->query($query);

	if ($result->num_rows > 0)
	 {
		echo '<option value="">Choisir un horaire </option>'; 
		while ($row = $result->fetch_assoc()) 
		{
			echo '<option value="'.$row['rdvno'].'">'.$row['rdv_horaire'].'h '.$row['rdv_date'].'</option>';  // Du coup la meme procedé, et on mettra dans horaire un truck de valeur rdvno et on affiche ce qui suit 
		}
	} else 
	{
		echo '<option value="">Aucun Rendez-vous </option>'; 
	}

} 



if (isset($_POST['getID']) && !empty($_POST['getID']))  // Du coup la on verifie bien qu'on a post MedecinId avec javascript
{
	$data=$_POST['getID']; 
	$query = " SELECT * FROM medecin WHERE medjob='$data'"; 
	$result = $con->query($query);
	$_SESSION['Type_Rdv']="Medecin";


	if ($result->num_rows > 0)
	 {
		while ($row = $result->fetch_assoc()) 
		{
			echo " <a data-bs-toggle='modal' data-target='#mod2' href='#mod2' class='list-group-item list-group-item-action' aria-current='true' data-id='".$row['medno']."' value='".$row['medno']."'>
                              <div class='d-flex w-100 justify-content-between'>
                                <h5 class='mb-1'>".$row['medname']."</h5>
                              </div>
                              <p class='mb-1'>".$row['medjob']."</p>
                            </a> " ;

		}
	} 
} 


if (isset($_POST['Info']) && !empty($_POST['Info']))  // Du coup la on verifie bien qu'on a post MedecinId avec javascript
{

	$data=$_POST['Info']; 
	$query = " SELECT * FROM medecin WHERE medno='$data'"; 
	$_SESSION['Type_Rdv']="Medecin";

	$result = $con->query($query);
	$row = $result->fetch_assoc();	
	$_SESSION['Nom_CV']=$row['medname'];

	echo "  <h5 class='modal-title' style=' color: #000;' id='mod2Label'>".$row['medname']." ".$row['medjob']."</h5> |";
	$_SESSION['Id']=$data;
                   
}

if (isset($_POST['Nom']) && !empty($_POST['Nom']))  // Du coup la on verifie bien qu'on a post MedecinId avec javascript
{

	$data=$_POST['Nom']; 
	$query = " SELECT * FROM medecin WHERE medno='$data'"; 
	$result = $con->query($query);

	$row = $result->fetch_assoc();
    echo $row['medname']."|";
}


if (isset($_POST['Mail']) && !empty($_POST['Mail']))  // Du coup la on verifie bien qu'on a post MedecinId avec javascript
{

	$data=$_POST['Mail']; 
	$query = " SELECT * FROM medecin WHERE medno='$data'"; 
	$result = $con->query($query);
	$row = $result->fetch_assoc();
	 echo $row['email']."|";

}

if (isset($_POST['Id']) && !empty($_POST['Id']))  // Du coup la on verifie bien qu'on a post MedecinId avec javascript
{

	$data=$_POST['Mail']; 
	$query = " SELECT * FROM medecin WHERE medno='$data'"; 
	$result = $con->query($query);
	$row = $result->fetch_assoc();
	echo $row['medno']."|";

}

if (isset($_POST['Img']) && !empty($_POST['Img']))  // Du coup la on verifie bien qu'on a post MedecinId avec javascript
{
    $data=$_POST['Img']; 
	$query= " SELECT Image AS count FROM medecin WHERE medno='$data'";
	$result = $con->query($query);
	$row =$result->fetch_assoc(); 
	if ($row)
	{
		$img = $row['count'];     
		$_SESSION['Image']=$img;

		echo " <img style='width: 120px' class='img-radius' alt='User-Profile-Image'";
		echo 'src="data:image/png;base64,'.base64_encode( $row['count'] ).'"/>'."|";
	}
			
}

if (isset($_POST['Num']) && !empty($_POST['Num']))  // Du coup la on verifie bien qu'on a post MedecinId avec javascript
{

	$data=$_POST['Num']; 
    $query = " SELECT * FROM medecin WHERE medno='$data'"; 
	$result = $con->query($query);
	$row = $result->fetch_assoc();
	 echo $row['NumTel']."|";

}



if (isset($_POST['Test']) && !empty($_POST['Test']))  // Du coup la on verifie bien qu'on a post MedecinId avec javascript
{
    $data=$_SESSION['Id'];
    $data2=$_POST['Test'];
    $query = " SELECT * FROM rendez_vous WHERE medno='$data' AND rdv_date='$data2' AND etat='0'ORDER BY rdv_date ASC,rdvno ASC"; 
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

if (isset($_POST['Finition']) && !empty($_POST['Finition']))  // Du coup la on verifie bien qu'on a post MedecinId avec javascript
{ 
	if($_SESSION['Type_Rdv']=="Labo")
	{

			$data=$_POST['Finition']; 
		    $query = " SELECT * FROM labordv WHERE rdvNo='$data'"; 
		    $result = $con->query($query);
		    $row = $result->fetch_assoc();

			echo " <h5 class='modal-title' style=' color: #000;' id='mod2Label'> Numero : ".$_POST['Finition']."</h5> 

			<h5 class='modal-title' style=' color: #000;' id='mod2Label'> Date : ".$row['rdv_date']."</h5> 
			<h5 class='modal-title' style=' color: #000;' id='mod2Label'> Horaire : ".utf8_encode($row['rdv_horaire'])." h </h5> 

			"; 

			$data=$row['laboID']; 
		    $query = " SELECT * FROM labo WHERE laboID='$data'"; 
		    $result = $con->query($query);
		    $row = $result->fetch_assoc();

		    echo " <h5 class='modal-title' style=' color: #000;' id='mod2Label'> Laboratoire  : ".utf8_encode($row['nomLab'])."</h5> 
		    		<h5 class='modal-title' style=' color: #000;' id='mod2Label'> Prix : 25.99 $ </h5>
			"; 

	}
	else
	{


    $data=$_POST['Finition']; 
    $query = " SELECT * FROM rendez_vous WHERE rdvno='$data'"; 
    $result = $con->query($query);
    $row = $result->fetch_assoc();

	echo " <h5 class='modal-title' style=' color: #000;' id='mod2Label'> Numero : ".$_POST['Finition']."</h5> 

	<h5 class='modal-title' style=' color: #000;' id='mod2Label'> Date : ".$row['rdv_date']."</h5> 
	<h5 class='modal-title' style=' color: #000;' id='mod2Label'> Horaire : ".utf8_encode($row['rdv_horaire'])." h </h5> 
	<h5 class='modal-title' style=' color: #000;' id='mod2Label'> Lieu : ".utf8_encode($row['loc'])."</h5> 

	"; 
	$data=$row['medno']; 
    $query = " SELECT * FROM medecin WHERE medno='$data'"; 
    $result = $con->query($query);
    $row = $result->fetch_assoc();

    echo " <h5 class='modal-title' style=' color: #000;' id='mod2Label'> Medecin  : ".utf8_encode($row['medname'])."</h5> 
    	   <h5 class='modal-title' style=' color: #000;' id='mod2Label'> Specialité  : ".utf8_encode($row['medjob'])."</h5> 
	"; 

	if($row['medjob']=="Generale")
	{
		  echo " <h5 class='modal-title' style=' color: #000;' id='mod2Label'> Prix : 39.99 $ </h5> ";
	}
	else
	{
		 echo " <h5 class='modal-title' style=' color: #000;' id='mod2Label'> Prix : 50.99 $ </h5> ";

	}

	}





	 $_SESSION['Select']=$_POST['Finition'];

}
///////////////////////////////////////////////////////////////////// GENERALE //////////////////////////////////////////////////////



if (isset($_POST['Info2']) && !empty($_POST['Info2']))  // Du coup la on verifie bien qu'on a post MedecinId avec javascript
{

    $data=$_POST['Info2']; 
    $query = " SELECT * FROM medecin WHERE medno='$data'"; 
     $_SESSION['Type_Rdv']="Medecin";

    $result = $con->query($query);
    $row = $result->fetch_assoc();

    echo "  <h5 class='modal-title' style=' color: #000;' id='mod2Label'>".$row['medname']." ".$row['medjob']."</h5> |";

}

if (isset($_POST['Nom2']) && !empty($_POST['Nom2']))  // Du coup la on verifie bien qu'on a post MedecinId avec javascript
{

    $data=$_POST['Nom2']; 
    $query = " SELECT * FROM medecin WHERE medno='$data'"; 
    $result = $con->query($query);

    $row = $result->fetch_assoc();
    echo $row['medname']."|";
}

if (isset($_POST['Mail2']) && !empty($_POST['Mail2']))  // Du coup la on verifie bien qu'on a post MedecinId avec javascript
{

    $data=$_POST['Mail2']; 
    $query = " SELECT * FROM medecin WHERE medno='$data'"; 
    $result = $con->query($query);
    $row = $result->fetch_assoc();
     echo $row['email']."|";

}

if (isset($_POST['Horaire']) && !empty($_POST['Horaire']))  // Du coup la on verifie bien qu'on a post MedecinId avec javascript
{
    $data=$_POST['Horaire']; 
    $query = " SELECT * FROM rendez_vous WHERE medno='$data' ORDER BY rdv_date ASC, rdv_horaire ASC"; 
    $result = $con->query($query);

    if ($result->num_rows > 0)
     {
        echo '<option value="">Choisir un horaire </option>'; 
        while ($row = $result->fetch_assoc()) 
        {
            echo '<option value="'.$row['rdvno'].'">'.$row['rdv_horaire'].'h '.$row['rdv_date'].'</option>';  // Du coup la meme procedé, et on mettra dans horaire un truck de valeur rdvno et on affiche ce qui suit 
        }
    } else 
    {
        echo '<option value="">Aucun Rendez-vous </option>'; 
    }
}

if (isset($_POST['Img2']) && !empty($_POST['Img2']))  // Du coup la on verifie bien qu'on a post MedecinId avec javascript
{
    $data=$_POST['Img2']; 
	$query= " SELECT Image AS count FROM medecin WHERE medno='$data'";
	$result = $con->query($query);
	$row =$result->fetch_assoc(); 
	if ($row)
	{
		$img = $row['count'];     
		$_SESSION['Image']=$img;

		echo " <img style='width: 120px' class='img-radius' alt='User-Profile-Image'";
		echo 'src="data:image/png;base64,'.base64_encode( $row['count'] ).'"/>'."|";
	}
			
}

if (isset($_POST['Num2']) && !empty($_POST['Num2']))  // Du coup la on verifie bien qu'on a post MedecinId avec javascript
{

	$data=$_POST['Num2']; 
    $query = " SELECT * FROM medecin WHERE medno='$data'"; 
	$result = $con->query($query);
	$row = $result->fetch_assoc();
	 echo $row['NumTel']."|";

}

///////////////////////////////////////////////////////////////////// LABO //////////////////////////////////////////////////////


if (isset($_POST['getLabo']) && !empty($_POST['getLabo']))  // Du coup la on verifie bien qu'on a post MedecinId avec javascript
{
	$data=$_POST['getLabo']; 
	$query = " SELECT * FROM labo"; 
	$_SESSION['Type_Rdv']="Labo";

	$result = $con->query($query);
	$data2='';



	if ($result->num_rows > 0)
	 {
		while ($row = $result->fetch_assoc()) 
		{
			$data2 = $row['laboID'];
			echo " <a data-bs-toggle='modal' data-target='#mod3' href='#mod3' class='list-group-item list-group-item-action' aria-current='true' data-id='".$row['medno']."' value='".$row['medno']."'>
                              <div class='d-flex w-100 justify-content-between'>
                                <h5 class='mb-1'>".$row['nomLab']."</h5>
                              </div>
                              <p class='mb-1'>".$row['type']."</p>
                            </a> " ;

		}
		$_SESSION['Id'] = $data2;
	} 
} 

if (isset($_POST['Confirmer']) && !empty($_POST['Confirmer']))  // Du coup la on verifie bien qu'on a post MedecinId avec javascript
{
	echo "< script> alert(' OOUUU')</script ";
} 


if (isset($_POST['getLabo1']) && !empty($_POST['getLabo1']))  // Du coup la on verifie bien qu'on a post MedecinId avec javascript
{
	$_SESSION['Type_Rdv']="Labo";

	$data=$_POST['getLabo1']; 
	$query = " SELECT * FROM labo";  
	$result = $con->query($query);
	echo "$query";
	if ($result->num_rows > 0)
	 {
		while ($row = $result->fetch_assoc()) 
		{
			echo "<a data-bs-toggle='modal'   data-id='".$row['laboID']."' href='#mod3' class='list-group-item list-group-item-action' aria-current='true'>
      <div class='d-flex w-100 justify-content-between'>
        <h5 class='mb-1'>".utf8_encode($row['nomLab'])."</h5>
      </div>
      <p class='mb-1'>".$row['type']."</p>
    </a> " ;

		}
	} 
} 

if (isset($_POST['Info3']) && !empty($_POST['Info3']))  // Du coup la on verifie bien qu'on a post MedecinId avec javascript
{
	$_SESSION['Type_Rdv']="Labo";
	$data=$_POST['Info3']; 
	$query = " SELECT * FROM labo WHERE laboID='$data'"; 
	$result = $con->query($query);
	$row = $result->fetch_assoc();
	$_SESSION['Id'] = $row['laboID'];

	echo "  <h5 class='modal-title' style=' color: #000;' id='mod2Label'>".$row['nomLab']." ".$row['type']."</h5> |";

}

if (isset($_POST['Nom3']) && !empty($_POST['Nom3']))  // Du coup la on verifie bien qu'on a post MedecinId avec javascript
{
		$_SESSION['Type_Rdv']="Labo";


	$data=$_POST['Nom3']; 
	$query = " SELECT * FROM labo WHERE laboID='$data'"; 
	$result = $con->query($query);

	$row = $result->fetch_assoc();
    echo $row['nomLab']."|";
}

if (isset($_POST['Mail3']) && !empty($_POST['Mail3']))  // Du coup la on verifie bien qu'on a post MedecinId avec javascript
{
	$_SESSION['Type_Rdv']="Labo";

	$data=$_POST['Mail3']; 
	$query = " SELECT * FROM labo WHERE laboID='$data'"; 
	$result = $con->query($query);
	$row = $result->fetch_assoc();
	 echo $row['email']."|";

}

if (isset($_POST['Num3']) && !empty($_POST['Num3']))  // Du coup la on verifie bien qu'on a post MedecinId avec javascript
{
	$_SESSION['Type_Rdv']="Labo";

	$data=$_POST['Num3']; 
	$query = " SELECT * FROM labo WHERE laboID='$data'"; 
	$result = $con->query($query);
	$row = $result->fetch_assoc();
	 echo $row['numTel']."|";

}


if (isset($_POST['Init']) && !empty($_POST['Init']))  // Du coup la on verifie bien qu'on a post MedecinId avec javascript
{

	$data=$_SESSION['Client'];
	$data2=$_SESSION['Type'];
	$data3="";
	$data4="";

	$query="SELECT * FROM $data2 WHERE email='$data'";
	$result = $con->query($query);
	$row = $result->fetch_assoc();

		if ($_SESSION['Type']=='Admin')
		{
		     $data3='adlogin';
		     $data4='adpassword';

		}
		else   if ($_SESSION['Type']=='patient')
		{
		     $data3='patlogin';
		     $data4='patpassword';
		}
		else
		{
		    $data3='medlogin';
		    $data4='medpassword';
		}

	echo $row[$data3]."|";
	echo $row[$data4]."|";

}


if (isset($_POST['Test2']) && !empty($_POST['Test2']))  // Du coup la on verifie bien qu'on a post MedecinId avec javascript
{
	$_SESSION['Type_Rdv']="Labo";

    $data=$_SESSION['Id'];
    $data2=$_POST['Test2'];
    $query = " SELECT DISTINCT * FROM labordv WHERE laboID='$data' AND rdv_date='$data2' AND dispo='0'ORDER BY rdv_date ASC,rdvNo ASC"; 
    $result = $con->query($query);

    if ($result->num_rows > 0)
     {
        while ($row = $result->fetch_assoc()) 
        {
        echo " <a data-bs-toggle='modal' data-target='#fin' href='#fin' class='list-group-item list-group-item-action' aria-current='true' data-id='".$row['rdvNo']."'value='".$row['rdv_horaire']."'> ".$row['rdv_horaire']."h ";
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



if(isset($_POST["Modifier"])&& !empty($_POST['Modifier']))
{

	$pizza=$_POST["Modifier"];
	$pieces=explode("-",$pizza);
	echo $pieces[0];
	echo $pieces[1];

}

if (isset($_POST['strUser']) && !empty($_POST['strUser']))  // Du coup la on verifie bien qu'on a post MedecinId avec javascript
{
	$_SESSION['typeCarte']=$_POST['strUser'];
}



?>