<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/1_Header.css">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/2_Main.css">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/3_Footer.css">
    <title>Metric Care</title>


    <link rel="stylesheet" type="text/css" href="capteurs.css">

    <link rel="icon" href="../../Origine/Images/Logo.png">
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
      
    <title>Capteurs</title>
      <div class="text">
        <a class="temperature">Température</a>
        <a class="humidite">Taux d'humidité</a>
        <a class="son">Niveau sonore</a>
        <a class="cardio">Rythme cardiaque</a>
        <a class="co2">Taux de CO2</a>
      </div>

      <a href="../Capteur_Temperature/Capteur_Temperature.PHP">
      <input id="temperatureButton" class="temperatureButton" type="button" value="Loading...">
<script>
  // JavaScript
  function updateRect0Value() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("temperatureButton").value = this.responseText + "°C";
      }
    };
    xhttp.open("GET", "../Capteur_Temperature/value_temp.php", true);
    xhttp.send();
  }

  setInterval(updateRect0Value, 500); // Refresh every 0.5 seconds
</script>
      </a>
      <a href="../Capteur_Humidité/Capteur_humidite.PHP">
      <input id="humiditeButton" class="humiditeButton" type="button" value="Loading...">
<script>
  // JavaScript
  function updateRect0Value() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("humiditeButton").value = this.responseText + "%";
      }
    };
    xhttp.open("GET", "../Capteur_Humidité/value_humid.php", true);
    xhttp.send();
  }

  setInterval(updateRect0Value, 500); // Refresh every 0.5 seconds
</script>
      </a>
      <a href="../Capteur_Sonore/Capteur_Sonore.PHP">
      <input class="sonButton" type="button" value="NA dB">
      </a>
      <a href="../Capteur_Cardiaque/Capteur_Cardiaque.PHP">
      <input class="cardioButton" id="cardioButton" type="button" value="Loading...">
<script>
  // JavaScript
  function updateRect0Value() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("cardioButton").value = this.responseText + " bpm";
      }
    };
    xhttp.open("GET", "../Capteur_Cardiaque/value_cardia.php", true);
    xhttp.send();
  }

  setInterval(updateRect0Value, 500); // Refresh every 0.5 seconds
</script>
      </a>
      <a href="../Capteur_CO2/Capteur_CO2.PHP">
      <input class="co2Button" type="button" value="NA μg/m³">
      </a>

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
