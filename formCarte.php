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
        <wrapper>

        <style>
            </style>

            <head>
           
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>OMNES Sante</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
                <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
                <script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
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
                                            echo "<a href='chat.php' class='nav-item nav-link'>Contact</a> '" ;//// 
                                        }  
                                        else
                                        {                                        
                                            echo "<a href='Login.php' class='nav-item nav-link'>Contact</a> '";//// 
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

                    <script type="text/javascript">          


                    function disable(select_val,input_id, input_id2) {
                    var e = document.getElementById(select_val);
                    var strUser = e.options[e.selectedIndex].value;
                   
                    if(strUser === "2" || strUser==="3" || strUser==="4"){
                        document.getElementById(input_id).disabled = false;
                        document.getElementById(input_id2).disabled = false;                        
                    }
                    else{
                        document.getElementById(input_id).value = document.getElementById(input_id).defaultValue;
                        document.getElementById(input_id).disabled = true;

                        document.getElementById(input_id2).value = document.getElementById(input_id2).defaultValue;
                        document.getElementById(input_id2).disabled = true;
                    }
                }
                    function sendTypeCarte(select_val){

                        var e = document.getElementById(select_val);
                        var strUser = e.options[e.selectedIndex].value;
                            $(document).ready(function()
                                {
                                    $.ajax({
                                                url :"action.php",           // Valeur va etre renvoyée a action.php
                                                type:"POST",                 
                                                cache:false,                          // jsp ce que c'est 
                                                data:{strUser:strUser},          // la en gros bah quand on va essayer de recuperer la valeur dans action.php, faudra mettre ca 
                                                success:function(data)
                                                {
                                                  alert(data);      // Avoir la valeur renvoyé par action.php de ce que j'ai compris  qu'on met dans horaire
                                                }
                                            });     
                                        })
                    }

                    </script>   


                    <form class="d-flex" style= "padding-left: 190px;"role="search">
                        <input class="form-control me-2 " type="search" placeholder="Recherche" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Rechercher</button>
                    </form>
                </div>
            </nav>
        
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
                
                        </div>
                    </div> 

        

            <div class="container mt-5 mb-12">
                <div class="row d-flex justify-content-center">
                <h1> Vos informations </h1>
                            <form>
                            <div class="form-group">
                                <label for="typeCarte">Type de carte</label>
                                <select class="form-control" name="typeCarte" id="typeCarte" onchange="disable('typeCarte', 'cvcCarte','numCarte' )">
                                    <option value="0"  selected="true" disabled="disabled" >- Veuillez choisir un type de carte -</option>
                                    <option value="1">Carte Vitale</option>
                                    <option value="2">Visa</option>
                                    <option value="3">MasterCard</option>
                                     <option value="4" >Autre</option>                          
                            </select>
                            </div>
                            <div class="form-group" style="width:300px;">
                                <label for="numCarte">Numero de Carte</label>
                                <input type="number" class="form-control" id="numCarte" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type = "number" maxlength = "16">
                            </div>
                            <div class="form-group" style="width:100px;">
                                <label for="cvcCarte">CVC</label>
                                <input type="number" class="form-control"name="cvcCarte" id="cvcCarte"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type = "number" maxlength = "4">
                            </div>
                            <div class="form-group"style="width:300px;">
                            <label for="nomClient">Nom</label>
                                <input type="text" class="form-control" id="nomClient"></br></br></br></br>
                            </div>
                            </form>
                            <a href='confirmation.php' class='btn btn-info py-2 px-4 ms-3' onclick="sendTypeCarte('typeCarte')" id="confirm">Confirmer</a>
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
    © 2022 Copyright:
    <a class="text-dark" href="index.php">OMNESSante.com</a>
  </div>
  <!-- Copyright -->
        </div>
</footer>
        </wrapper> 
        
        
    </html>
