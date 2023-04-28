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
          <a href="../Contact/Contact.PHP">Contact</a>
            <a href="/FAQ.PHP">FAQ</a>
            <a href="../AboutUs/AboutUs.PHP">Qui sommes nous ?</a>
            <a href="../../Authentification/Connexion/Connexion.PHP">Connexion</a>
          </div>
        </nav>
      </div>
    </header>
    <main>
    <a id = "retour">◄ Tableau de bord</a>

  <p id = "FAQ"> FAQ </p>

  <div id = "Question">
    <h1 id = "Text_Question" class = "text-3xl">Quelle est votre Question ?  </h1>
    <div class="searchbar">
     <div class="searchbar-wrapper">
        <div class="searchbar-center">
            <div class="searchbar-input-spacer"></div>
            <input type="text" class="searchbar-input" maxlength="2048" name="q" autocapitalize="off" autocomplete="off" title="Search" role="combobox" placeholder="Posez votre question...">
        </div>
        <div class="searchbar-right">
            <div class="search-icon-wrapper">
                <span class="search-icon searchbar-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z">
                        </path>
                    </svg>
                </span>
            </div>
        </div>
      </div>
    </div>
  </div>
  
    <h1 id = "oui" class ="text-3xl">
     Catégories
    </h1>

    
  <div id = "row">
    <div class="mx-auto w-2/5">
      <details id = "details-question" class="border-2 rounded-lg mb-4 mt-4 ml-16 -mr-15">
        <summary id ="Summary" class = "text-xl cursor-pointer p-3">Compte et informations de connexion</summary>
       <div class = "bg-gray-100 text-lg"> arà_harnarapoirna</div>
      </details>
      <details id = "details-question" class="border-2 rounded-lg mb-4 ml-16 -mr-15">
        <summary id ="Summary" class = "text-xl cursor-pointer p-3">Boitiers et capteurs</summary>
        <div class = "bg-gray-100 text-lg"> arà_harnarapoirna</div>
      </details>
    </div>


    <div id = "column" class = "w-1/3 mr-auto -ml-24">
      <div class="pr-50 rounded-lg">
        <a href = "" id ="text_rubrique">Comment je peux réinitialiser mon mot de passe ? </a><br>
        <a href = "" id ="text_rubrique">Comment accéder à mes données personnelles ? </a><br>
        <a href = "" id ="text_rubrique">Comment je peux réinitialiser mon mot de passe ? </a><br>
      </div>
    </div>
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