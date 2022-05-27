<?php
require("traitement.php");
header( 'content-type: text/html; charset=utf-8' );
include('db_config.php');

session_start();


 if (isset($_GET['logout'])){

 //Message de sortie simple
        $logout_message = "|<div class='msgln'><span class='left-info'>User <b class='user-name-left'>".$_SESSION["Nom"]."</b> a quitté la session de chat.</span><br></div>";

        $myfile = fopen(__DIR__ . "/log.html", "a") or die("Impossible d'ouvrir le fichier!" . __DIR__ . "/log.html");
        fwrite($myfile, $logout_message);
        fclose($myfile);
        unset($_SESSION['name']); // delete any specific session only
        sleep(1);
        header("Location: toutparc.php"); //Rediriger l'utilisateur
        
        }
        if (isset($_POST['enter'])){
            if($_POST['name'] != "")
            {
                if( $_SESSION["Type"]=="medecin")
                {
                $data=$_POST['name']; 
                $query = " SELECT * FROM patient WHERE patname='$data'"; 
                $result = $con->query($query);

                if ($result->num_rows > 0)
                {

                      $_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
                }
                else
                {
                     echo '<span class="error">Veuillez saisir un patient existant </span>';

                }


                }
                else
                {
                        $data=$_POST['name']; 
                        $query = " SELECT * FROM medecin WHERE medname='$data'"; 
                        $result = $con->query($query);

                        if ($result->num_rows > 0)
                        {

                              $_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
                        }
                        else
                        {
                             echo '<span class="error">Veuillez saisir un medecin existant </span>';

                        }
                    }
                
            }
             else
            {
               echo '<span class="error">Veuillez saisir le correspondent </span>';
            }
        }
 function loginForm() 
 {
             echo
             '<div id="loginform">
             <p> Veuillez saisir le correspondent pour continuer!</p>
                    <form action="chat.php" method="post">
                        <input type="text" name="name" id="name" />
                        <input type="submit" name="enter" id="enter" value="Soumettre" />
                    </form>
             </div>';
 }
?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8" />
        <title>Chatroom </title>
            <link rel="stylesheet" href="style.css" />
    </head>
     <body>
        <style>
* {
 margin: 0;
 padding: 0;

}

 body {
 margin: 20px auto;
 background-color: #7d9d9e;
 font-family: "Lato";
 font-weight: 300;

}

 form {
 padding: 15px 25px;
 display: flex;
 gap: 10px;
 justify-content: center;

}

 form label {
 font-size: 1.5rem;
 font-weight: bold;

}

 input {
 font-family: "Lato";

}

 a {
 color: #0000ff;
 text-decoration: none;

}

 a:hover {
 text-decoration: underline;

}

 #wrapper,
 #loginform {
 margin: 0 auto;
 padding-bottom: 25px;
 background: #eee;
 width: 600px;
 max-width: 100%;
 border: 2px solid #212121;
 border-radius: 4px;

}

 #loginform {
 padding-top: 18px;
 text-align: center;

}

 #loginform p {
 padding: 15px 25px;
 font-size: 1.4rem;
 font-weight: bold;

}
 #chatbox {
 text-align: left;
 margin: 0 auto;
 margin-bottom: 25px;
 padding: 10px;
 background: #a2b9ba;
 height: 300px;
 width: 530px;
 border: 1px solid #000;
 overflow: auto;
 border-radius: 4px;
 border-bottom: 4px solid #000;

}

 #usermsg {
 flex: 1;
 border-radius: 4px;
 border: 1px solid #ff9800;

}

 #name {
 border-radius: 4px;
 border: 1px solid #ff9800;
 padding: 2px 8px;

}

 #submitmsg,
 #enter{
 background: #166361;
 border: 2px solid #000;
 color: white;
 padding: 4px 10px;
 font-weight: bold;
 border-radius: 4px;
width:100px;

}

 .error {
 color: #ff0000;

}

 #menu {
 padding: 15px 25px;
 display: flex;
 color: #a2b9ba;

}

 #menu p.welcome {
 flex: 1;

}

 a#exit {
 color: white;
 background: #166361;
 padding: 4px 8px;
 border-radius: 4px;
 font-weight: bold;

}

 .msgln {
 margin: 0 0 5px 0;

}
 .msgln span.left-info {
 color: black;
 }

 .msgln span.chat-time {
 color: #000;
 font-size: 60%;
 vertical-align: super;
 }

 .msgln b.user-name, .msgln b.user-name-left {
 font-weight: bold;
 background: #000 ;
 color: white;
 padding: 2px 4px;
 font-size: 90%;
 border-radius: 4px;
 margin: 0 5px 0 0;
 }

 .msgln b.user-name-left {
 background: black;
 }

         </style>
                <?php
                        if (!isset($_SESSION['name'])){
                            loginForm();
                        }
                        else {
                ?>
 <div id="wrapper">
        <div id="menu">
             <p class="welcome" style="color:black;">Bienvenue, <b><?php echo $_SESSION["Nom"]; ?></b></p>
             <p class="logout"><a id="exit" href="#">Quitter la conversation</a></p>
        </div>
        <div id="chatbox">
        
        <?php
        if(file_exists("log.html") && filesize("log.html") > 0){
            $contents = file_get_contents("log.html");
        }
        ?>
        </div>
        <form name="message" action="">
            <input name="usermsg" type="text" id="usermsg" />
            <input name="submitmsg" type="submit" id="submitmsg" value="Envoyer" />
        </form>
        </div>
        <div id= "greeting"> </div>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                    <script type="text/javascript">
                    // jQuery Document
                    $(document).ready(function () {

                    $("#submitmsg").click(function () {

                    var clientmsg = $("#usermsg").val();

                    $.post("post.php", { text: clientmsg });
                    $("#usermsg").val("");
                    return false;
                    });


                    function loadLog() {
                            var oldscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Hauteur de défilement avant la requête
                            $.ajax({
                                url: "log.html",
                                cache: false,
                                success: function (html) {
                                var splitted = html.split("|");
                                var conv="";
                                var taille=splitted.length;
                                for (let i = 1; i < taille-1; i++) 
                                {
                                  var splitted2 = splitted[i].split("*");                                        

                                  if((splitted2[0]=='<?php echo $_SESSION["Nom"]; ?>')&&((splitted2[1])=='<?php echo $_SESSION['name']; ?>'))
                                    {
                                        
                                            conv+=' ';
                                            conv+=splitted[i+1];

                                    }
                                 if((splitted2[1]=='<?php echo $_SESSION["Nom"]; ?>')&&((splitted2[0])=='<?php echo $_SESSION['name']; ?>'))
                                    {

                                            conv+=' ';
                                            conv+=splitted[i+1];

                                    }

                                }            
                            
                                $("#chatbox").html(conv); //Insérez le log de chat dans la #chatbox div
                            var newscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Hauteur de défilement apres la requête
                                                        if(newscrollHeight > oldscrollHeight){
                                                        $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Défilement automatique
                                                        }
                                                    }
                             
                            });


                    }
                    setInterval (loadLog, 100);
                    $("#exit").click(function () {
                    var exit = confirm("Voulez-vous vraiment mettre fin à la session ?");
                        if (exit == true) {
                            window.location = "chat.php?logout=true";
                        }
                        });
                    });
                    </script>
        </body>
</html>
<?php
}
?>