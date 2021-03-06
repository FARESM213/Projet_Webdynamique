<?php

// Start the session
session_start();
require("traitement.php");
include('db_config.php');


$data1=$_SESSION['Select'];
$data2=$_SESSION['Id'];
$data3=$_SESSION["IdClient"];


$sql="";

if ($_SESSION['Type_Rdv']=="Medecin")
{
    $sql="UPDATE rendez_vous SET etat=1 ,patno='$data3' WHERE rdvno='$data1' ";
}
else
{
    $sql="UPDATE labordv SET dispo=1 ,patNo='$data3' WHERE rdvNo='$data1' ";

}

$res= mysqli_query($db_handle,$sql);
if($res)
{
     $message ="Changement effectuer ";   
}
 else
{
     $message ="Changement impossible ";
 }
 

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rendez Vous</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <script src="
    https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
        </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  
              <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
              <a href="index.php" class="navbar-brand p-0">
                  <img src="logo2.PNG" alt="" width="270" height="70">
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarCollapse">
                  <div class="navbar-nav ms-auto py-0">
                      <a href="index.php" class="nav-item nav-link active">Accueil</a>
                      <a href="toutparc.php" class="nav-item nav-link">Tout Parcourir</a>
                      <div class="nav-item dropdown">
                          <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Profil</a>

                          <div class="dropdown-menu m-0">
                              <?php 
                                      if($_SESSION['Client']=="")
                                      {
                                        echo " <a href='login.php'class='dropdown-item'>Se connecter</a> " ;//// 
                                      }  
                                      else
                                      {                                        
                                         echo " <a href='profil.php'class='dropdown-item'>Mon profil</a> " ;//// 
                                         echo " <a href='mesRdv.php'class='dropdown-item'>Mes Rendez-vous </a> " ;//// 
                                         echo " <a href='Deconnexion.php'class='dropdown-item'>Se deconnecter </a> " ;//// 

                                      }

                              ?>
                          </div>

                      </div>
                      
                      <?php 
                                      if($_SESSION['Client']!="")
                                      {
                                        echo "<a href='chat.php' class='nav-item nav-link'>Contact</a> ' ";//// 
                                      }  
                                      else
                                      {                                        
                                        echo "<a href='Login.php' class='nav-item nav-link'>Contact</a> ' ";//// 
                                      }
                              ?>
                  </div>
                  <button type="button" class="btn text-dark" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></button>

                   <?php 
                                      if($_SESSION['Client']=="")
                                      {
                                          echo "<a href='Login.php' class='btn btn-primary py-2 px-4 ms-3'>Prendre un Rendez-vous</a>";
                                      }  
                                      else
                                      {                                        
                                          echo "<a href='rdv.php' class='btn btn-primary py-2 px-4 ms-3'>Prendre un Rendez-vous</a>";
                                      }

                              ?>

                  <form class="d-flex" style= "padding-left: 190px;"role="search">
                    <input class="form-control me-2 " type="search" placeholder="Recherche" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Rechercher</button>
                  </form>
              </div>
          </nav>
  <div class="container mt-5 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card">
                        <div class="text-left logo p-2 px-5">
                            <img src="logo2.png" width="200">
                        </div>
                        <div class="invoice p-5">
                            <h5>Confirmation de votre rendez-vous</h5>
                            <?php  getNomClient($db_handle, $data3);  ?>
                            <span>Vous avez choisi le rendez-vous suivant :</span>
                            <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">
                                <table class="table table-borderless">  
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="py-2">
                                                    <span class="d-block text-muted">Date</span>
                                                    <?php  getDateRDV($db_handle, $data1);  ?>           
                                                </div>
                                            </td>
                                            <td>
                                                <div class="py-2">        
                                                </div>
                                            </td>
                                            <td>
                                                <div class="py-2">
                                                    <span class="d-block text-muted">Paiement</span>
                                                        <?php
                                                        if($_SESSION['typeCarte']=="1")
                                                        {
                                                        echo "  <span><img src='vitale.png' width='40' /></span>  ";
                                                        }   
                                                        else if($_SESSION['typeCarte']=="2")
                                                        {                                        
                                                        echo " <span><img src='visa.png' width='40' /></span> ";
                                                        }
                                                        else if($_SESSION['typeCarte']=="3")
                                                        {                                        
                                                        echo " <span><img src='mastercard.png' width='40' /></span> ";
                                                        }
                                                        else if($_SESSION['typeCarte']=="4")
                                                        {                                        
                                                        echo "<span><img src='other.png' width='40' /></span> ";
                                                        }
                                                        ?>        
                                                                   
                                                </div>
                                            </td>
                                            <td>
                                                <div class="py-2">
                                                    <span class="d-block text-muted">Votre Email</span>
                                                    <?php  getMail($db_handle, $data3);  ?>   
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                                <div class="product border-bottom table-responsive">
                                    <table class="table table-borderless">
                                    <tbody>   
                                        <td width="60%">
                                        <?php  getRDVHoraire($db_handle, $data1);  ?>  
                                        <?php  getDocteurInfo($db_handle, $data2);  ?> 
                                        </tr>
                                    </tbody>                           
                                    </table>
                                </div>
                                <div class="row d-flex justify-content-end">
                                    <div class="col-md-5">
                                        <table class="table table-borderless">           
                                        </table>     
                                    </div>
                                </div>
                                <?php  getDocteurInfo2($db_handle, $data2);  ?>
                                <p class="font-weight-bold mb-0">Merci !</p>
                                <span>OMNES Sante</span></br></br></br>
                                <div class="row d-flex justify-content-end">
                                <a class="btn btn-info" href="index.php" role="button">Retour a l'accueil</a>
</div>
                            

                        </div>


                        <div class="d-flex justify-content-between footer p-3">

                            <span> Questions ? Visitez notre <a href="#"> help center</a></span>
                
                            
                        </div>



            
        </div>
                
            </div>
            
        </div>
        
    </div>


</body>
<footer class="fixed-bottom bg-light" style="padding-bottom:10px;">
  <!-- Grid container -->
  <div class="container" style="margin-top:10px;">
    <!--Grid row-->
    <div class="row"style="margin-bottom:10px;">
      <!--Grid column-->
      <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
          <a href="mailto:omnessante@omnes.com" class="text-dark" >Mail : omnessante@omnes.com</a>
      </div>
      <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
          <a href="https://www.google.com/maps/place/ECE+Paris/@48.8517668,2.2864819,15z/data=!4m2!3m1!1s0x0:0x167f5a60fb94aa76?sa=X&ved=2ahUKEwjq5cC_s_T3AhUP_4UKHX_KATsQ_BJ6BQi_ARAF!" class="text-dark">Adresse : 37 Quai de Grenelle, 75015 Paris</a>
      </div> 
      <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
          <a href="#!" class="text-dark">Telephone : 01 00 00 00 00</a>
      </div>
    </div> 
      <!--Grid column-->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgb(164, 231, 252);">
    ?? 2022 Copyright:
    <a class="text-dark" href="index.php">OMNESSante.com</a>
  </div>
  <!-- Copyright -->
        </div>
</footer>
    </wrapper> 


</html>