<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/1_Header.css">
    <link rel="stylesheet" type="text/css" href="Contact.css">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/3_Footer.css">
    <link rel="stylesheet" type="text/css" href="../../General/CGU/CGU.css">
    <title>Metric Care</title>
    <link rel="icon" href="Origine/Images/Logo.png">
  </head>
  <body>
    <header>
      <div id="Rectangle_Debut">
        <nav>
          <div>
            <img id="Logo" src="../../Origine/Images/Logo.png" alt="Logo Metric Metro", width="75", height="40">
            <a href="../../Metric_Care.php">
              <img id="Logo_Texte" src="../../Origine/Images/Logo_texte.png" alt="Logo Metric Metro", width="200", height="50">
            </a>
            <a href="https://infinitemeasures.fr/vues/fr/index.php" target="_blank">
            <img id="Logo_Infinite_Measures" src="../../Origine/Images/Infinite_logo.png" alt="Logo Infinite Measures", width="60", height="60"> </a>
          </div>      
          <div class="contenuNav">
          <a>🌐Français</a>
            <a href="Contact.PHP">Contact</a>
            <a href="../FAQ/FAQ.PHP">FAQ</a>
            <a href="../AboutUs/AboutUs.PHP">Qui sommes nous ?</a>
            <a href="../../Authentification/Connexion/Connexion.PHP">Connexion</a>
          </div>
        </nav>
      </div>
    </header>
    <main>
    

    <div class="container">
    <div class="Titre_CGU">
      <a>Contactez-nous</a>
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      </div>
            <input type="text" placeholder="Prenom"  name="prenom" value="<?php if(isset($prenom)){ echo $prenom; }?>" required><br></br>
            <input type="text" placeholder="Nom"  name="nom" value="<?php if(isset($nom)){ echo $nom; }?>" required><br></br>
            <input type="email" placeholder="Email" name="mail" value="<?php if(isset($mail)){ echo $mail; }?>" required><br></br>
            <a class="titrebox"> indiquez votre demande :</a>
            <textarea id="story" name="story" rows="5" cols="50">
            </textarea>

            <br><br>
          <div class="rectangle-connecter" name="button">
            <button type="submit" name="oublie">Envoyer</button>
          </div>
        </div>
        </form>
            
    </div>
    <?php
    require 'C:\xampp\htdocs\Metric_Care\view\Authentification\Mot_de_passe_oublie\PHPMailer-master\src\Exception.php';
    require 'C:\xampp\htdocs\Metric_Care\view\Authentification\Mot_de_passe_oublie\PHPMailer-master\src\PHPMailer.php';
    require 'C:\xampp\htdocs\Metric_Care\view\Authentification\Mot_de_passe_oublie\PHPMailer-master\src\SMTP.php';
    
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

if (isset($_POST['oublie'])) {
  $email=$_POST['mail'];
  $noms=$_POST['nom'];
  $prenoms=$_POST['prenom'];
  $storys=$_POST['story'];

  if (!empty($mail)){

            
try {
    //Server settings
    $mail->SMTPDebug = false;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'metric.care@gmail.com';                     //SMTP username
    $mail->Password   = 'vhtkppwvnatnckgb';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('metric.care@gmail.com', 'Contact');
    $mail->addAddress('metric.care@gmail.com');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Contact : ' . $prenoms . ' ' . $noms .' ';
    $mail->Body    = 'Prenom : <b> ' . $prenoms . '</b> <br>Nom : <b> ' . $noms .'</b> <br>Email : <b> ' . $email .'</b> <br><br>Demande : <br><b>' . $storys .'';
    $mail->Body = utf8_decode($mail->Body);
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo '<script>alert("votre demande a bien été envoyée");</script>';
} catch (Exception $e) {
  echo '<script>showAlert("Il y à eu un problème, veuillez réitérer");</script>';
}}
else {
  echo '<script>showAlert("Utilisateur introuvable");</script>';
}
}
else{
  echo '<script>showAlert("erreur");</script>';
}

?>
      <div class="Menu_principal">
        <a href="../../Metric_Care.PHP"> ◂ Menu principal</a>
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
