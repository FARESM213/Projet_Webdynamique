
<?php

session_start();


require("traitement.php");
header( 'content-type: text/html; charset=utf-8' );
include('db_config.php');

$connect = new PDO("mysql:host=localhost; dbname=BDD", "root", "");

if(isset($_POST['query']))
{

 $data=trim($_POST["query"]);
 $query = "
 SELECT * FROM medecin 
 WHERE (medname LIKE '%$data%' OR medjob LIKE '%$data%')";

 $statement = $connect->prepare($query);

 $statement->execute();

 $result = $statement->fetchAll();

 $output = '';

 foreach($result as $row)
 {
      $output .= '
      <li class="list-group-item contsearch">
       <a href="javascript:void(0)" class="gsearch" name="gsearch" id="gsearch" style="color:#333;text-decoration:none;">'.$row["medname"].' </a>  '.$row["medjob"].'
      </li>
      ';
 }

 echo $output;
}

if(isset($_POST['email']))
{
         $data=trim($_POST["email"]);
         $query = "
         SELECT * FROM medecin 
         WHERE medname = '$data'LIMIT 10";

         $statement = $connect->prepare($query);

         $statement->execute();

         $result = $statement->fetchAll();
         $output = '
         <table class="table table-bordered table-striped">
          <tr>

          <th>Nom</th>
          <th>Email</th>
          <th>Specialite</th>
          <th>Hospital</th>

          </tr>';

 foreach($result as $row)
 {
  $output .= '
  <tr>
   <td>'.$row["medname"].'</td>
   <td>'.$row["email"].'</td>
   <td>'.$row["medjob"].'</td>
    <td>'.utf8_encode($row['hopital']).'</td>

  </tr>
  ';
 }
 $output .= '</table>';

 echo $output;
}

?>