<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="Connexion.css"> 
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/1_Header.css">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/3_Footer.css">
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
        $bdd = new PDO("mysql:host=localhost;dbname=metric_care","martin","test");
        // $method = "aes-256-cbc";
        // $key = "secretkeyofmetriccare";
        // $options = 0;
        // $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($method));
          if (!empty($email && $password)){
            try{
              $h = md5($password);
              $sth = $bdd->query("SELECT * FROM logins, personnes  WHERE logins.PersonneId = personnes.PersonneId AND personnes.AdressMail = '$email' AND logins.MotDePas = '$h'");
              ///$sth1 = implode($bdd->query("SELECT logins.MotDePas FROM logins, personnes  WHERE logins.PersonneId = personnes.PersonneId AND personnes.AdressMail = '$email'")->fetch());
              
              $post = $sth->fetch();
              //$decrypted = openssl_decrypt($sth1, $method, $key, $options, $iv);

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
      <div id="Rectangle_Debut">
        <nav>
          <div>
            <img id="Logo" src="../../Origine/Images/Logo.png" alt="Logo Metric Metro", width="75", height="40">
            <img id="Logo_Texte" src="../../Origine/Images/Logo_texte.png" alt="Logo Metric Metro", width="200", height="50">
            <a href="https://infinitemeasures.fr/vues/fr/index.php" target="_blank">
            <img id="Logo_Infinite_Measures" src="../../Origine/Images/Infinite_logo.png" alt="Logo Infinite Measures", width="60", height="60"> </a>
          </div>      
          <div class="contenuNav">
          <a>🌐Français</a>
            <a href="../../General/Contact/Contact.PHP">Contact</a>
            <a href="../../General/FAQ/FAQ.PHP">FAQ</a>
            <a href="../../General/AboutUs/AboutUs.PHP">Qui sommes nous ?</a>
            <a href="../Connexion/Connexion.PHP">Connexion</a>
          </div>
        </nav>
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
                <div><a href="../Inscription/Inscription.PHP">Inscrivez</a></div>
                <div><a href="../Inscription/Inscription.PHP">vous</a></div>
            </div>
        </div>
    </main>

    <footer class = "Footer">
      <div class = "contenu_Footer">
        <div class="Footer_contenu_Logo">
          <img id="LogoFooter" src="../../Origine/Images/image.png" alt="Logo Metric Metro", width="80", height="80">
          <p>Metric Care © 2023 - Tous droits réservés</p>
          <a href="https://infinitemeasures.fr/vues/fr/index.php" target="_blank">
          <img id="Logo_Infinite_Measures_Footer" src="../../Origine/Images/Infinite_logo.png" alt="Logo Infinite Measures", width="60", height="60"> </a>
        </div>
        <div class="Footer_contenu_texte">
          <a href="../../General/CGU/CGU.PHP">CGU</a> <a>|</a>
          <a href="../../General/AboutUs/AboutUs.PHP">À propos</a> <a>|</a>
          <a href="../../General/Cookies/Cookies.PHP">Préférences des cookies</a>
        </div>
      </div>
    </footer>
  </body>
</html>
