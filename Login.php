<?php

// Start the session
session_start();

?>

<?php
// Set session variables (variables globales)
$_SESSION["Client"] = "";
$_SESSION["Type"] = "";
$_SESSION["Specialite"] = "";
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

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
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
      document.form1.Emaillog.focus();
      return false;
      }
    }
  
</script>

  </head>

  <body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    
    <div class="container box">
    
      <form action="" method="post" enctype="multipart/form-data">
      
          <div class="row">
            <div class="col">
          
              <h1 class="my-4 ">ECE-DOC</h1>
          
            </div>
          
          </div>
                
          <div class="row mb-2">
            <div class="col d-flex justify-content-center">
                
              <input type="Email" name="Emaillog"  placeholder="Entrez votre adresse mail" required>

            </div>
          </div>
            
          <div class="row mb-2">
            <div class="col d-flex justify-content-center">

              <input type="password" name="Mdplog" id="Mdplog" placeholder="Entrez votre mot de passe" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}$">
            
            </div>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="Genre" id="inlineRadio1" value="patient"> 
            <label class="form-check-label" for="inlineRadio1">Patient</label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="Genre" id="inlineRadio2" value="Admin">    
            <label class="form-check-label" for="inlineRadio2">Admin</label>
          </div>

            <?php 

            if(get_radio()!=false)
            {
              if(connexion($db_handle,get_radio($_SESSION["Num"]))=="Connexion validee")
                {
                  $_SESSION["Client"] =$_POST['Emaillog'] ;
                  $_SESSION["Type"] = get_radio();
                  $_SESSION["Num"]= $_POST['Emaillog'];
                  header("Location: profil.php");
                  die();
                }
                else if (!vide(['Emaillog','Mdplog']))
                {
                    echo connexion($db_handle,get_radio());
                }
            }

            ?>

          <div class="row">
            <div class="col d-flex justify-content-center">
              <div>

                <input type="submit" name= "Connexion" value="Connexion" onclick="ValidMail(document.form1.Emaillog)">         

                <h2> --------------------------- </h2>

            </div>
          </div> 

        </form>  
    

        <div class="row mb-4">
          <div class="col d-flex justify-content-center">
            <div>
              <a href="Changementinfo.php" > Mot de passe oublié </a>

              <a href="Creationcompte.php"> Creer un compte   </a>               

            </div>
          </div>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center">
              <div>

            </div>
          </div> 

    </div>
  </body>
</html>