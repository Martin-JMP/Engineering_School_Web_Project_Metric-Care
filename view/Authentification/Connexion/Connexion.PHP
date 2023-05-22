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
       function alert($msg) {
        echo "<script type='text/javascript'>alert('$msg');</script>";
      }
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
                header('Location: http://localhost/Metric_Care/view/Utilisateur/Tableau%20de%20bord/Tableau_de_Bord.PHP');
                exit();
        
              }else{
                alert("Utilisateur inconnu");
              }
              
        
            }catch(PDOException $e){
              $erreur = $e->getMessage();
            }
        
        
          }else{
            alert('Veuillez remplir les champs obligatoires');
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
    <main method="post" form="login-form">
        <div class="Connexion">
            <a>Connexion</a>
        </div>
        <form id="login-form"  method="post">
          <div class="container">
              <input type="email" id='email' name="email" placeholder="Email"><br></br>
              <input type="password" id='password' name="password" placeholder="Mot de passe">
          </div>
          <div class="MDP_OUBLIE">
              <a>Mot de passe oublié ?</a>
          </div>
          <div class="rectangle-connecter" name="button">
            <button type="submit" name="button">Se Connecter</button>
          </div>
        </form>
        <div class = "Pas_compte">
            <div>
                <div><a>Pas de</a></div>
                <div><a>compte ?</a></div>
            </div>
            <div class="Inscrivez-vous" href="#">
                <div><a href="http://localhost/Metric_Care/Authentification/Inscription/Inscription.PHP">Inscrivez</a></div>
                <div><a href="http://localhost/Metric_Care/Authentification/Inscription/Inscription.PHP">vous</a></div>
            </div>
        </div>
    </main>
  </body>
</html>