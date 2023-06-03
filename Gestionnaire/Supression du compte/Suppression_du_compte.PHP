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
  </head>
  <body>
  <?php 


  

$id='1';


$host = 'localhost'; 
$username = 'valentyna';
$dbpassword = '12345';
$dbName = 'metric_care'; 


$mysqli = mysqli_connect($host, $username, $dbpassword, $dbName);

$numero = null;    
  if (!empty($id)){
    try{
      $pwd = $mysqli-> query("SELECT MotDePas from logins where PersonneId =$id");
      $password = $pwd->fetch_assoc();
      $e = $mysqli-> query("SELECT AdressMail from personnes where PersonneId =$id");
      $email = $e->fetch_assoc();
      $n = $mysqli-> query("SELECT AuthentificationId from authentificationprimaire where PersonneId =$id");
      $auth = $e->fetch_assoc();
    }catch(PDOException $e){
      $erreur = $e->getMessage();
    }


  }else{
    echo 'Veuillez vous connecter.';
  }






if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
  $ps = $_POST['ps'];
  $na = $_POST['na'];
  $em = $_POST['em'];
  $cs = $_POST['cs'];

  
  $erreurs = array(); 

if (empty($ps)) {
    $erreurs[] = "Veuillez saisir le mot de passe";
} elseif ($ps != $password['MotDePas']) {
    $erreurs[] = "Mot de passe incorrect";
}

if (empty($na)) {
  $erreurs[] = "Veuillez saisir le numéro d'authentification";
} elseif ($na != $auth['AuthentificationId']) {
  $erreurs[] = "Numéro d'authentification incorrect";
}

if (empty($em)) {
  $erreurs[] = "Veuillez saisir l'email";
} elseif ($na != $auth['AdressMail']) {
  $erreurs[] = "Email incorrect";
}

if (!empty($erreurs)) {
    foreach ($erreurs as $erreur) {
        echo $erreur . "<br>";
    }
} else {
    
    $query = "UPDATE logins SET MotDePas='$npwd' WHERE PersonneId=$id";
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
        <form action="" method="POST">
          <input type="input" id="NumAuth" name="na" placeholder="Numéro d'identification"><br><br>
          <input type="password" id="MotDePasse" name="ps" placeholder="Mot de passe"><br><br>
          <div class="email-container">
              <input type="input" id="Email" name="em" placeholder="Email">
              <div class="SendCode">
                  <button>Code</button>
              </div>
          </div>
          <br><br>
          <input type="password" id="CodeSupp" name="cs" placeholder="Code de suppression"><br><br>
          <button>Valider</button>
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

