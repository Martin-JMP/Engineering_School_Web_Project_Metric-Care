<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="Mot_de_passe_oublie.css"> 
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/1_Header.css">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/3_Footer.css">
    <title>Metric Care</title>
    <link rel="icon" href="../../Origine/Images/Logo.png">
  </head>
  <body>

  <?php
if (isset($_POST['oublie'])){
$email = htmlentities(strtolower(trim($mail))); // On récupère le mail afin d envoyer le mail pour la récupèration du mot de passe 
    
if(empty($email)){
     $valid = false;
$er_mail = "Il faut mettre un mail";
}
 
 else{
 $verification_mail = $bdd->query("SELECT personnes.AdressMail FROM logins, personnes  WHERE logins.PersonneId = personnes.PersonneId AND personnes.AdressMail = '$email'");
 array($email);
 $verification_mail = $verification_mail->fetch();
 
if(isset($verification_mail['email'])){
// On génère un mot de passe à l'aide de la fonction RAND de PHP
$new_pass = rand();
// $new_pass_crypt = crypt($new_pass, "VOTRE CLÉ UNIQUE DE CRYPTAGE DU MOT DE PASSE");
 
 $objet = 'Nouveau mot de passe';
 $to = "martinjoncourt@outlook.com";
 
//===== Création du header du mail.
 $header = "From: <martinjoncourt1@gmail.com> \n";
 $header .= "Reply-To:  \n";
 $header .= "MIME-version: 1.0\n";
 $header .= "Content-type: text/html; charset=utf-8\n";
 $header .= "Content-Transfer-Encoding: 8bit";
 
//===== Contenu de votre message
 $contenu = "<html>".
 "<body>".
 "<p style='text-align: center; font-size: 18px'><b>Bonjour Mr, Mme</b>,</p><br/>".
 "<p style='text-align: justify'><i><b>Nouveau mot de passe : </b></i></p><br/>".
 "</body>".
 "</html>";
//===== Envoi du mail
 mail($to, $objet, $contenu, $header);
 $bdd->insert("UPDATE logins SET MotDePas = ?, email = ?",
 array($new_pass, $verification_mail['email']));
}
}
 header('Location: Mot_de_passe_oublie.php');
 exit;
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
    <main>
        <div class="MDP">
            <a>Mot de passe oublié</a>
        </div>
        <div class="MDP_nouveau">
            <a>Nous vous enverrons un e-mail pour créer un nouveau mot de passe :</a>
        </div>
        <div class="container">
            <input type="email" placeholder="Email" name="mail" value="<?php if(isset($mail)){ echo $mail; }?>" required><br></br>
        </div>
        <div class="rectangle-envoye">

        <button type="submit" name="oublie">Envoyer</button>

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