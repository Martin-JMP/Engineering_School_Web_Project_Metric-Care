<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/1_Header.css">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/3_Footer.css">
    <link rel="stylesheet" type="text/css" href="../../General/CGU/CGU.css">
    <link rel="stylesheet" type="text/css" href="AboutUs.css">

    <title>Metric Care</title>
    <link rel="icon" href="Origine/Images/Logo.png">


    <style>
      /* COOKIES */
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
        padding-top: 5px;
        padding-left: 20px;
        border-radius: 5px;
        max-width: 800px; /* Ajustez la largeur souhaitée */
        max-height: 500px; /* Ajustez la hauteur souhaitée */
        width: 80%; /* Ajoutez cette ligne pour ajuster la largeur en pourcentage */
        height: 60%; /* Ajoutez cette ligne pour ajuster la hauteur en pourcentage */
        font-family: 'Carme';
        color: #545454;

        display: flex;
        flex-direction: column;
      }

      .modal-content button {
        align-self: flex-end;
        margin-right: 20px;
        margin-top: 320px;

        padding: 5px 5px; /* Ajustez les valeurs pour augmenter la taille du bouton */
        font-size: 16px; /* Ajustez la taille de la police du bouton si nécessaire */

        background-color: transparent;
        border: 2px solid #82BBBA;
        border-radius: 12px;
        box-sizing: border-box;
        color: #82BBBA;
        cursor: pointer;
        display: inline-block;
        font-family: Roobert,-apple-system,BlinkMacSystemFont,"Segoe UI",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
        font-weight: 600;
        line-height: normal;
        min-height: 40px;
        min-width: 0;
        outline: none;
        text-align: center;
        text-decoration: none;
        transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        width: 17%;
        will-change: transform;
      }

      .modal-content button:disabled {
        pointer-events: none;
      }

      .modal-content button:hover {
        color: #fff;
        background-color: #82BBBA;
        box-shadow: rgba(0, 0, 0, 0.25) 0 8px 15px;
        transform: translateY(-2px);
      }

      .modal-content button:active {
        box-shadow: none;
        transform: translateY(0);
      }
    </style>



  </head>
  <body>
    <header>
      <div id="Rectangle_Debut">
        <nav>
          <div>
            <img id="Logo" src="../../Origine/Images/Logo.png" alt="Logo Metric Metro", width="75", height="40">
            <a href="../../Metric_Care.php">
              <img id="Logo_Texte" src="../../Origine/Images/Logo_texte.png" alt="Logo Metric Metro", width="200", height="50">
            </a>
            <a href="https://infinitemeasures.fr/vues/fr/index.php" target="_blank">
            <img id="Logo_Infinite_Measures" src="../../Origine/Images/Infinite_logo.png" alt="Logo Infinite Measures", width="60", height="60"> </a>
          </div>      
          <div class="contenuNav">
          <a href="AboutUs.PHP">🌐English</a>
          <a href="../Contact/ContactA.PHP">Contact Us</a>
            <a href="../FAQ/FAQA.PHP">FAQ</a>
            <a href="AboutUsA.PHP">About us</a>
            <a href="../../Authentification/Connexion/ConnectionA.php">Sing in</a>
          </div>
        </nav>
      </div>
    </header>

    

    <main>
    

      <div class="Titre">
        <a>About us</a>
      </div>
      <div class="Notre_Mission">
        <a>Our mission</a>
      </div>
      <div class="Contenu_Mission">
        <a>Metric Care aims to contribute to the well-being of its users.
        <br><br>We want metro drivers and conductors to,<br>bus and streetcar,
        be in the best possible working conditions.
        <br>Our Metric Care box will enable us to study<br> various factors,
        in order to implement solutions..
      </div>

       <!-- Images qui bougent -->
      <div class="Capteur_CO2">
        <img id="Capteur_CO2" src="../../General/AboutUs/capteur_CO2.png" alt="CO2 sensor">
      </div>
      <div class="Capteur_Temp_Humid">
        <img id="Capteur_Temp_Humid" src="../../General/AboutUs/capteur_temperature_humidite.png" alt="Temperature and humidity sensor">
      </div>
      <div class="Capteur_Sonore">
        <img id="Capteur_Sonore" src="../../General/AboutUs/capteur_sonore.png" alt="Sound sensor">
      </div>
      <div class="Capteur_Rythme_Cardiaque">
        <img id="Capteur_Rythme_Cardiaque" src="../../General/AboutUs/capteur_rythme_cardiaque.png" alt="Heart rate sensor">
      </div>
      
      <!-- FIN images -->

      <div class="Image_boitier">
        <img id="boitier" src="../AboutUs/boitier.png" alt="Boitier Metric Metro">
      </div>
      <div class="Nos_Enjeux">
        <a>Nos enjeux</a>
      </div>
      <div class="Contenu_Enjeux">
          <a>The challenges of the Metric Metro box are to study
          <br>the health of its users, while maintaining a simple, accessible
          <br>simple and accessible. 
          <br><br>We therefore propose a measurement tool designed to improve<br>the well-being 
          and health of drivers.
      </div>
      <div class="Femme_Volant">
            <img id="conductrice" src="../AboutUs/femme-volant.png" alt="Femme chauffeuse bus">
      </div>
      <div class="Menu_principal">
        <a href="../../../Metric_Care.PHP"> ◂ Main menu</a>
      </div>

    </main>


    <footer class = "Footer">
      <div class = "contenu_Footer">
        <div class="Footer_contenu_Logo">
          <img id="LogoFooter" src="../../Origine/Images/image.png" alt="Logo Metric Metro", width="80", height="80">
          <p>Metric Care © 2023 - All rights reserved</p>
          <a href="https://infinitemeasures.fr/vues/fr/index.php" target="_blank">
          <img id="Logo_Infinite_Measures_Footer" src="../../Origine/Images/Infinite_logo.png" alt="Logo Infinite Measures", width="60", height="60"> </a>
        </div>
        <div class="Footer_contenu_texte">
          <a href="../../General/CGU/CGUA.PHP">GCU</a> <a>|</a>
          <a href="../../General/AboutUs/AboutUsA.PHP">About Us</a> <a>|</a>
          <a href="../../General/Cookies/CookiesA.PHP">Cookie preferences</a>
        </div>
      </div>
    </footer>
  </body>
</html>

<script>
    //capteur co2
    const imageBoitierCO2 = document.getElementById("boitier");
    const capteurCO2 = document.getElementById("Capteur_CO2");

    imageBoitierCO2.addEventListener("mouseover", () => {
        capteurCO2.style.opacity = "1";
        capteurCO2.style.transform = "translate(30%, -30%)";
    });

    imageBoitierCO2.addEventListener("mouseout", () => {
        capteurCO2.style.opacity = "0";
        capteurCO2.style.transform = "translateY(30%)";
    });

    //capteur température et humidité
    const imageBoitierTempHumid = document.getElementById("boitier");
    const capteurTempHumid = document.getElementById("Capteur_Temp_Humid");

    imageBoitierTempHumid.addEventListener("mouseover", () => {
        capteurTempHumid.style.opacity = "1";
        capteurTempHumid.style.transform = "translateY(-100%)";
    });

    imageBoitierTempHumid.addEventListener("mouseout", () => {
        capteurTempHumid.style.opacity = "0";
        capteurTempHumid.style.transform = "translateY(0%)";
    });

    //capteur sonore
    const imageBoitierSonore = document.getElementById("boitier");
    const capteurSonore = document.getElementById("Capteur_Sonore");

    imageBoitierSonore.addEventListener("mouseover", () => {
        capteurSonore.style.opacity = "1";
        capteurSonore.style.transform = "translate(-30%, -30%)";
    });

    imageBoitierSonore.addEventListener("mouseout", () => {
        capteurSonore.style.opacity = "0";
        capteurSonore.style.transform = "translateY(30%)";
    });

    //capteur rythme cardiaque
    const imageBoitierRythmeCardiaque = document.getElementById("boitier");
    const capteurRythmeCardiaque = document.getElementById("Capteur_Rythme_Cardiaque");

    imageBoitierRythmeCardiaque.addEventListener("mouseover", () => {
        capteurRythmeCardiaque.style.opacity = "1";
        capteurRythmeCardiaque.style.transform = "translate(-30%, -30%)";
    });

    imageBoitierRythmeCardiaque.addEventListener("mouseout", () => {
        capteurRythmeCardiaque.style.opacity = "0";
        capteurRythmeCardiaque.style.transform = "translateY(30%)";
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
    heading.textContent = 'Gérez vos préférences';

    var acceptButton = document.createElement('acceptbutton');
    acceptButton.classList.add('acceptbutton');
    acceptButton.textContent = 'Tout accepter';
    
    var rejectButton = document.createElement('rejectbutton');
    rejectButton.classList.add('rejectbutton');
    rejectButton.textContent = 'Tout refuser';

    var closeButton = document.createElement('button');
    closeButton.textContent = 'Sauvegarder';

    modalContent.appendChild(heading);
    modalContent.appendChild(acceptButton);
    modalContent.appendChild(rejectButton);
    modalContent.appendChild(closeButton);
    modal.appendChild(modalContent);

    document.body.appendChild(modal);

    closeButton.addEventListener('click', function() {
      document.body.removeChild(modal);
    });
  });
});

</script>
