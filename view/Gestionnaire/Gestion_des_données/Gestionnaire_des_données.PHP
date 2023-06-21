<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/1_Header.css">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/2_Main.css">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/3_Footer.css">
    <link rel="stylesheet" type="text/css" href="Gestionnaire_des_donnees.css">
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
            <a href="Gestionnaire_des_donneesA.php">🌐Français</a>
            <a href="../../General/Contact/Contact.PHP">Contact</a>
            <a href="../../General/FAQ/FAQ.PHP">FAQ</a>
            <a href="../../General/AboutUs/AboutUs.PHP">Qui sommes nous ?</a>
            <a href="../../../Metric_Care.PHP">Deconnexion</a>
          </div>
        </nav>
      </div>
    </header>
    <main>
      <h1>Les utilisateurs du système</h1>
    <?php
      function alert($msg) {
        echo "<script type='text/javascript'>alert('$msg');</script>";
      }
      $host = 'localhost';
      $username = 'martin';
      $password = 'test';
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
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['button1'])){
          $nom = $_POST['surname'];
          if (!empty($nom)){
            try{
              $ins1 = $connection->query("SELECT personnes.PersonneId, personnes.Prenom, personnes.Nom, personnes.AdressMail, personnes.Poids, personnes.Taille, personnes.Fonction, authentificationprimaire.AuthentificationId from personnes, authentificationprimaire where personnes.PersonneId = authentificationprimaire.PersonneId AND (personnes.Nom = '$nom' OR personnes.Prenom = '$nom')");
              if (mysqli_num_rows($ins1) > 0) {
                // Step 4: Display the results in a table
                echo "<table>";
                echo "<tr><th>PersonneId</th><th>Prenom</th><th>Nom</th><th>AdressMail</th><th>Poids</th><th>Taille</th><th>Fonction</th><th>AuthentificationId</th></tr>";
            
                while ($row = mysqli_fetch_assoc($ins1)) {
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
              } 
            }
            catch(PDOException $e){
              $erreur = $e->getMessage();
              alert("Nous n'avons pas trouvé cet utilisateur.");
            }
          } else {
            alert("Nous n'avons pas cet utilisateur.");
          }
        }
      }
      // Close the database connection
      mysqli_close($connection);
    ?>
    </main>
    <form method="post" id="user-surname">
        <input type="text" name="surname" placeholder="Nom ou prénom" id="surname">
        <button type="submit" name="button1" id="search" >Chercher un utilisateur par son nom ou prénom</button>
    </form>
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
          <a href="../../General/Contact/Contact.PHP">À propos</a> <a>|</a>
          <a href="../../General/Cookies/Cookies.PHP">Préférences des cookies</a>
        </div>
      </div>
    </footer>
  </body>
</html>
