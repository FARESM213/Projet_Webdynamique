<?php

// Start the session
session_start();

?>

<?php
// Set session variables (variables globales)
$_SESSION["Client"] = "";
$_SESSION["Type"] = "void";
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

            <div class="row justify-content-center my-4">
              <div class="col-3">
                <h3>

                  <input type="radio" name="Genre" value="patient" checked="checked"> Patient 

                </h3>
              </div>

              <div class="col-3">
                <h3>

                  <input type="radio" name="Genre" value="Admin"> Admin    
              
                </h3>
              </div>
            </div>


          <p>
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
          </p>


          <div class="row">
            <div class="col d-flex justify-content-center">
              <div>

                <input type="submit" name= "Connexion" value="Connexion" onclick="ValidMail(document.form1.Emaillog)">
                <a href="Changementinfo.php" > Mot de passe oublié ?</a>

              </div>
            </div>
          </div> 
        </form>  
    
        <div class="row my-3">
          <div class="col d-flex justify-content-center">
            <h2> --------------------------- </h2>

          </div>
        </div>
        
        <div class="row mb-4">
          <div class="col d-flex justify-content-center">
            <div>

              <a href="Creationcompte.php"> Creer un compte</a>

              
            </div>
          </div>
        </div>
    </div>
  </body>
</html>