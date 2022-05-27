<?php

// Start the session
session_start();

?>

<?php

	require("traitement.php");
	include('db_config.php');

	$_SESSION['NomCreation']="";
	$_SESSION['PseudoCreation']="";
	$_SESSION['MailCreation']="";
	$_SESSION['MdpCreation']="";


?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Céer un compte</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
 
    <!-- Font Icon -->
    <link rel="stylesheet" href="LoginAndRegisterRessources/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="LoginAndRegisterRessources/css/style.css">
   
</head>
	<body>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>   
		
		 <!-- Sign up form -->
		 <br><section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Créer un compte (1/2)</h2>
                        <form method="POST" class="register-form" id="register-form">
							<div class="form-group">
								<label for="Nom"><i class="zmdi zmdi-account material-icons-name"></i></label>
								<input type="text" name="Nom" id="Nom" placeholder="Votre Nom"/>
							</div>
                            <div class="form-group">
							<label for="Login"><i class="zmdi zmdi-account "></i></label>
                    		<input type="text" name="Login" id="Login" placeholder="Pseudo"/>
                            </div>
                            <div class="form-group">
							<label for="Email"><i class="zmdi zmdi-email"></i></label>
                      		<input type="Email" name="Email" id="Email" placeholder="Votre Adresse Mail"/>
                            </div>
                            <div class="form-group">
								<label for="Mdp"><i class="zmdi zmdi-lock"></i></label>
								<input type="password" name="Mdp" id="Mdp" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}$"> 
                            </div>
                            <div class="form-group">
							<a href="Login.php" class="signup-image-link">Je suis déjà membre</a> 
							</div>
                            <div class="form-group form-button">
							<input type="submit" name="insert" id="signup" class="form-submit" value="Continuer"/>
                            </div>
							<p>
								<?php 
								$message="";

								 if(ajouter_patient($db_handle,$message))
									{
										header("Location: CreerCompte2.php");
										die();
									}
								?>
							</p>
                        </form>
                    </div>
					<div class="signup-image">
                        <figure><img src="LoginAndRegisterRessources/images/loginIM" alt="sing up image"></figure>
                    </div>
                </div>
            </div>
        </section>
	</body>
</html>
