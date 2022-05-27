<?php

// Start the session
session_start();

?>

<?php

    require("traitement.php");
    include('db_config.php');

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Changement Mot de Passe</title>

    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>

    <div class="main">

        <section class="login">
            <div class="container">
                <div class="login">
                    <div class="login-form">
                        <h3 class="form-title">Autentification</h3>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <input type="text" name="Pseudo" id="Pseudo" placeholder="Pseudo"/>
                            </div>
                            <div class="form-group">
                                <input type="email" name="Mail" id="Mail" placeholder="Adresse Mail"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Vérifier"/>
                            </div>
                        </br>
                        </form>
                    </div>
                </div>
            </div>
        </br>

        <section class="MdpOubli">
            <div class="container">
                <div class="MdpOubli">
                    <div class="Mdp-form">
                        <h3 class="form-title">Changement Mot de Passe</h3>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <input type="password" name="Mdp" id="Mdp" placeholder="Mot de Passe"/>
                            </div>
                            <div class="form-group">
                                <input type="password" name="reMdp" id="reMdp" placeholder="Confirmation"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Changer"/>
                            </div>
                        </br>
                        </form>
                    </div>
                </div>
            </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>