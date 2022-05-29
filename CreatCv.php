<?php

// Start the session
session_start();
require("traitement.php");
header( 'content-type: text/html; charset=utf-8' );
include('db_config.php');

?>

<?php


 $data=$_SESSION['Nom_create_CV'];

 $query = " SELECT * FROM medecin WHERE medno='$data'"; 
 $result = $con->query($query);
 $data2="";

    if ($result->num_rows > 0)
     {
        while ($row = $result->fetch_assoc()) 
        {
            $data2=$row['medname'];

        }
    
    }
    $_SESSION['Nom_create']=$data2;

?>
<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Créer un CV</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
 
    <!-- Font Icon -->
    <link rel="stylesheet" href="LoginAndRegisterRessources/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="LoginAndRegisterRessources/css/style.css">
   
</head>


    <body>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>   
        
            <br><section class="signup">

                <form method='POST' action='sauvegardeCv.php'>
                                                    
                    <div class="container" style="width:940px;">

                        <div class="topofpage">

                            <div class="row justify-content-between">
                                <div class="col-12">         
                                        <input type="text" style="margin-top:20px; margin-left:15px; width: 500px; height:100px;font-size:30px;" class="form-control" name="Nom" id="Nom" placeholder="Nom et Prénom"/>
                                </div>
                                
                                <div class="col" style="margin-left:30px;">
                                    <ul>
                                        <li> <input type="text" style="margin-top:10px; width: 300px; height:25px;" class="form-control" name="Adresse" id="Adresse" placeholder="Adresse"/></li>
                                        <li>  <input type="text" style="margin-top:5px; width: 300px; height:25px;" class="form-control" name="Telephone" id="Telephone" placeholder="Telephone"/></li>
                                        <li>  <input type="text" style="margin-top:5px; margin-right:15px; width: 300px; height:25px;" class="form-control" name="Email" id="Email" placeholder="Email"/></li>
                                    </ul>
                                </div>
                            </div>
                                       
                            <div class="row" style="margin-left:9px;">
                                <div class="col-12">
                                    <input type="text" style="margin-top:5px; width: 825px; height:125px; " class="form-control" name="Nom" id="Nom" placeholder="A propos de vous... "/>   
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                    <div class="row " style="margin:15px;">
                                    
                                            <h1 style="margin-top:15px;"> Education</h1>
                                            <h4>Diplômes</h4>
                                            <div class="border" style="width:240px; padding:10px; padding-bottom:0px; margin-top:0px;">
                                                <input type="text" class="form-control" style="margin-top:10px; width: 200px; height:25px;" name="Diplome1"  id="Diplome1" placeholder="Premier Diplome "/>
                                                <input type="text" class="form-control" style="margin-top:10px; width: 200px; height:25px;" name="Etablissement1"  id="Etablissement1" placeholder="Etablissement1 "/>
                                                <div class="row justify-content-around">
                                                    <div class="col">
                                                        <input type="text" class="form-control" style="margin-top:10px; width: 85px; height:25px;" name="from1"  id="from1" placeholder="Du"/>
                                                    </div>
                                                    <div class="col">    
                                                        <input type="text" class="form-control" style="margin-top:10px; width: 85px; margin-left:-30px; height:25px;" name="to1"  id="to1" placeholder="Au"/> <br>
                                                    </div>
                                                </div>
                                            </div>
                                
                                    </div>

                                    <div class="row " style="margin-left:15px; border-radius: 30%; margin-top: -20px;">
                                            <div class="border" style="width:240px; padding:10px; padding-bottom:0px; margin-top:10px;">
                                                <input type="text" class="form-control" style="margin-top:10px; width: 200px; height:25px;" name="Diplome2"  id="Diplome2" placeholder="Deuxieme Diplome "/>
                                                <input type="text" class="form-control" style="margin-top:10px; width: 200px; height:25px;" name="Etablissement2"  id="Etablissement2" placeholder="Etablissement1 "/>
                                                <div class="row justify-content-around">
                                                    <div class="col">
                                                        <input type="text" class="form-control" style="margin-top:10px; width: 85px; height:25px;" name="from2"  id="from2" placeholder="Du"/>
                                                    </div>
                                                    <div class="col">    
                                                        <input type="text" class="form-control" style="margin-top:10px; width: 85px; margin-left:-30px; height:25px;" name="to2"  id="to2" placeholder="Au"/> <br>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                    </div>
                            </div>

                            <div class="col" style="margin-top:15px;margin-left:-50px;">
                                
                                <h1 style="margin-top:15px;"> Emplois</h1>
                                <h4></h4>
                                <div class="border" style="width:240px; padding:10px; padding-bottom:0px; margin-top:45px;">
                                <input type="text" class="form-control" style="margin-top:10px; width: 200px; height:25px;" name="Emploi1"  id="Emploi1" placeholder="Premier emploi "/>
                                <input type="text" class="form-control" style="margin-top:10px; width: 200px; height:25px;" name="Entreprise1"  id="Entreprise1" placeholder="Entreprise"/>
                                <div class="row justify-content-around">
                                    <div class="col">
                                        <input type="text" class="form-control" style="margin-top:10px; width: 85px; height:25px;" name="from3"  id="from3" placeholder="Du"/>
                                    </div>
                                
                                    <div class="col">    
                                        <input type="text" class="form-control" style="margin-top:10px; width: 85px; margin-left:-30px; height:25px;" name="to3"  id="to3" placeholder="Au"/> <br>
                                    </div>
                                </div>
                                <input type="text" class="form-control" style="margin-top:10px; width: 200px; height:25px;" name="Description1"   id="Description1" placeholder="Description"/>
                                <ul>
                                        <li> <input type="text" style="margin-top:10px; width: 150px; height:15px; font-size:11px;" class="form-control" name="achievement11"  id="achievement11" placeholder="Mission1"/></li>
                                        <li>  <input type="text" style="margin-top:5px; width: 150px; height:15px;font-size:11px;" class="form-control" name="achievement12"  id="achievement12" placeholder="Mission2"/></li>
                                        <li>  <input type="text" style="margin-top:5px; margin-right:15px; width: 150px; height:15px; font-size:11px;" class="form-control" name="achievement13"  id="achievement13" placeholder="Mission3"/></li>
                                </ul>
                            </div>

                        </div>

                            <div class="col-4">
                            <div class="border" style="width:240px; padding:10px; padding-bottom:0px; margin-top:123px;margin-left:-90px;">
                                <input type="text" class="form-control" style="margin-top:10px; width: 200px; height:25px;" name="Emploi2"  id="Emploi2" placeholder="Deuxieme Emploi "/>
                                <input type="text" class="form-control" style="margin-top:10px; width: 200px; height:25px;" name="Entreprise2"  id="Entreprise2" placeholder="Entreprise "/>
                                <div class="row justify-content-around">
                                    <div class="col">
                                        <input type="text" class="form-control" style="margin-top:10px; width: 85px; height:25px;" name="from4"  id="from4" placeholder="Du"/>
                                    </div>
                                
                                    <div class="col">    
                                        <input type="text" class="form-control" style="margin-top:10px; width: 85px; margin-left:-30px; height:25px;" name="to4"  id="to4" placeholder="Au"/> <br>
                                    </div>
                                </div>
                                <input type="text" class="form-control" style="margin-top:10px; width: 200px; height:25px;" name="Description2"   id="Description2" placeholder="Description "/>
                                <ul>
                                        <li> <input type="text" style="margin-top:10px; width: 150px; height:15px; font-size:11px;" class="form-control" name="achievement21"  id="achievement21" placeholder="Mission1"/></li>
                                        <li>  <input type="text" style="margin-top:5px; width: 150px; height:15px;font-size:11px;" class="form-control" name="achievement22"  id="achievement22" placeholder="Mission2"/></li>
                                        <li>  <input type="text" style="margin-top:5px; margin-right:15px; width: 150px; height:15px; font-size:11px;" class="form-control" name="achievement23"  id="achievement23" placeholder="Mission3"/></li>
                                </ul>
                            </div>
                                    
                        </div>

                               
                

                        <div class="bottomofpage">
                            <div class="row" style="margin-left:20px;">
                                <h1 style="margin-top:15px;"> Passion et Interet</h1>
                                <input type="text" class="form-control" name="Interet" style = "width: 825px; height:300px;" id="Interet" placeholder="Passions et interets..."/>
                            </div>
                        </div>

                        <div class="row justify-content-between" style = "margin:15px;">
                        <h3 style="margin-top:15px;"> References</h3>
                            <div class="col-4" style="margin-left:30px;">
                                <ul>
                                    <li>  <input type="text" class="form-control" style="width: 300px; height:25px;" name="Situation" id="Situation" placeholder="Situation"/></li>
                                    <li>   <input type="text" class="form-control" style="width: 300px; height:25px;" name="Mail2" id="Mail2" placeholder="Mail2"/></li>
                                    <li> <input type="text" class="form-control" style="width: 300px; height:25px;" name="Tel2" id="Tel2" placeholder="Tel2"/></li>
                                </ul>
                            </div>
                        </div>
                
                </div>   
                    <button class="btn btn-outline-success" type="submit" style="margin:20px; margin-left:400px;"> Creer</button>

                </div>
                </div>

            </form>
        </section>
    </body>
</html>
