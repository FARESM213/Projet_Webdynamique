<?php
  // Start the session
  session_start();
?>

<?php
  // Set session variables (variables globales)
  $_SESSION["Client"] = "";
  $_SESSION["Type"] = "";
?>

<?php
  require("traitement.php");
  function get_radio()
  {
    if(isset($_POST['Connexion']))
    {
      if(!empty($_POST['Genre']))
        return $_POST['Genre'];
      else 
      {
        echo "<p style='color : red;'>Veuillez selectionner un type de connexion </p>";
        return false;
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">

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
          document.form1.Emaillog.focus();
          return false;
        }
      } 
    </script>
  </head>

  <body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  
           <!-- Sing in  Form -->
         <br> <br> <br> <section class="signIN">

            <div class="container">

                <div class="signin-content">

                    <div class="signin-image">

                        <figure><img src="images/LoginIM.png" alt="sing up image"></figure>
                        <a href="Creationcompte.php" class="signup-image-link">Create an account</a>

                    </div>

                    <div class="signin-form">

                        <h2 class="form-title">Sign up</h2>
                        
                        <form method="POST" class="register-form" id="login-form">
                            
                            <div class="form-group">
                                <label for="Emaillog"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="Email" name="Emaillog"  placeholder="Adresse mail" required>
                            </div>

                            <div class="form-group">
                                <label for="Mdplog"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="Mdplog" id="Mdplog" placeholder="Mot de passe" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}$">
                            </div>

                            <div class="form-group">

                              <input type="radio" name="Genre" id="inlineRadio1" class="agree-term form-check-input" value="patient"/>
                              <label for="inlineRadio1" class="label-agree-term"><span><span></span></span>Patient</label>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                                
                              <input type="radio" name="Genre" id="inlineRadio2" class="agree-term form-check-input" value="Admin"/>
                              <label for="inlineRadio2" class="label-agree-term"><span><span></span></span>Admin</label>
                               
                            </div>

                            <?php 
                              if(get_radio()!=false)
                              {
                                if(connexion($db_handle,get_radio())=="Connexion validee")
                                  {
                                    $_SESSION["Client"] =$_POST['Emaillog'] ;
                                    $_SESSION["Type"] = get_radio();
                                    header("Location: Projet.php");
                                    die();
                                  }
                                  else if (!vide(['Emaillog','Mdplog']))
                                  {
                                      echo connexion($db_handle,get_radio());
                                  }
                              }
                            ?>
                            <div class="form-group form-button">
                                <input type="submit" name= "Connexion" value="Connexion" class="form-submit" onclick="ValidMail(document.form1.Emaillog)">
                            </div>

                        </form>

                        <div class="signin-image">

                          <br> <br> <a href="Changementinfo.php" class="signup-image-link">Mot de passe oublié ?</a>

                        </div>
                    </div>
                </div>
            </div>
          </section>
  </body>
</html>