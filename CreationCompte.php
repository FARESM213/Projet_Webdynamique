<?php

// Start the session
session_start();

?>

<?php

	require("traitement.php");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		

	</title>

<script type="text/JavaScript">

		function ValidateEmail(inputText)
		{
			var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
			if(inputText.value.match(mailformat))
			{
				return true;
			}
			else
			{
			document.form1.Email.focus();
			return false;
			}
		}
	
</script>

</head>
<body>

	<div>

		<form action="" method="post" enctype="multipart/form-data">

		<label> NOM  </label>		
		<input type="text" name="Nom"><br> <br>
		<label> Login </label>		
		<input type="text" name="Login"> <br> <br>
		<label> Email </label>		
		<input type="Email" name="Email"  placeholder="fares.messaoudi@edu.ece.Fr" required> <br> <br>
		<label> MDP  </label>		
	    <input type="password" name="Mdp" id="Mdp" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}$"> <br> <br>
		
		<label> Image </label>
		<input type="file" name="Image"> <br> <br> 

		<input type="submit" name= "insert" value=" Insert Value"> 

		<p>
			
			<?php 

			$message="";

			if(ajouter_patient($db_handle,$message))
				{
					header("Location: Login.php");
					die();
				}
			?>
		</p>


</form>
</div>
</body>
</html>
