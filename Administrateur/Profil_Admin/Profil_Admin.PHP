
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/1_Header.css">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/2_Main.css">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/3_Footer.css">
    <link rel="stylesheet" type="text/css" href="../../Administrateur/Profil_Admin/Profil_Admin.css">
    <title>Metric Care</title>
    <link rel="icon" href="../../Origine/Images/Logo.png">
  </head>
  <body>
    <?php

  $email = 'vbaudin@ratp.fr';
  $password = '!icgWdyuwvmcJbcj1';
  #$_SESSION['email'] = $email;
  #$_SESSION['password'] = $password;



  $bdd = new PDO("mysql:host=localhost;dbname=metric_care","abdelmoad","123456");


    if (!empty($email && $password)){
      try{
        $n = $bdd->query("SELECT personnes.Nom FROM logins, personnes  WHERE logins.PersonneId = personnes.PersonneId AND personnes.AdressMail = '$email' AND logins.MotDePas = '$password'");
        $nom = $n -> fetch();
        $p = $bdd->query("SELECT personnes.Prenom FROM logins, personnes  WHERE logins.PersonneId = personnes.PersonneId AND personnes.AdressMail = '$email' AND logins.MotDePas = '$password'");
        $prenom = $p -> fetch();
        $a = $bdd->query("SELECT personnes.DateDeNaissance FROM logins, personnes  WHERE logins.PersonneId = personnes.PersonneId AND personnes.AdressMail = '$email' AND logins.MotDePas = '$password'");
        $age = $a -> fetch();
        $auth = $bdd->query("SELECT * from personnes, authentificationprimaire, logins where personnes.PersonneId = authentificationprimaire.PersonneId and logins.PersonneId = personnes.PersonneId AND personnes.AdressMail = '$email' AND logins.MotDePas = '$password'");
        $numero = $auth -> fetch();
      }catch(PDOException $e){
        $erreur = $e->getMessage();
      }


    }else{
      echo 'Veuillez vous connecter.';
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
              <a>Contact</a>
              <a>FAQ</a>
              <a>Qui sommes nous ?</a>
              <a>Connexion</a>
            </div>
          </nav>
        </div>
      </header>
      <main>
        <div class="title">
          <p>Gestion de profil Administrateur<p>
        </div>
        <div class="Nom">
          <div class="Intitule">
            <p>Nom<p>
          </div>
          <div class="Entrée">
            <p><?php echo $nom['Nom']; ?><p>
          </div>
          <div class="Editer">
            <p>Éditer<p>
          </div>
        </div>
        <div class="Prénom">
          <div class="Intitule">
            <p>Prénom<p>
          </div>
          <div class="Entrée">
          <p><?php echo $prenom['Prenom']; ?><p>
          </div>
          <div class="Editer">
            <p>Éditer<p>
          </div>
        </div>
        <div class="Email">
          <div class="Intitule">
            <p>E-mail<p>
          </div>
          <div class="Entrée">
          <p><?php echo $email; ?><p>
          </div>
          <div class="Editer">
            <p><a href="http://localhost/Metric_Care/Metric_Care/Utilisateur/Editer_Profil/Editer_Profil.PHP">Editer</a><p>
          </div>
        </div>
        <div class="MDP">
          <div class="Intitule">
            <p>Mot de passe<p>
          </div>
          <div class="Entrée">
          <p><?php echo $password; ?><p>
          </div>
          <div class="Reinitialiser">
            <p>Réinitialiser<p>
          </div>
        </div>
        <div class="Tableau">
          <p><a href="http://localhost/Metric_Care/Metric_Care/Administrateur/Tableau_de_Bord_Admin/Tableau_de_Bord_Admin.PHP">◂ Tableau de bord</a><p>
        </div>
        <div class="Deconnexion">
          <p><a href="http://localhost/Metric_Care/Metric_Care/Utilisateur/Tableau%20de%20bord/Tableau_de_Bord.PHP">Déconnexion</a><p>
        </div>
        <div>
          <img id="Photo" src="http://localhost/Metric_Care/Metric_Care/Utilisateur/Profil/Images/photo.jpg" alt="Utilisateur" width="258" height="240">
        </div>
        <div class="Photo">
          <p>Importer une photo<p>
        </div>
        <div class="Enregistrer">
        <button onclick="window.location.href = 'http://localhost/Metric_Care/Metric_Care/Utilisateur/Capteurs/Capteurs.PHP';">Enregistrer</button>
        </div>
        <div class="Supprimer">
        <button onclick="window.location.href = 'http://localhost/Metric_Care/Metric_Care/Utilisateur/Capteurs/Capteurs.PHP';">Supprimer le compte</button>
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