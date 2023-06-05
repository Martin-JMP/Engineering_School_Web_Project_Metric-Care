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
    <a id = "retour" href="../Tableau de bord/Tableau_de_bord.PHP">◄ Tableau de bord</a>

  <p id = "FAQ"> FAQ </p>

  <div id = "row">
    <div class="mx-auto w-4/5">
      <details id = "details-question" class="border-2 rounded-lg mb-4 mt-4 m-auto">
        <summary id ="Summary" class = "text-xl cursor-pointer p-3">Comment ça marche ?</summary>
       <div class = "bg-gray-100 text-lg"> Metric Metro est un boitier composé de 5 capteurs qui mesurent la température, la qualité de l’air, le niveau sonore et le rythme cardiaque.<br> Les données sont ensuite envoyés à notre site via Bluetooth pour que vous puissiez les consulter en temps réels.</div>
      </details>
      <details id = "details-question" class="border-2 rounded-lg mb-4 m-auto">
        <summary id ="Summary" class = "text-xl cursor-pointer p-3">Quels est l'objectif de notre produit ?</summary>
        <div class = "bg-gray-100 text-lg"> L'objectif de Metric Metro est d'informer les employés des services de transport public de l'impact de leur environnemennt de travail sur leur santé, afin d'envisager des mesures permettant d'améliorer ces conditions.</div>
      </details>
      <details id = "details-question" class="border-2 rounded-lg mb-4 m-auto">
        <summary id ="Summary" class = "text-xl cursor-pointer p-3">Est-ce que les informations fournies par Metric Metro sont confidentielles ?</summary>
        <div class = "bg-gray-100 text-lg"> Oui, les informations fournies par Metric Metro sont confidentielles et protégées par la loi sur la protection des données.</div>
      </details>
      <details id = "details-question" class="border-2 rounded-lg mb-4 m-auto">
        <summary id ="Summary" class = "text-xl cursor-pointer p-3">Comment créer un compte ?</summary>
        <div class = "bg-gray-100 text-lg"> Pour créer un compte vous devez, dans un premier temps, être membre d'une entreprise cliente et dans un second temps, posséder un boitier avec son numéro d'identification. Vous pourrez ensuite procéder à la création de votre compte. </div>
      </details>
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
          <a>CGU</a> <a>|</a>
          <a>À propos</a> <a>|</a>
          <a>Préférences des cookies</a>
        </div>
      </div>
    </footer>
  </body>
</html>