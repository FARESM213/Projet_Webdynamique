<?php
// Include the database connection file
include('db_config.php');

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

	if ($result->num_rows > 0)
	 {
		while ($row = $result->fetch_assoc()) 
		{
			echo " <a data-bs-toggle='modal' data-target='#mod2' href='#mod2' class='list-group-item list-group-item-action' aria-current='true' data-id='".$row['medno']."'>
                              <div class='d-flex w-100 justify-content-between'>
                                <h5 class='mb-1'>".$row['medname']."</h5>
                              </div>
                              <p class='mb-1'>".$row['medjob']."</p>
                            </a> " ;

		}
	} 
} 



if (isset($_POST['getSpe']) && !empty($_POST['getSpe']))  // Du coup la on verifie bien qu'on a post MedecinId avec javascript
{
	$data=$_POST['getSpe']; 
	$query = " SELECT * FROM medecin WHERE medjob='$data'"; 
	$result = $con->query($query);
	echo "$query";
	if ($result->num_rows > 0)
	 {
		while ($row = $result->fetch_assoc()) 
		{
			echo "<a data-bs-toggle='modal'   data-id='".$row['medno']."' href='#mod1' class='list-group-item list-group-item-action' aria-current='true'>
      <div class='d-flex w-100 justify-content-between'>
        <h5 class='mb-1'>".utf8_encode($row['medname'])."</h5>
      </div>
      <p class='mb-1'>Medecin Généraliste.</p>
    </a> " ;

		}
	} 
} 

if (isset($_POST['Info2']) && !empty($_POST['Info2']))  // Du coup la on verifie bien qu'on a post MedecinId avec javascript
{

	$data=$_POST['Info2']; 
	$query = " SELECT * FROM medecin WHERE medno='$data'"; 
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


if (isset($_POST['getdate']) && !empty($_POST['getdate']))  // Du coup la on verifie bien qu'on a post MedecinId avec javascript
{
	$data=$_POST['getdate']; 
	echo " <script> alert('OUI'); </script";
} 


if (isset($_POST['Info']) && !empty($_POST['Info']))  // Du coup la on verifie bien qu'on a post MedecinId avec javascript
{

	$data=$_POST['Info']; 
	$query = " SELECT * FROM medecin WHERE medno='$data'"; 
	$result = $con->query($query);
	$row = $result->fetch_assoc();
	echo "  <h5 class='modal-title' style=' color: #000;' id='mod2Label'>".$row['medname']." ".$row['medjob']."</h5> |";
                   
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




?>