<?php
require('../Forum/publier-question-Action.php');
//require('../Forum/securityAction.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/1_Header.css">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/2_Main.css">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/3_Footer.css">
    <link rel="stylesheet" type="text/css" href="../../Utilisateur/Forum/Forum.css">
    <title>Metric Care</title>
    <link rel="icon" href="../../Origine/Images/Logo.png">
  </head>
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
  <body>
    <main>

    <h1>Publier une Question </h1>

    <form id="publication-question"  method="post">
            <?php 
              if(isset($errormsg)){
                echo '<p>'.$errormsg.'<p>';
              } elseif(isset($successMsg)) {
                echo '<p>'.$successMsg.'<p>';
              }
            ?>

            <div class="title-question">
                <label for="exampleInputEmail" class="form-label">Titre de la question</label><br>
                <input id="title-input" type="text" name="title" >
            </div>
            <div class="content-question">
                <label for="exampleInputEmail" class="form-label">Contenu de la question</label><br>
                <textarea id="content-input" class="form-control" name="content"></textarea>
            </div>

            <button type="submit" name="validate" id="publier">Publier</button>
        </form>













    
    
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
