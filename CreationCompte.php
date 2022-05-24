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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" > 
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 
	<link href="LoginStyles.css" rel="stylesheet">

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

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>   
		
		<form class = "box2" action="" method="post" enctype="multipart/form-data">
			
			<div class="container">		
				<div class="row">
					<div class="col justify-content-center">

						<h1 class="my-4 ">CREER  UN COMPTE</h1>

					</div>
				</div>

				<div class="row justify-content-center">

					<div class="col-6">
						<div>
							<div class = "contain"> 
								<div class = "wrapper"> 

									<div class ="Pimage">
										<img src ="medgen.jpg">
									</div>

									<div class="content">
										<div class = "text"> No file chosen , yet ! </div> 
									</div>

								</div>	

							</div>
						</div>	
					</div>
				</div>

				<div class="row justify-content-center">

					<div class="col-3">
						<div>

						<input type="file" id="file" accept="image/*"> 
							<label class="selIm"> 
								<i class="material-icons">
									add_photo_alternate 
								</i> &nbsp;
								Choisir une photo
							</label>

						</div>
					</div>
				</div>

				<div class="row my-3 justify-content-center">
				<div class="row  justify-content-center">

				<div class="row  my-2 justify-content-around">

					<div class="col-6">
						<div>
							<input type="text" name="Login"  placeholder="Entrez votre pseudo" required>

						</div>

					</div>

					<div class="col-6">
						<div>

							<input type="text" name="Nom"  placeholder="Entrez votre nom" required>

						</div>
					</div>
				</div>
				
				<div class="row my-2 justify-content-center">
					

				</div>

				<div class="row my-2 justify-content-around">
					<div class="col-6">
						<div>

							<input type="Email" name="Email"  placeholder="Entrez une adresse mail" required>
						
						</div>
					</div>

					<div class="col">
						<div >
							<input type="password" name="Mdp" id="Mdp" placeholder="Entrez votre mot de passe" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}$">
						</div>
					</div>

				</div>

				<div class="row my-2 justify-content-around">
				
						
				</div>

				<div class="row my-4">
					<div class="col d-flex justify-content-center">
					
						<input type="submit" name= "insert" value="Creer mon compte"> 	

					</div>
				</div>

				<div class="row my-5">
					<div class="col d-flex justify-content-center">
					
						<a href="Login.php"> Revenir a l'acceuil </a> 	

					</div>
				</div>

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
			</div>
		</form>
	</body>
</html>
