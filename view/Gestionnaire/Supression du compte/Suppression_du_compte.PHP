<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/1_Header.css">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/2_Main.css">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/3_Footer.css">

    <link rel="stylesheet" type="text/css" href="Suppression_du_compte.css">

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
            <a href="Tableau_de_bord_Gestionnaire.PHP">Tableau de bord</a>
            <a href ="../Forum/Forum.PHP">Forum</a>
            <a href ="../Profil_Gestionnaire/Profil_Gestionnaire.PHP">Profil</a>
          </div>
        </nav>
      </div>
    </header>
    <main>

        <div class="main-container">
        <h1>Suppression du compte</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <input type="input" id="NumAuth" name="na" placeholder="Numéro d'identification"><br><br>
          <input type="password" id="MotDePasse" name="ps" placeholder="Mot de passe"><br><br>
          <div class="email-container">
              <input type="email" id="Email" name="mail" placeholder="Email" value="<?php if(isset($mail)){ echo $mail; }?>" required>
              <div class="SendCode">
                  <button type="submit" name ="CodeSub">Code</button>
              </div>
          </div>
          <br><br>
          <input type="password" id="CodeSupp" name="cs" placeholder="Code de suppression"><br><br>
          <button type="submit" name = "valider">Valider</button>
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

function generercode() {
  $caracteres = '0123456789';
  $code = '';
  
  for ($i = 0; $i < 8; $i++) {
      $indexAleatoire = mt_rand(0, strlen($caracteres) - 1);
      $code .= $caracteres[$indexAleatoire];
  }
  
  return $code;
}

if (isset($_POST['CodeSub'])) {
  $email=$_POST['mail'];
  $bdd = new PDO("mysql:host=localhost;dbname=metric_care","martin","test");

  if (!empty($mail)){
      $sth = $bdd->query("SELECT personnes.PersonneId FROM personnes  WHERE personnes.AdressMail = '$email'");
      $post = $sth->fetch();
      if($post){
        $codeds = generercode();
        $query = "UPDATE logins SET codesuprr = :codesuprtest WHERE PersonneId = :personneid";
        $stmt = $bdd->prepare($query);
        $stmt->bindValue(':codesuprtest', $codeds);
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
    $mail->Subject = 'Code Suppression';
    $mail->Body    = 'Voici votre code pour la suppression du compte : <b> ' . $codeds . ' <br><br>  En cas de problème veuillez répondre à ce mail directement.';
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

if (isset($_POST['valider'])) {
  $codesuprri =$_POST['cs'];
  $motpass=$_POST['ps'];
  $numid = $_POST['na'];
  $email=$_POST['mail'];
  $bdd = new PDO("mysql:host=localhost;dbname=metric_care","martin","test");
  $h = md5($motpass);
  if (!empty($codesuprri)){
      $sth = $bdd->query("SELECT personnes.PersonneId FROM logins, personnes, authentificationprimaire  WHERE logins.PersonneId = authentificationprimaire.PersonneId and logins.PersonneId = personnes.PersonneId and personnes.AdressMail = '$email' and authentificationprimaire.AuthentificationId = '$numid' and logins.MotDePas = '$motpass' and logins.codesuprr = '$codesuprri'");
      $post = $sth->fetch();
      if($post){
        $queryLogins = "DELETE FROM logins WHERE PersonneId = :personneid";
        $stmtLogins = $bdd->prepare($queryLogins);
        $stmtLogins->bindValue(':personneid', $post['PersonneId']);
        $stmtLogins->execute();

        // Suppression dans la table authentificationprimaire
        $queryAuthentification = "DELETE FROM authentificationprimaire WHERE PersonneId = :personneid";
        $stmtAuthentification = $bdd->prepare($queryAuthentification);
        $stmtAuthentification->bindValue(':personneid', $post['PersonneId']);
        $stmtAuthentification->execute();

        // Suppression dans la table personnes
        $queryPersonnes = "DELETE FROM personnes WHERE PersonneId = :personneid";
        $stmtPersonnes = $bdd->prepare($queryPersonnes);
        $stmtPersonnes->bindValue(':personneid', $post['PersonneId']);
        $stmtPersonnes->execute();


        echo '<script>showAlert("ton compte est suprrimée");</script>';
        
        header('Location: ../../../Metric_Care.php');
}
else {
  echo '<script>showAlert("Utilisateur introuvable");</script>';
}
}
else{
echo '<script>showAlert("Erreur");</script>';
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

