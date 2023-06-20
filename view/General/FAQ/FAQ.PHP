<?php
 
    // connect with database
    $bdd = new PDO("mysql:host=localhost;dbname=metric_care","martin","test");
 
    // fetch all FAQs from database
    $sql = "SELECT * FROM faqs";
    $statement = $bdd->prepare($sql);
    $statement->execute();
    $faqs = $statement->fetchAll();
 
?>
<link rel="stylesheet" type="text/css" href="../../Utilisateur/FAQ/FAQ.css">


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/1_Header.css">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/2_Main.css">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/3_Footer.css">
    <link rel="stylesheet" type="text/css" href="../../Utilisateur/FAQ/FAQ.css">
    <title>Metric Care</title>
    <link rel="icon" href="../../Origine/Images/Logo.png">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
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
            <a href="../Contact/Contact.PHP">Contact</a>
            <a href="../FAQ/FAQ.PHP">FAQ</a>
            <a href="../AboutUs/AboutUs.PHP">Qui sommes nous ?</a>
            <a href="../../Authentification/Connexion/Connexion.PHP">Connexion</a>
          </div>
        </nav>
      </div>
    </header>
    <main>
    <a id = "retour" href="../../Metric_Care.php">◄ Accueil</a>

  <p id = "FAQ" style="margin-bottom: 30px;"> FAQ </p>




<?php foreach ($faqs as $faq): ?>
    <details id = "details-question" class="border-2 rounded-lg mb-4 m-auto" style="margin-left: 10%; margin-right:10%;">
        <summary id ="Summary" class = "text-xl cursor-pointer p-3"><?php echo $faq["question"]; ?></summary>
        <div class = "bg-gray-100 text-lg"> <?php echo $faq["answer"]; ?> </div>
    </details>
<?php endforeach; ?>
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
        <div class="Footer_contenu_texte">
          <a href="../../Utilisateur/CGU/CGU.PHP">CGU</a> <a>|</a>
          <a href="../../Utilisateur/AboutUs/AboutUs.PHP">À propos</a> <a>|</a>
          <a >Préférences des cookies</a>
        </div>
        </div>
      </div>
    </footer>
  </body>
</html>
