<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="Mot_de_passe_oublie.css"> 
    <title>Metric Care</title>
    <link rel="icon" href="Origine/Images/Logo.png">
  </head>
  <body>
    <?php
      if (isset($_POST['button'])){
        $email = $_POST['email'];

        $bdd = new PDO("mysql:host=localhost;dbname=metric_care","valentyna","12345");
        if (!empty($email)){
            $sth = $bdd->query("SELECT personnes.PersonneId FROM personnes  WHERE personnes.AdressMail = '$email' ");
            $post = $sth->fetch();
        
            if($post){
                
                session_start();
                $_SESSION['email'] = $email;
                header('Location: http://localhost/Metric_Care/Utilisateur/Tableau%20de%20bord/Tableau_de_Bord.PHP');
                exit();
        
            }else{
                echo "Utilisateur inconnu";
            }
        }
        
      }  
    ?>
    <header>
        <div>
            <img id="Logo" src="../../Origine/Images/Logo.png" alt="Logo Metric Metro", width="100", height="55"> 
            <div class="Langue">
                <a>🌐Français</a>
            </div>
        </div>  
    </header>
    <main>
        <div class="MDP">
            <a>Mot de passe oublié</a>
        </div>
        <div class="MDP_nouveau">
            <a>Nous vous enverrons un e-mail pour créer un nouveau mot de passe :</a>
        </div>
        <div class="container">
            <input type="email" placeholder="Email"><br></br>
        </div>
        <div class="rectangle-envoye">
            <a id="myButton" name="button">Envoyer</a>
        </div>
        <div class="popup" id="myPopup">
		    <p>Vous avez cliqué sur le bouton "mybutton"!</p>
		    <button id="closeButton">Fermer</button>
	    </div>
    </main>
  </body>
</html>