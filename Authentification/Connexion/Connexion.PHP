<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="Connexion.css"> 
    <title>Metric Care</title>
    <link rel="icon" href="../../Origine/Images/Logo.png">
  </head>
  <body>
    <?php
      if (isset($_POST['button'])){
  

        $email = $_POST['email'];
        $password = $_POST['password'];
        
        
        $bdd = new PDO("mysql:host=localhost;dbname=metric_care","valentyna","12345");
        
            
          if (!empty($email && $password)){
            try{
              $sth = $bdd->query("SELECT personnes.PersonneId FROM logins, personnes  WHERE logins.PersonneId = personnes.PersonneId AND personnes.AdressMail = '$email' AND logins.MotDePas = '$password'");
              $post = $sth->fetch();
        
              if($post){
                
                session_start();
                $_SESSION['email'] = $email;
                header('Location: http://localhost/Metric_Care/Utilisateur/Tableau%20de%20bord/Tableau_de_Bord.PHP');
                exit();
        
              }else{
                echo "Utilisateur inconnu";
              }
              
        
            }catch(PDOException $e){
              $erreur = $e->getMessage();
            }
        
        
          }else{
            echo 'Veuillez remplir les champs obligatoires';
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
    <main method="post">
        <div class="Connexion">
            <a>Connexion</a>
        </div>
        <div class="container">
            <input type="email" id='email' name="email" placeholder="Email"><br></br>
            <input type="password" id='password' name="password" placeholder="Mot de passe">
        </div>
        <div class="MDP_OUBLIE">
            <a>Mot de passe oublié ?</a>
        </div>
        <div class="rectangle-connecter" name="button">
            <a>Se Connecter</a>
        </div>
        <div class = "Pas_compte">
            <div>
                <div><a>Pas de</a></div>
                <div><a>compte ?</a></div>
            </div>
            <div class="Inscrivez-vous" href="#">
                <div><a href="Connexion.css">Inscrivez</a></div>
                <div><a href="Connexion.css">vous</a></div>
            </div>
        </div>
    </main>
  </body>
</html>