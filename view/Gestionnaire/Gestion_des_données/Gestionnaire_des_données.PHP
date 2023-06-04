<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/1_Header.css">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/2_Main.css">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/3_Footer.css">
    <title>Metric Care</title>
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
            <a>Contact</a>
            <a>FAQ</a>
            <a>Qui sommes nous ?</a>
            <a>Connexion</a>
          </div>
        </nav>
      </div>
    </header>
    <main>
    <?php
      $host = 'localhost';
      $username = 'vapr@metric.care';
      $password = 'vapr333!';
      $dbname = 'metric_care';
      
      $connection = mysqli_connect($host, $username, $password, $dbname);
      
      // Check connection
      if (!$connection) {
          die("Connection failed: " . mysqli_connect_error());
      }
      
      // Step 2: Execute the SQL query
      $query = "select personnes.PersonneId, personnes.Prenom, personnes.Nom, personnes.AdressMail, personnes.Poids, personnes.Taille, personnes.Fonction, authentificationprimaire.AuthentificationId from personnes, authentificationprimaire where personnes.PersonneId = authentificationprimaire.PersonneId";
      $result = mysqli_query($connection, $query);
      
      // Step 3: Fetch the results
      if (mysqli_num_rows($result) > 0) {
          // Step 4: Display the results in a table
          echo "<table>";
          echo "<tr><th>PersonneId</th><th>Prenom</th><th>Nom</th><th>AdressMail</th><th>Poids</th><th>Taille</th><th>Fonction</th><th>AuthentificationId</th></tr>";
      
          while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>".$row['PersonneId']."</td>";
              echo "<td>".$row['Prenom']."</td>";
              echo "<td>".$row['Nom']."</td>";
              echo "<td>".$row['AdressMail']."</td>";
              echo "<td>".$row['Poids']."</td>";
              echo "<td>".$row['Taille']."</td>";
              echo "<td>".$row['Fonction']."</td>";
              echo "<td>".$row['AuthentificationId']."</td>";
              echo "</tr>";
          }
          echo "</table>";
      } else {
          echo "No results found.";
      }
      
      // Close the database connection
      mysqli_close($connection);
    ?>
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