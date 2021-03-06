<?php
  // Start the session
  session_start();
  include('db_config.php');
  require_once("Session.php");

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
      <!-- Font Icon -->
    <link rel="stylesheet" href="LoginAndRegisterRessources/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="LoginAndRegisterRessources/css/style.css">

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

           <!-- Sing in  Form -->
         <br> <br> <section class="signIN">

            <div class="container">

                <div class="signin-content">

                    <div class="signin-image">

                        <figure><img src="LoginAndRegisterRessources/images/SignnUpIllustration.jpg" alt="sing up image"></figure>
                        <br> <a href="Creationcompte.php" class="signup-image-link">Créer un compte</a>

                    </div>

                    <div class="signin-form">

                        <h2 class="form-title">Se connecter</h2>
                        
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
                                
                              <input type="radio" name="Genre" id="inlineRadio3" class="agree-term form-check-input" value="medecin"/>
                              <label for="inlineRadio3" class="label-agree-term"><span><span></span></span>Medecin</label>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp

                              <input type="radio" name="Genre" id="inlineRadio2" class="agree-term form-check-input" value="admin"/>
                              <label for="inlineRadio2" class="label-agree-term"><span><span></span></span>Admin</label>
                               
                            </div>

                            <?php 

            include('db_config.php');

            if(get_radio()!=false)
            {
              if(connexion($db_handle,get_radio($_SESSION["Client"]))=="Connexion validee")
                {
                   $_SESSION["Client"] =$_POST['Emaillog'] ;
                   $_SESSION["Type"] = get_radio();

                   $data3=$_SESSION['Client'];

                   $data1=$_SESSION["Type"];
                   $data2="";
                   $data4="";
                   $data5="";
                   $data6="";
                   $data7="";


                     if($_SESSION["Type"]=='medecin')
                     {
                             $data2="medno";
                             $data4="medpassword";
                             $data5="medlogin";
                             $data6="medname";
                             $data7="NumTel";



                     } 
                      else if ($_SESSION["Type"]=="patient")
                     {
                             $data2="patno";
                             $data4="patpassword";
                             $data5="patlogin";
                             $data6="patname";
                             $data7="Telephone";

                     }
                    else
                    {
                      $data2="adno";
                      $data4="adpassword";
                      $data6="adname";
                      $data7="numTel";


                     }          
                  $query = "SELECT * FROM ".$data1." WHERE email='$data3'"; 
                  $result = $con->query($query);
                  echo $_SESSION["Type"];
                  if ($result->num_rows> 0)
                   {
                        $row = $result->fetch_assoc();
                        $_SESSION["IdClient"] = $row[$data2]; 
                        $_SESSION["MdpClient"]=$row[$data4];
                        if($_SESSION["Type"]!='admin')
                        {
                            $_SESSION["LoginClient"]=$row[$data5];
                        }
                        else
                        {
                            $_SESSION["LoginClient"]=$row[$data6];

                        }
                        $_SESSION["Nom"] = $row[$data6];
                        $_SESSION['Tel']=$row[$data7];


                     if($_SESSION["Type"]=='medecin')
                     {

                        $_SESSION['Job']=$row['medjob'];
                        $_SESSION['Hospital']=$row['hopital'];

                     }
                     else if ($_SESSION["Type"]=='patient')
                     {

                        $_SESSION["Add1"] = $row['addresse1'];
                        $_SESSION['Add2']=$row['adresse2'];
                        $_SESSION['Ville']=$row['ville'];
                        $_SESSION["Pays"] =$row['Pays'];
                        $_SESSION['CodePostal']=$row['CodePostal'];
                        $_SESSION['Vitale']=$row['CarteVitale'];
                     }

                    }   
                unset($_SESSION['name']); // delete any specific session only

                    if ($_SESSION['Type']=='admin')
                    {
                         header("Location: admin.php");
                        die();

                    }
                    else
                    {
                        header("Location: toutparc.php");
                        die();

                    }

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

                        <br> <br> <a href="Changementinfo.php" class="signup-image-link">Mot de passe oublié </a>

                        </div>
                    </div>
                </div>
            </div>
          </section>
  </body>
</html>