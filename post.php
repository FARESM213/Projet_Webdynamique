<?php
session_start();

date_default_timezone_set('Europe/Paris');
if(isset($_SESSION['name'])){
 $text = $_POST['text'];

 $text_message = "|".$_SESSION["Nom"]."*".$_SESSION['name']."*|<div class='msgln'><span class='chat-time'>".date("g:i A")." </span> <b class='username'>".$_SESSION["Nom"]."</b> pour <b class='dest'>".$_SESSION['name']."</b>: <br>".stripslashes(htmlspecialchars($text))."<br></div>";
 $myfile = fopen(__DIR__ . "/log.html", "a") or die("Impossible d'ouvrir le fichier " . __DIR__ . "/log.html");
 fwrite($myfile, $text_message."\n");
 fclose($myfile);


}


?>