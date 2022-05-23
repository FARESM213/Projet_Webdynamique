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
			<input type="text" name="Login"> <br> <br>
			<label> Email </label>		
			<input type="Email" name="Email"  placeholder="fares.messaoudi@edu.ece.Fr" required> <br> <br>

			<input type="submit" name= "insert" value=" Insert Value"> 



		<div>
			<label style="color:blue;"> Nouveau Mdp</label>
	    	<input type="password" name="Mdp1" id="Mdp2" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}$"> <br> <br>
		    <label style="color:blue;">Confirmer le Nouveau Mdp</label>
	    	<input type="password" name="Mdp2" id="Mdp2" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}$"> <br> <br>

			<button type="submit" name="re_password">Submit</button>

			
		</div>

			    
			
			<?php 
			$message="";

			
			
			?>


	</form>
</div>
</body>
</html>
