<?php
// Include the database connection file
include('db_config.php');

if (isset($_POST['medecinId']) && !empty($_POST['medecinId']))  // Du coup la on verifie bien qu'on a post MedecinId avec javascript
{
	$data=$_POST['medecinId']; 
	$query = " SELECT * FROM rendez_vous WHERE medno='$data' ORDER BY rdv_date ASC,rdvno ASC"; 
	$result = $con->query($query);

	if ($result->num_rows > 0)
	 {
		echo '<option value="">Choisir un horaire </option>'; 
		while ($row = $result->fetch_assoc()) 
		{
			echo '<option value="'.$row['rdvno'].'">'.$row['rdv_horaire'].'h '.$row['rdv_date'].'</option>';  // Du coup la meme procedé, et on mettra dans horaire un truck de valeur rdvno et on affiche ce qui suit 
		}
	} else 
	{
		echo '<option value="">Aucun Rendez-vous </option>'; 
	}
} 

if (isset($_POST['getID']) && !empty($_POST['getID']))  // Du coup la on verifie bien qu'on a post MedecinId avec javascript
{
	$data=$_POST['getID']; 
	$query = " SELECT * FROM medecin WHERE medjob='$data'"; 
	$result = $con->query($query);

	if ($result->num_rows > 0)
	 {
		while ($row = $result->fetch_assoc()) 
		{
			echo " <a data-bs-toggle='modal' data-target='#mod2' href='#mod2' class='list-group-item list-group-item-action' aria-current='true' data-id='".$row['medno']."'>
                              <div class='d-flex w-100 justify-content-between'>
                                <h5 class='mb-1'>".$row['medname']."</h5>
                              </div>
                              <p class='mb-1'>".$row['medjob']."</p>
                            </a> " ;

		}
	} 
} 

if (isset($_POST['Info']) && !empty($_POST['Info']))  // Du coup la on verifie bien qu'on a post MedecinId avec javascript
{

	$data=$_POST['Info']; 
	$query = " SELECT * FROM medecin WHERE medno='$data'"; 
	$result = $con->query($query);

	$row = $result->fetch_assoc();

	echo "     
                <div class='modal-content'>
                  <div class='modal-header'>
                    <h5 class='modal-title' style=' color: #000;' id='mod2Label'>".$row['medname']."    ".$row['medjob']."</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                  </div>
                  <div class='modal-body' style=' color: #000;'>
                    
                    <div class='page-content page-container' id='page-content' >
                      <div class='padding'>
                          <div class='row container d-flex'>
                                      <div class='col-xl-6 col-md-12' style='height: 600px;'>

                                                                  <div class='card user-card-full flex-column '  style='height: 600px; width: 300px;'>
                                                                      <div class='row m-l-0 m-r-0'>
                                                                          <div class='col-sm-12 bg-c-lite-green user-profile'>
                                                                              <div class='card-block text-center text-black'>
                                                                                  <div class='m-b-25'>
                                                                                      <img src='https://img.icons8.com/bubbles/100/000000/user.png' class='img-radius' alt='User-Profile-Image'>
                                                                                  </div>
                                                                                  <h6 class='f-w-600'style=' color: #000; '>".$row['medname']."</h6>
                                                                                  <i class=' mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16'></i>
                                                                              </div>
                                                                          </div>
                                                                          <div class='col-sm-12' style='padding-left: 30px;'>
                                                                              <div class='card-block'>
                                                                                  <h6 class='m-b-20 p-b-5 b-b-default f-w-600'>Information</h6>
                                                                                  <div class='row'>
                                                                                      <div class='col-sm-12'>
                                                                                          <p class='m-b-10 f-w-600'>Email</p>
                                                                                          <h6 class='text-muted f-w-400'>".$row['email']."</h6>
                                                                                      </div>
                                                                                      <div class='col-sm-12'>
                                                                                          <p class='m-b-10 f-w-600'>Téléphone</p>
                                                                                          <h6 class='text-muted f-w-400'>06 00 00 00 00</h6>
                                                                                      </div>

                                                                                      <div class='col-sm-12' style='padding-top: 260px; padding-left: 100px;'>
                                                                                        <button type='button' class='btn btn-info'>Contact</button>
                                                                                    </div>
                                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                            </div>

                                              <script>
                                                $(document).ready(function() {
                                                    $('li').click(function() {
                                                        $('li.list-group-item.active').removeClass('active');
                                                        $(this).addClass('active');
                                                    });
                                                });
                                            </script>
                                   
                                   <div class='col-xl-2' style='width: 500px; '>

        <h1> Liste de créneaux disponibles</h1>
        <h4> Veuillez choisir un horaire disponible :</h4>

        <div style='margin-top: 50px; margin-bottom: 25px;'>
        <label for='start'>Date :</label>

        <input type='date' id='datefield2' name='dateRdv'
        value='min'
        min='2018-01-01' max='2025-12-31'>

                
                <script>  
                    var today = new Date();
                    var dd = today.getDate();
                    var mm = today.getMonth() + 1; //January is 0!
                    var yyyy = today.getFullYear();

                    if (dd < 10) {
                    dd = '0' + dd;
                    }

                    if (mm < 10) {
                    mm = '0' + mm;
                    } 

                    today = yyyy + '-' + mm + '-' + dd;
                    document.getElementById('datefield2').setAttribute('min', today);

  </script>

</div>



                                    <ul class='list-group'>
                                        <li class='list-group-item'>RDV1</li>
                                        <li class='list-group-item'>RDV2</li>
                                        <li class='list-group-item'>RDV3</li>
                                    </ul>
                                    <div class='col-sm-12' style='margin-top: 25px ;' >
                                      <button type='button' class='btn btn-info'>Prendre Rendez-vous</button>
                                  </div>
                                  </div>
                          </div>
                      </div>
              </div>
</div>
                  <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                  </div>
              </div> ";

}

?>