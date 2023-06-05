
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/1_Header.css">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/2_Main.css">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/3_Footer.css">
    <link rel="stylesheet" type="text/css" href="Gestion_des_utilisateurs.css">
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
    <main>
      <h1>Les utilisateurs du système</h1>
    <?php
      function alert($msg) {
        echo "<script type='text/javascript'>alert('$msg');</script>";
      }
      $host = 'localhost';
      $username = 'vapr@metric.care';
      $password = 'vapr333!';
      $dbname = 'metric_care';
      
      $bdd = mysqli_connect($host, $username, $password, $dbname);
      
      // Check connection
      if (!$bdd) {
          die("Connection failed: " . mysqli_connect_error());
      }
      
      // Step 2: Execute the SQL query
      $query = "select personnes.PersonneId, personnes.Prenom, personnes.Nom, personnes.AdressMail, personnes.Poids, personnes.Taille, personnes.Fonction, authentificationprimaire.AuthentificationId from personnes, authentificationprimaire where personnes.PersonneId = authentificationprimaire.PersonneId";
      $result = mysqli_query($bdd, $query);
      
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
          $id = $_POST['number'];
          if (!empty($id) && $id != 8){
            try{
              $ins1 = $bdd->query("DELETE FROM authentificationprimaire where authentificationprimaire.PersonneId = '$id'");
              $ins2 = $bdd->query("DELETE from personnes where personnes.PersonneId = '$id'");
              // $post1 = $ins1->fetch();
              // $post2 = $ins2->fetch();
              //if ($ins1 && $ins2){
                alert("L'utilisateur a été supprimé");
              // }
              // else {
                
              // }
            }
            catch(PDOException $e){
              $erreur = $e->getMessage();
              alert("L'utilisateur n'a pas été supprimé");
            }
          } else {
            alert("Vous ne pouvez pas supprimer cet utilisateur.");
          }
        }
    }
      // Close the database connection
      mysqli_close($bdd);
    ?>
      <h1>Vous souhaitez supprimer un utilisateur ?</h1>
      <form method="post" id="delete-user">
        <input type="number" name="number" placeholder="PersonneId">
        <button type="submit" name="button1" id="delete" >Supprimer l'utilisateur</button>
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
          <a href="../../General/CGU/CGU.PHP">CGU</a> <a>|</a>
          <a href="../../General/AboutUs/AboutUs.PHP">À propos</a> <a>|</a>
          <a href="../../General/Cookies/Cookies.PHP">Préférences des cookies</a>
        </div>
      </div>
    </footer>
  </body>

</html>