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
            <a href="../Tableau de bord/Tableau_de_bord.PHP">Tableau de bord</a>
            <a href ="../FAQ/FAQ.PHP">FAQ</a>
            <a href ="../Forum/Forum.PHP">Forum</a>
            <a href ="../Gestionnaire_des_utilisateurs/Gestion_des_utilisateur.PHP">Gestion des utilisateurs</a>
            <a href ="../Profil/Profil.PHP">Profil</a>
          </div>
        </nav>
      </div>
    </header>
    <main>

    <h1>Forum</h1>
<div style="height: 2px; background: black; width: 95%; margin-left: auto; margin-right: auto;"></div>
<form action="forum_cree_article.php" method="post">
    <label for="titre">Titre:</label>
    <textarea id="titre" name="titre"></textarea>
    <label for="message">Message:</label>
    <textarea id="message" name="message"></textarea>
    <br>
    <input type="submit" name="submit" value="Ajouter">
</form>
<div style="height: 2px; background: black; width: 95%; margin-left: auto; margin-right: auto;"></div>
<table>
    <thead>
    <tr>
        <th>Auteur</th>
        <th>Date</th>
        <th>Titre</th>
        <th>Lien</th>
    </tr>
    </thead>
    <tbody>
    <?php
    include('read_forum.php');
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
        ?>
        <tr>
            <td><?php echo htmlspecialchars($row['nom'] . " " . $row['prenom']); ?></td>
            <td><?php echo htmlspecialchars($row['date']); ?></td>
            <td><?php echo htmlspecialchars($row['titre']); ?></td>
            <td><a href='./sujet.php?numero_article=<?php echo $row['numero_article']; ?>'><input type="submit"
                                                                                                  name="submit"
                                                                                                  value="Lire"></a>
        </tr>
    <?php endwhile; ?>
    </tbody>

</table>
<div class="vide">
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
