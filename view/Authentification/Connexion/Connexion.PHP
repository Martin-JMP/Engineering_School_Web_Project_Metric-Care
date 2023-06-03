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
        $bdd = new PDO("mysql:host=localhost;dbname=metric_care","vapr@metric.care","vapr333!");
          if (!empty($email && $password)){
            try{
              /*$method = "aes-256-cbc";
              $key = "secretkeyofmetriccare";
              $options = 0;
              $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($method));*/
              $sth = $bdd->query("SELECT logins.MotDePas FROM logins, personnes  WHERE logins.PersonneId = personnes.PersonneId AND personnes.AdressMail = '$email'");
              //$sth = implode($bdd->query("SELECT logins.MotDePas FROM logins, personnes  WHERE logins.PersonneId = personnes.PersonneId AND personnes.AdressMail = '$email'")->fetch());
              $post = $sth->fetch();
              //$decrypted = openssl_decrypt($sth, $method, $key, $options, $iv);
              if($post){
                session_start();
                if ($email == "ad@metric.care"){
                  header('Location: ../../Administrateur/Tableau_de_Bord_Admin/Tableau_de_Bord_Admin.PHP');
                } else 
                if($email == "gest1@metric.care" || $email == "gest2@metric.care" || $email == "gest3@metric.care" || $email == "gest4@metric.care"){
                  header('Location: ../../Gestionnaire/Tableau_de_bord_Gestionnaire/Tableau_de_Bord_Gestionniare.PHP');
                }
                else {
                  header('Location: ../../Utilisateur/Tableau%20de%20bord/Tableau_de_Bord.PHP');
                }
                $_SESSION['email'] = $email;
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
                <a href="ConnectionA.php">🌐Français</a>
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
              <a href="http://localhost/Metric_Care/view/Authentification/Mot_de_passe_oublie/Mot_de_passe_oublie.PHP">Mot de passe oublié ?</a>
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
                <div><a href="http://localhost/Metric_Care/view/Authentification/Inscription/Inscription.PHP">Inscrivez</a></div>
                <div><a href="http://localhost/Metric_Care/view/Authentification/Inscription/Inscription.PHP">vous</a></div>
            </div>
        </div>
    </main>
  </body>
</html>