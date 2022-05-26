<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

	<?php 
	  session_start();

	  //header("Location: toutparc.php");
	   echo '<script>
						alert("Vous avez été déconnecté");
						window.location.href="toutparc.php";
						</script>';	   
		sleep(2);

		$_SESSION['Id']="";
		$_SESSION['Select']=" ";
		$_SESSION['Type_Rdv']=" ";
		$_SESSION["Client"] = "";
		$_SESSION["IdClient"] = "";
		$_SESSION["MdpClient"]="";
		$_SESSION["LoginClient"]="";
		$_SESSION["Type"] = "";
		$_SESSION["Specialite"] = "";

	 ?>

</body>
</html>