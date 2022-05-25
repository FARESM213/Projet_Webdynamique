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
	$result = $con->query($query);
	$row = $result->fetch_assoc();
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


if (isset($_POST['Test']) && !empty($_POST['Test']))  // Du coup la on verifie bien qu'on a post MedecinId avec javascript
{
    $data=$_SESSION['Id'];
    $data2=$_POST['Test'];
    $query = " SELECT * FROM rendez_vous WHERE medno='$data' AND rdv_date='$data2' ORDER BY rdv_date ASC,rdvno ASC"; 
    $result = $con->query($query);



    if ($result->num_rows > 0)
     {
        while ($row = $result->fetch_assoc()) 
        {
        	echo "  <a data-id='".$row['rdvno']."' href='#'data-target='#' class='list-group-item list-group-item-action'>".$row['rdv_horaire']."h</a>";
        }
    } 
    else 
    {
        echo '<li Aucun Rendez-vous </li>'; 
    }
}




?>