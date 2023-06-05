<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="Inscription.css"> 
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
          $password1 = $_POST['password1'];
          $prenom = $_POST['prenom'];
          $nom = $_POST['nom'];
          $identification = $_POST['identification'];
          //$cgu = $_GET['cgu'];
          $h = md5($password);
          // $method = "aes-256-cbc";
          // $key = "secretkeyofmetriccare";
          // $options = 0;
          // $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($method));
          if (strlen($nom) < 2){
            alert("Please enter your last name. It should be at least 2 characters long.");
          }
          if (strlen($prenom) < 3){
            alert("Please enter your name. It should be at least 3 characters long.");
          }
          if (!strpos($email, "@")) {
            alert("Please enter your valid email."); 
          }
          if ($identification < 100000 || $identification > 1000000){
            alert("Please enter a valid six-digit identification number.");
          }
          if ($password1 === "") {
            alert("Please confirm your password.");
          }
          if ($password != $password1) {
            alert("Your passwords are not the same. Please verify it.");
          }
          // if (empty($cgu)) {
          //   alert("Please accept the terms and conditions.");
          // }

          $bdd = new PDO("mysql:host=localhost;dbname=metric_care","valentyna","12345");
          $sth = $bdd->query("SELECT * FROM authentificationprimaire  WHERE authentificationprimaire.AuthentificationId = '$identification' and authentificationprimaire.PersonneId IS NULL");
          $sthf = $sth->fetch();
          if (!empty($email && $password && $password1 && $prenom && $nom && $identification) && !empty($sthf) == 1){
              try{
                  $ins1 = $bdd->query("INSERT INTO personnes(Prenom, Nom, Adressmail) VALUES ('$prenom','$nom','$email')");
                  $ins2 = $bdd->query("INSERT INTO logins(PersonneId, MotDePas) VALUES((SELECT personnes.PersonneId FROM personnes where personnes.AdressMail = '$email'),'$h')");
                  $upd = $bdd->query("UPDATE authentificationprimaire SET authentificationprimaire.PersonneId = (SELECT personnes.PersonneId FROM personnes where personnes.AdressMail = '$email') where authentificationprimaire.AuthentificationId = $identification"); 
                  $post1 = $ins1->fetch();
                  $post2 = $ins2->fetch();
                  $pos3 = $upd->fetch();
                  //if($post1 && $post2 && $post3){
                    
                    header('Location: ../Connexion/Connexion.PHP');
                  //   exit();
            
                  // }
                  // else{
                  //   echo "Le problème de la création";
                  // }
              }catch(PDOException $e){
                  $erreur = $e->getMessage();
              }

          }
          // else{
          //     echo 'Veuillez remplir les champs obligatoires';
          // }
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
    <main method="post" form="inscription-form">
        <div class="tot">
        <div class="Inscription">
            <a>Inscription</a>
        </div>
        <form id="inscription-form"  method="post">
            <div class="Prenom_Nom">
                <input type="text" id="prenom" name="prenom" placeholder="Prenom">
                <input type="text" id="nom" name="nom" placeholder="Nom">
            </div>
            <div class="container">
                <div class="email">
                    <input type="email" placeholder="Email" name="email">
                </div>
                <div class="NUM_IDENT">
                    <input type="number" name="identification" placeholder="Numero d'Identification" pattern="[0-9]{6}" title="Le Numéro d'Identification doit comporter six chiffres">
                </div> 
                <div class="mdp">
                    <input type="password" name="password" placeholder="Mot de passe">
                </div> 
                <div class="mdp_Confirme">
                    <input type="password" name="password1" placeholder="Confirmer le mot de passe">
                </div>    
            </div>
            <br></br>
            <div class="CGU">
                <input type="checkbox" name="cgu" id="cgu">
                <label for="cgu">J'accepte les <span><a  href="../../General/CGU/CGU.PHP">conditions générales d'utilisation</a></span></label>
            </div>
        
            <div class="rectangle-creer">
            <button type="submit" name="button" id="inscription-form">Créer mon compte</button>
            </div>
        </div>
        </form>
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