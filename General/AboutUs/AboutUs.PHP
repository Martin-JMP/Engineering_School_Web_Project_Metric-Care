<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/1_Header.css">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/3_Footer.css">
    <link rel="stylesheet" type="text/css" href="../../General/CGU/CGU.css">
    <link rel="stylesheet" type="text/css" href="../../General/AboutUs/AboutUs.css">

    <title>Metric Care</title>
    <link rel="icon" href="Origine/Images/Logo.png">


    <style>
      .modal {
        display: flex;
        align-items: center;
        justify-content: center;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 9999;
      }

      .modal-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        max-width: 400px;
      }
    </style>



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
            <a href="AboutUs.PHP">Qui sommes nous ?</a>
            <a href="../../Authentification/Connexion/Connexion.PHP">Connexion</a>
          </div>
        </nav>
      </div>
    </header>

    

    <main>
    

      <div class="Titre">
        <a>Qui sommes-nous ?</a>
      </div>
      <div class="Notre_Mission">
        <a>Notre mission</a>
      </div>
      <div class="Contenu_Mission">
        <a>Metric Care vise à contribuer au bien être de ses utilisateurs.
        <br><br>Nous voulons que les conducteurs et chauffeurs de métro,<br>bus et tram,
        soient dans les meilleurs conditions de travail possible.
        <br>C'est notre boîtier Metric Care qui va permettre une étude<br>de différents facteur,
        pour mettre en place par la suite des solutions.
      </div>
      <div class="Capteur_CO2">
        <img id="Capteur_CO2" src="../../General/AboutUs/capteur_CO2.png" alt="Capteur de CO2">
      </div>
      <div class="Image_boitier">
        <img id="boitier" src="../../General/AboutUs/boitier.png" alt="Boitier Metric Metro">
      </div>
      <div class="Nos_Enjeux">
        <a>Nos enjeux</a>
      </div>
      <div class="Contenu_Enjeux">
          <a>Les enjeux du boîtier Metric Metro sont portés sur l'étude
          <br>de la santé de ses utilisateurs, tout en respectant une utilisation
          <br>simple et accessible. 
          <br><br>Nous proposons donc un outil de mesure qui vise à améliorer<br>le bien être 
          ainsi que la santé des conducteurs et conductrices.
      </div>
      <div class="Femme_Volant">
            <img id="conductrice" src="../../General/AboutUs/femme-volant.png" alt="Femme chauffeuse bus">
      </div>
      <div class="Menu_principal">
        <a href="../../Metric_Care.PHP"> ◂ Menu principal</a>
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



<script>
    const imageBoitier = document.getElementById("boitier");
    const capteurCO2 = document.getElementById("Capteur_CO2");

    imageBoitier.addEventListener("mouseover", () => {
        capteurCO2.style.opacity = "1";
        capteurCO2.style.transform = "translate(30%, -30%)";
    });

    imageBoitier.addEventListener("mouseout", () => {
        capteurCO2.style.opacity = "0";
        capteurCO2.style.transform = "translateY(30%)";
    });
</script>


<script>
    // Placez le code JavaScript ici

    document.addEventListener('DOMContentLoaded', function() {
    var cookiesLink = document.querySelector('.Footer_contenu_texte a[href="../../General/Cookies/Cookies.PHP"]');

    cookiesLink.addEventListener('click', function(event) {
    event.preventDefault();

    var modal = document.createElement('div');
    modal.classList.add('modal');

    var modalContent = document.createElement('div');
    modalContent.classList.add('modal-content');

    var heading = document.createElement('h2');
    heading.textContent = 'Préférences des cookies';

    var closeButton = document.createElement('button');
    closeButton.textContent = 'Fermer';

    modalContent.appendChild(heading);
    modalContent.appendChild(closeButton);
    modal.appendChild(modalContent);

    document.body.appendChild(modal);

    closeButton.addEventListener('click', function() {
      document.body.removeChild(modal);
    });
  });
});

</script>