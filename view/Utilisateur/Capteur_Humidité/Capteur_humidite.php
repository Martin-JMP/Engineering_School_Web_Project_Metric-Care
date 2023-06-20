<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/1_Header.css">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/2_Main.css">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/3_Footer.css">
    <title>Metric Care</title>
    <link rel="icon" href="../../Origine/Images/Logo.png">
    <link rel="stylesheet" type="text/css" href="capteur_humidite.css">
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

    <title>Capteur d'humidité</title>
        <div class="text">
            <a class="act">Valeur actuelle</a>
            <a class="min">Valeur minimale</a>
            <a class="max">Valeur maximale</a>
            <a class="moy">Valeur moyenne</a>
            <a class="explication">Voici le capteur DHT11. C'est le capteur d'humidité. Il mesure l'humidité en %.</a>
          </div>

       <div class="graph">
        <iframe src="https://g28jpj-martin-joncourt.shinyapps.io/humid_capt_/" width="100%" height="100%" frameborder="0"></iframe>
      </div>
        <input class="rect0" id="rect0" type="button" value="Loading...">
        <script>
  // JavaScript
  function updateRect0Value() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("rect0").value = this.responseText + "%";
      }
    };
    xhttp.open("GET", "value_humid.php", true);
    xhttp.send();
  }

  setInterval(updateRect0Value, 500); // Refresh every 0.5 seconds
</script>
        <input class="rect1" type="button" value="76%">
        <input class="rect2" type="button" value="82%">
        <input class="rect3" type="button" value="79%">
        
        <img id="image" src="dht11.png" alt="Capteur d'humidité">

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
