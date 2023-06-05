<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/1_Header.css">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/2_Main.css">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/3_Footer.css">
    <link rel="stylesheet" type="text/css" href="Réinitialiser_mot_de_passe.css">
    <title>Metric Care</title>
    <link rel="icon" href="../../Origine/Images/Logo.png">
  </head>
  <body>
  <?php 
session_start(); // Démarrer la session

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email']; // Récupérer la valeur de la variable
    // Utilisez la variable comme nécessaire dans la page Profil.PHP
} else {
    // La variable n'est pas définie
}

$host = 'localhost';
$username = 'abdelmoad';
$dbpassword = '123456';
$dbName = 'metric_care';

$mysqli = mysqli_connect($host, $username, $dbpassword, $dbName);

if (!$mysqli) {
    die('Erreur de connexion à la base de données: ' . mysqli_connect_error());
}

$i = $mysqli->query("SELECT PersonneId FROM personnes  WHERE AdressMail ='$email'");
$id = $i->fetch_assoc();

$numero = null;    
  if (!empty($id)){
    try{
      $pwd = $mysqli->query("SELECT MotDePas FROM logins WHERE PersonneId = {$id['PersonneId']}");
      $password = $pwd->fetch_assoc();
    }catch(PDOException $e){
      $erreur = $e->getMessage();
    }


  }else{
    echo 'Veuillez vous connecter.';
  }





if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
  $npwd = $_POST['np'];
  $apwd = $_POST['ap'];
  $cpwd = $_POST['cp'];

  
  $erreurs = array(); 

  if (empty($npwd)) {
    $erreurs[] = "Veuillez saisir le nouveau mot de passe";
}

if (empty($apwd)) {
    $erreurs[] = "Veuillez saisir l'ancien mot de passe";
} elseif ($apwd != $password['MotDePas']) {
    $erreurs[] = "Mot de passe incorrect";
}

if (empty($cpwd)) {
    $erreurs[] = "Veuillez confirmer le mot de passe";
} elseif ($npwd != $cpwd) {
    $erreurs[] = "Les mots de passe ne correspondent pas";
}

if (!empty($erreurs)) {
    foreach ($erreurs as $erreur) {
        echo $erreur . "<br>";
    }
} else {
    
  $query = "UPDATE logins SET MotDePas = '$npwd' WHERE PersonneId = {$id['PersonneId']}";

    $result = mysqli_query($mysqli, $query);
    if ($result) {
        echo "Les données ont été enregistrées avec succès.";
    } else {
        echo "Une erreur s'est produite lors de l'enregistrement des données.";
    }
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
      <div class="Profil">
        <p><a href="../../Administrateur/Profil_Admin/Profil_Admin.PHP">◂ Profil</a></p>
      </div>
      <div class="main-container">
        <h1>Réinitialisation du mot de passe</h1>
        <?php
    if (!empty($erreurs)) {
      echo '<div class="erreur-container">';
      foreach ($erreurs as $erreur) {
        echo '<p>' . $erreur . '</p>';
      }
      echo '</div>';
    }
    else {
      echo 'Enregistré avec succès';}
    ?>
        <form action="" method="POST">
          <input type="password" id="AncienMotDePasse" placeholder="Ancien mot de passe" name="ap"><br><br>
          <input type="password" id="NouveauMotDePasse" placeholder="Nouveau mot de passe" name="np"><br><br>
          <input type="password" id="ConfirmerMotDePasse" placeholder="Confirmer votre mot de passe" name="cp"><br><br>
          <button type="submit">Enregistrer</button>
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