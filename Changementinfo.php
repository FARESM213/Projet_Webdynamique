<?php

// Start the session
session_start();
require("traitement.php");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		
	</title>
</head>

<body>

	<div>

	<form action="" method="post" enctype="multipart/form-data">


			<label> Login </label>		
			<input type="text" name="LoginC"> <br> <br>
			<label> Email </label>		
			<input type="Email" name="EmailC"  placeholder="fares.messaoudi@edu.ece.Fr" required> <br> <br>			

			<label style="color:blue;"> Nouveau Mdp</label>
	    	<input type="password" name="Mdp1" id="Mdp1" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}$"> <br> <br>
		    <label style="color:blue;">Confirmer le Nouveau Mdp</label>
	    	<input type="password" name="Mdp2" id="Mdp2" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}$"> <br> <br>

			<button type="submit" name="Update" id="hold">Changer</button>

			
		</div>

			<?php 
				$message="";
			    changer_mdp($db_handle,$message);
				if ($message=="Changement effectuer ")
				{   
					if (isset($_POST['Update']))
					{
						echo '<script>
						alert(" Mot de passe modifié ! Redirection vers Login ");
						window.location.href="Login.php";
						</script>';
					}
					
				} 
				else if ($message!="")
				{
				  echo "<script>alert('$message');</script>";

				}

			?>


	</form>
</div>
</body>
</html>
