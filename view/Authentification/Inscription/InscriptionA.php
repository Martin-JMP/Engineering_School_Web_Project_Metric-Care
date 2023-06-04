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
       if (isset($_POST['button'])){

         $email = $_POST['email'];
         $password = $_POST['password'];
         $password1 = $_POST['password1'];
         $prenom = $_POST['prenom'];
         $nom = $_POST['nom'];
         $identification = $_POST['identification'];
         $h = md5($password);
         // $method = "aes-256-cbc";
         // $key = "secretkeyofmetriccare";
         // $options = 0;
         // $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($method));
         

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
          <a href="Connexion.PHP">🌐English</a>
            <a href="../../General/Contact/Contact.PHP">Contact</a>
            <a href="../../General/FAQ/FAQ.PHP">FAQ</a>
            <a href="../../General/AboutUs/AboutUs.PHP">About us</a>
            <a href="../Connexion/ConnectionA.php">Connection</a>
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
                <input type="text" id="prenom" name="prenom" placeholder="Name">
                <input type="text" id="nom" name="nom" placeholder="Surname">
            </div>
            <div class="container">
                <div class="email">
                    <input type="email" placeholder="Email" name="email">
                </div>
                <div class="NUM_IDENT">
                    <input type="number" name="identification" placeholder="Identification number" pattern="[0-9]{6}" title="Le Numéro d'Identification doit comporter six chiffres">
                </div> 
                <div class="mdp">
                    <input type="password" name="password" placeholder="Password">
                </div> 
                <div class="mdp_Confirme">
                    <input type="password" name="password1" placeholder="Confirm the password">
                </div>    
            </div>
            <br></br>
            <div class="CGU">
                <input type="checkbox" name="cgu" id="cgu">
                <label for="cgu">I accept the <span><a  href="../../General/CGU/CGU.PHP">general terms of use</a></span></label>
            </div>
        
            <div class="rectangle-creer">
            <button type="submit" name="button">Create my account</button>
            </div>
        </div>
        </form>
    </div>
    </main>
    <footer class = "Footer">
      <div class = "contenu_Footer">
        <div class="Footer_contenu_Logo">
          <img id="LogoFooter" src="../../Origine/Images/image.png" alt="Logo Metric Metro", width="80", height="80">
          <p>Metric Care © 2023 - All rights reserved</p>
          <a href="https://infinitemeasures.fr/vues/fr/index.php" target="_blank">
          <img id="Logo_Infinite_Measures_Footer" src="../../Origine/Images/Infinite_logo.png" alt="Logo Infinite Measures", width="60", height="60"> </a>
        </div>
        <div class="Footer_contenu_texte">
          <a href="../../General/CGU/CGU.PHP">GTU</a> <a>|</a>
          <a href="../../General/AboutUs/AboutUs.PHP">About us</a> <a>|</a>
          <a href="../../General/Cookies/Cookies.PHP">Cookie preferences</a>
        </div>
      </div>
    </footer>
  </body>
</html>