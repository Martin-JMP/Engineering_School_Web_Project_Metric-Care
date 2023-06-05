<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/1_Header.css">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/2_Main.css">
    <link rel="stylesheet" type="text/css" href="../../Origine/CSS/3_Footer.css">
    <link rel="stylesheet" type="text/css" href="../../Utilisateur/Forum/Forum.css">
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

<h1>Sujet</h1>

<div style="height: 2px; background: black; width: 95%; margin-left: auto; margin-right: auto;"></div>


<div class=sujet>
    <table>
        <thead>
        <tr>
            <th>Auteur</th>
            <th>Message</th>
            <th>Date</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $numero_article = $_GET['numero_article'];
        include("read_forum_premier_message.php");
        $row = $stmt->fetch(PDO::FETCH_ASSOC)
            ?>
            <tr>
                <td><?php echo htmlspecialchars($row['nom'] . " " . $row['prenom']); ?></td>
                <td><?php echo htmlspecialchars($row['message']); ?></td>
                <td><?php echo htmlspecialchars($row['date']); ?></td>

            </tr>

        <?php
        include('read_forum_message.php');
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
            ?>
            <tr>
                <td><?php echo htmlspecialchars($row['nom'] . " " . $row['prenom']); ?></td>
                <td><?php echo htmlspecialchars($row['message']); ?></td>
                <td><?php echo htmlspecialchars($row['date']); ?></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>
<form action="forum_cree_message.php?numero_article=<?php echo $numero_article; ?>" method="post">
    <label for="message">Message:</label>
    <textarea id="message" name="message"></textarea>
    <br>
    <input type="submit" name="submit" value="Valider">
</form>
<div class="vide">
</div>
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