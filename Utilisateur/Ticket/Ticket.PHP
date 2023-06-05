<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/1_Header.css">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/3_Footer.css">
    <link rel="stylesheet" type="text/css" href="Ticket.css">
    <title>Metric Care</title>
    <link rel="icon" href="../../Origine/Images/Logo.png">
    <script>  
            function changeColor(color) { 
                document.body.style.background = color; 
            }
    </script> 
  </head>
  <body>
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
            <a href="../Tableau de bord/Tableau_de_bord.PHP">Tableau de bord</a>
            <a href ="../FAQ/FAQ.PHP">FAQ</a>
            <a href ="../Forum/Forum.PHP">Forum</a>
            <a href ="../Ticket/Ticket.PHP">Ticket</a>
            <a href ="../Profil/Profil.PHP">Profil</a>
          </div>
        </nav>
      </div>
    </header>
    <main>
    
    <a href = "../../Utilisateur/Tableau de bord/Tableau_de_bord.PHP" id = "retour">◄ Tableau de bord</a>

    <a id = "Signaler"> Signaler un incident </a><br><br>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

    <div class="searchbar">
     <div class="searchbar-wrapper">
        <div class="searchbar-center">
            <div class="searchbar-input-spacer"></div>
            <input type="email" class="searchbar-input" maxlength="2048" name="mail" autocapitalize="off" autocomplete="off" 
            role="combobox" placeholder="Email" value="<?php if(isset($mail)){ echo $mail; }?>" required>
            </div>
        </div>
      </div>
    </div>



    <select id = "Choix" name = "Choix" value="<?php if(isset($prenom)){ echo $prenom; }?>" required>
    <group>
    <option value="Default">Choisir un incident</option>
    <option value="Le boitier ne communique plus les informations">Le boitier ne communique plus les informations</option>
    <option value="Un problème avec les informations liée à mon compte">Un problème avec les informations liée à mon compte</option>
    <option value="Autres">Autres</option>
    </group>
    </select>

    <div class="searchbar2">
     <div class="searchbar-wrapper">
        <div class="searchbar-center">
            <div class="searchbar-input-spacer"></div>
            <input type="text" class="searchbar-input" maxlength="2048" name="story" autocapitalize="off" autocomplete="off" role="combobox" placeholder="Message...">
            </div>
        </div>
      </div>
    </div>
    <div id = "valider">
      <button type="submit" name="oublie">Valider</button> </div>

      </form>


      <?php

    require 'C:\xampp\htdocs\Metric_Care\Authentification\Mot_de_passe_oublie\PHPMailer-master\src\Exception.php';
    require 'C:\xampp\htdocs\Metric_Care\Authentification\Mot_de_passe_oublie\PHPMailer-master\src\PHPMailer.php';
    require 'C:\xampp\htdocs\Metric_Care\Authentification\Mot_de_passe_oublie\PHPMailer-master\src\SMTP.php';
    
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

if (isset($_POST['oublie'])) {
  $email=$_POST['mail'];
  $choixs=$_POST['Choix'];
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
    $mail->Subject = 'Ticket Incident : ' . $email . ' ';
    $mail->Body    = 'Email : <b> ' . $email .'</b> <br> Type incident : <b> ' . $choixs . '</b> <br><br>Demande : <br><b>' . $storys .'';
    $mail->Body = utf8_decode($mail->Body);
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo '<script>alert("votre signalement a bien été envoyée");</script>';
} catch (Exception $e) {
  echo '<script>showAlert("Il y a eu un problème, veuillez réitérer");</script>';
}}
else {
  echo '<script>showAlert("Utilisateur introuvable");</script>';
}
}
else{
  echo '<script>showAlert("erreur");</script>';
}

?>

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