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

?>