<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/1_Header.css">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/2_Main.css">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/3_Footer.css">
    <link rel="stylesheet" type="text/css" href="../../Utilisateur/Profil/Profil.css">
    <title>Metric Care</title>
  </head>
  <body>
  
  <?php 


  

session_start(); 

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email']; 
} else {
    
}

$host = 'localhost';
$username = 'martin';
$dbpassword = 'test';
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
      $auth = $mysqli-> query("SELECT AuthentificationId from authentificationprimaire where PersonneId ={$id['PersonneId']}");
      $numero = $auth->fetch_assoc();
      $e = $mysqli-> query("SELECT AdressMail from personnes where PersonneId ={$id['PersonneId']}");
      $email = $e->fetch_assoc();
    }catch(PDOException $e){
      $erreur = $e->getMessage();
    }


  }else{
    echo 'Veuillez vous connecter.';
  }





if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $ddn = $_POST['ddn'];
  

  
  $erreurs = array(); 

  if (empty($nom)) {
    $erreurs[] = "Le champ Nom est obligatoire.";
  }

  if (empty($prenom)) {
    $erreurs[] = "Le champ Prénom est obligatoire.";
  }

  if (empty($ddn)) {
    $erreurs[] = "Le champ Naissance est obligatoire.";
  }

  

  
  if (!empty($erreurs)) {
    
    foreach ($erreurs as $erreur) {
      echo $erreur . "<br>";
    }
  } else {
    
$query = "UPDATE personnes SET Nom = '$nom', Prenom = '$prenom', DateDeNaissance = '$ddn' WHERE PersonneId={$id['PersonneId']}";
$result = mysqli_query($mysqli, $query);

    
    echo "Les données ont été enregistrées avec succès.";
  }
}
?>




    <header>
      <div id="Rectangle_Debut">
        <nav>
          <div>
            <img id="Logo" src="../../Origine/Images/Logo.png" alt="Logo Metric Metro" width="75" height="40">
            <img id="Logo_Texte" src="../../Origine/Images/Logo_texte.png" alt="Logo Metric Metro" width="200" height="50">
            <a href="https://infinitemeasures.fr/vues/fr/index.php" target="_blank">
              <img id="Logo_Infinite_Measures" src="../../Origine/Images/Infinite_logo.png" alt="Logo Infinite Measures" width="60" height="60">
            </a>
          </div>
          <div class="contenuNav">
            <a>🌐Français</a>
            <a href="../Tableau de bord/Tableau_de_bord.PHP">Tableau de bord</a>
            <a href ="../FAQ/FAQ.PHP">FAQ</a>
            <a href ="../Forum/Forum.PHP">Forum</a>
            <a href ="../Gestionnaire_des_utilisateurs/Gestion_des_utilisateur.PHP">Gestion des utilisateurs</a>
            <a href ="../Profil/Profil.PHP">Profil</a>
          </div>
        </nav>
      </div>
    </header>
    <main>
      <div class="title">
        <p>Edition de profil<p>
      </div>
      <form method="POST" action="Editer_Profil.php">
        <div class="Nom">
          <div class="Intitule">
            <p>Nom<p>
          </div>
          <div class="Entrée">
            <p><input type="text" id="nom" name="nom" required size="10"><p>
          </div>
        </div>
        <div class="Prénom">
          <div class="Intitule">
            <p>Prénom<p>
          </div>
          <div class="Entrée">
          <p><input type="text" id="prenom" name="prenom" required size="10"><p>
          </div>
        </div>
        <div class="Age">
          <div class="Intitule">
            <p>Naissance<p>
          </div>
          <div class="Entrée">
          <p><input type="date" id="ddn" name="ddn" required size="10"><p>
          </div>
        </div>
        <div class="Email">
          <div class="Intitule">
            <p>E-mail<p>
          </div>
          <div class="Entrée">
          <p><p><?php echo $email['AdressMail']; ?><p><p>
          </div>
        </div>
        <div class="Enregistrer">
          <button type="submit">Enregistrer</button>
        </div>
      </form>
      <div class="Numéro">
        <div class="Intitule">
          <p>Numéro d'identification<p>
        </div>
        <div class="Entrée">
        <p><?php echo $numero['AuthentificationId']; ?><p>
        </div>
      </div>
      <div class="Tableau">
        <p><a href="../Profil_Gestionnaire/Profil_Gestionnaire.PHP">◂ Profil</a><p>
      </div>
      <div>
        <img id="Photo" src="../../Utilisateur/Profil/Images/photo.jpg" alt="Utilisateur" width="258" height="240">
      </div>
      <div class="Photo">
        <p>Importer une photo<p>
      </div>
    </main>
    <footer class="Footer">
      <div class="contenu_Footer">
        <div class="Footer_contenu_Logo">
          <img id="LogoFooter" src="../../Origine/Images/image.png" alt="Logo Metric Metro" width="80" height="80">
          <p>Metric Care © 2023 - Tous droits réservés</p>
          <a href="https://infinitemeasures.fr/vues/fr/index.php" target="_blank">
            <img id="Logo_Infinite_Measures_Footer" src="../../Origine/Images/Infinite_logo.png" alt="Logo Infinite Measures" width="60" height="60">
          </a>
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
