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
		   						   
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-4">
                        <div class="row justify-content-around">
                            <input type="text" name="Nom" id="Nom" style = "width: 200px;" placeholder="Votre Nom"/>
                        </div>
                        <div class="row">
                            <input type="text" name="Adresse" id="Adresse" style = "width: 200px;" placeholder="Votre Adresse"/>
                        </div>
                        <div class="row">
                            <input type="text" name="Telephone" id="Telephone" style = "width: 200px;" placeholder="Votre Telephone"/>
                        </div> 
                        <div class="row">
                            <input type="text" name="Email" id="Email" style = "width: 200px;" placeholder="Votre Email"/>
                        </div> 

                    </div>
                    <div class="col-8">
                        <input type="text" class="border" name="Intro" style = "width: 500px; height:150px;" id="Intro" placeholder="A propos de vous "/>   
                    </div>
                </div>

                <div class="row justify-content-around" style="margin:15px;">
                    <div class="col-4">


                        <input type="text" class="border" name="Diplome1"  id="Diplome1" placeholder="Premier Diplome "/>
                             <input type="text" class="border" name="Etablissement1"  id="Etablissement1" placeholder="Premier Etablissement1 "/>

                              <input type="text" class="border" name="from1"  id="from1" placeholder="Premier from1 "/>
                              <input type="text" class="border" name="to1"  id="to1" placeholder="Premier to1 "/>

                              <br>

                        <input type="text" class="border" name="Diplome2"  id="Diplome2" placeholder="Deuxieme Diplome"/>

                             <input type="text" class="border" name="Etablissement2"  id="Etablissement2" placeholder="Deuxieme Etablissement2 "/>

                              <input type="text" class="border" name="from2"  id="from2" placeholder="Deuxieme from2 "/>
                              <input type="text" class="border" name="to2"  id="to2" placeholder="Deuxieme to2 "/>

                              <br>

                    </div>

                    <div class="col-4">
                        <div class="row justify-content-between"style="margin:15px;">

                            <input type="text" class="border" name="Emploi1" id="Emploi1" placeholder="Emploi1"/>

                            <input type="text" class="border" name="Entreprise1" id="Entreprise1" placeholder="Entreprise1"/>

                            
                            <input type="text" class="border" name="form3" id="form3" placeholder="form3"/>


                            <input type="text" class="border" name="to3" id="to3" placeholder="to3"/>


                            <input type="text" class="border" name="Description1" id="Description1" placeholder="Description1"/>

                                        <input type="text" class="border" name="achievement11" id="achievement11" placeholder="achievement11"/>

                                        <input type="text" class="border" name="achievement12" id="achievement12" placeholder="achievement12"/>


                                        <input type="text" class="border" name="achievement13" id="achievement13" placeholder="achievement13"/>


                        </div>
                        <div class="row justify-content-between"style="margin:15px;">

                            <input type="text" class="border" name="Emploi2" id="Emploi2" placeholder="Emploi2"/>

                            <input type="text" class="border" name="Entreprise2" id="Entreprise2" placeholder="Entreprise2"/>

                            
                            <input type="text" class="border" name="form4" id="form4" placeholder="form4"/>


                            <input type="text" class="border" name="to4" id="to4" placeholder="to4"/>


                            <input type="text" class="border" name="Description2" id="Description2" placeholder="Description2"/>

                                        <input type="text" class="border" name="achievement21" id="achievement21" placeholder="achievement21"/>

                                        <input type="text" class="border" name="achievement22" id="achievement22" placeholder="achievement22"/>


                                        <input type="text" class="border" name="achievement23" id="achievement23" placeholder="achievement23"/>

                        </div>
                       
                    </div>
                        <div class="row justify-content-between">
                            <input type="text" class="border" name="Interet" style = "width: 500px; height:300px;" id="Interet" placeholder="Interet"/>
                        </div>
                </div>

                <div class="row justify-content-between" style = "margin:15px;">
                    <div class="col-12">
                       <input type="text" class="border" name="Situation" id="Situation" placeholder="Situation"/>

                         <input type="text" class="border" name="Mail2" id="Mail2" placeholder="Mail2"/>

                           <input type="text" class="border" name="Tel2" id="Tel2" placeholder="Tel2"/>

                    </div>
                </div>   
                <button class="btn btn-outline-success" type="submit"> Creer</button>

                </div>

            </form>
        </section>
	</body>
</html>
