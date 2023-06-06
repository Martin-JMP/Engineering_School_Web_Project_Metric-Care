<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="Mot_de_passe_oublie.css"> 
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/1_Header.css">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/3_Footer.css">
    <title>Metric Care</title>
    <link rel="icon" href="../../Origine/Images/Logo.png">
    <script>
    function showAlert(message) {
      alert(message);
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
            <a href="../../General/Contact/Contact.PHP">Contact</a>
            <a href="../../General/FAQ/FAQ.PHP">FAQ</a>
            <a href="../../General/AboutUs/AboutUs.PHP">Qui sommes nous ?</a>
            <a href="../Connexion/Connexion.PHP">Connexion</a>
          </div>
        </nav>
      </div>
    </header>
    <main>
        <div class="ens">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="MDP">
            <a>Mot de passe oublié</a>
        </div>
        <div class="MDP_nouveau">
            <a>Nous vous enverrons un e-mail contenant un mot de passe provisoire :</a>
        </div>
        <div class="container">
            <input type="email" placeholder="Email" name="mail" value="<?php if(isset($mail)){ echo $mail; }?>" required><br></br>
        </div>
        <div class="rectangle-envoye" name="button">

        <button type="submit" name="oublie">Envoyer</button>

        </div>
        </form>
</div>
    </main>
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
function genererMotDePasse() {
  $caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
  $motDePasse = '';
  
  for ($i = 0; $i < 8; $i++) {
      $indexAleatoire = mt_rand(0, strlen($caracteres) - 1);
      $motDePasse .= $caracteres[$indexAleatoire];
  }
  
  return $motDePasse;
}

if (isset($_POST['oublie'])) {
  $email=$_POST['mail'];
  $bdd = new PDO("mysql:host=localhost;dbname=metric_care","martin","test");

  if (!empty($mail)){
      $sth = $bdd->query("SELECT personnes.PersonneId FROM personnes  WHERE personnes.AdressMail = '$email'");
      $post = $sth->fetch();
      if($post){
        $motdepasspre = genererMotDePasse();
        $query = "UPDATE logins SET MotDePas = :motdepassetest WHERE PersonneId = :personneid";
        $stmt = $bdd->prepare($query);
        $stmt->bindValue(':motdepassetest', $motdepasspre);
        $stmt->bindValue(':personneid', $post['PersonneId']);
        $stmt->execute();
            
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
    $mail->setFrom('metric.care@gmail.com', 'Metric Care');
    $mail->addAddress($_POST['mail']);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Votre nouveau mot de passe';
    $mail->Body    = 'Voici votre mot de passe temporaire : <b> ' . $motdepasspre . ' <br><br>  En cas de problème veuillez répondre à ce mail directement.';
    $mail->Body = utf8_decode($mail->Body);
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo '<script>showAlert("Le mail a bien été envoyé");</script>';
} catch (Exception $e) {
  echo '<script>showAlert("Il y a eu un problème, veuillez réitérer");</script>';
}}
else {
  echo '<script>showAlert("Utilisateur introuvable");</script>';
}
}
else{

}}

?>
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