<?php

// Start the session
session_start();
require("traitement.php");

?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <!-- Font Icon -->
    <link rel="stylesheet" href="LoginAndRegisterRessources/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="LoginAndRegisterRessources/css/style.css">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
</head>

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

<body onload = "InitialState()">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>   
	<section class="signIN">
        <div class="container">
            <h2 class="form-title"></h2>
            <div class="signin-content">
                
                <div class="signin-form" style= " width: 300px;margin-right:-10px; margin-bottom: -30px;" >
                    <h2 class="form-title">MDP oublié</h2>
					<form class="register-form" style="margin-right:-30px" id="login-form" action="" method="post" enctype="multipart/form-data">
						<div  id="container" class="form-group">
                    	
                            
                                <div class="form-group">
                                    <label for="Login"><i class="zmdi zmdi-account "></i></label>
                                    <input type="text" name="LoginC" id="LoginC" placeholder="Pseudo" minlength="5" />
                                </div>
                                
                                <div class="form-group">
                                    <label for="user_email"><i class="zmdi zmdi-email"></i></label>
                                    <input type="Email" name="EmailC" id="EmailC" placeholder="Adresse mail" required>
                                </div>

								
                    	</div>
                       

                    	<div id="container1" class="form-group">
                            <div class="form-group">

                                <label for="Mdp1"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="Mdp1" id = "Mdp1" placeholder="Mot de passe" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}$">
 
                            </div>
                                
                       		<div class="form-group">

                                <label for="Mdp2"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="Mdp2" id = "Mdp2" placeholder="Conirmer mot de passe" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}$">
                           
                            </div>

                          <div id="BTN-contain" class="form-group form-button">
                       <input  name="Update" id="hold" type="submit" value="Search" style="background-color: rgb(142, 209, 241);" onclick="ENA()">
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
						</div>
					</form>
                    

                </div>

                <div class="signin-image" >

                    <figure><img src="LoginAndRegisterRessources/images/IllustrationMdpOublie.jpg" alt="sing up image" style="width:500px; height: 350px; margin-left:-10px;"></figure>
					<br> <a href="Login.php" class="signup-image-link" style="font-size: 12px;">Retour à la connexion</a>
                </div>
            </div>
        </div>
    </div>
</section>
	<script>

		// (B1) GET ALL FORM ELEMENTS
		var all = document.querySelector("#EmailC");
		var all1 =  document.querySelector("#Mdp1");
		var all2 =  document.querySelector("#Mdp2");
		var all3 = document.querySelector("#LoginC");


		

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
</body>


</html>
