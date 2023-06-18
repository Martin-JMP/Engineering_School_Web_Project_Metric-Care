<?php
 
    // connect with database
    $bdd = new PDO("mysql:host=localhost;dbname=metric_care","martin","test");
 
    // check if FAQ exists
    $sql = "SELECT * FROM faqs WHERE id = ?";
    $statement = $bdd->prepare($sql);
    $statement->execute([
        $_REQUEST["id"]
    ]);
    $faq = $statement->fetch();
 
    if (!$faq)
    {
        die("FAQ not found");
    }
 
    // check if edit form is submitted
    if (isset($_POST["submit"])){
    // update the FAQ in database
        $sql = "UPDATE faqs SET question = ?, answer = ? WHERE id = ?";
        $statement = $bdd->prepare($sql);
        $statement->execute([
        $_POST["question"],
        $_POST["answer"],
        $_POST["id"]
        ]);
 
        // redirect back to previous page
        header("Location: add.php");
    }      
?>



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
            <a href="../FAQ/add.php">Gérer la FAQ</a>
            <a>🌐Français</a>
            <a href="../Tableau de bord/Tableau_de_bord.PHP">Tableau de bord</a>
            <a href ="../FAQ/FAQ.php">FAQ</a>
            <a href ="../Forum/Forum.PHP">Forum</a>
            <a href ="../Ticket/Ticket.PHP">Ticket</a>
            <a href ="../Profil/Profil.PHP">Profil</a>
          </div>
        </nav>
      </div>
    </header>
    <main>
    <a id = "retour" href="../FAQ/add.php">◄ Ajouter une Question à la FAQ</a>

  <p id = "FAQ"> Modifier la FAQ </p>

<!-- layout for form to edit FAQ -->
<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="row">
        <div class="offset-md-3 col-md-6">
          
 
            <!-- form to edit FAQ -->
            <form method="POST" action="edit.php">
 
                <!-- hidden ID field of FAQ -->
                <input type="hidden" name="id" value="<?php echo $faq['id']; ?>" required />
 
                <!-- question, auto-populate -->
                <div class="form-group" style="text-align: center;">
                    <label id = "retour" style="margin-left: -5%; font-size: 25px;">Question</label><br>
                    <input type="text" name="question" class="form-control" value="<?php echo $faq['question']; ?>" required 
                    style="
                    border-color: #9aa0a6; 
                    border: 1px solid #dfe1e5; 
                    resize: none; 
                    border-radius : 10px;  
                    width: 800px;
                    padding:10px;
                    margin-top : 15px;
                    margin-bottom: 30px;
                    margin-left: 40%;
                    "
                    />
                </div>

                <!-- answer, auto-populate -->
                <div class="form-group" style="text-align: center;">
                    <label id = "retour" style="margin-left: -5%; font-size: 25px;">Réponse</label><br>
                    <textarea name="answer" id="answer" class="form-control" required 
                    style="
                    border-color: #9aa0a6; 
                    border: 1px solid #dfe1e5;
                    resize: none; 
                    border-radius : 10px;  
                    width: 800px;
                    padding:10px;
                    margin-top : 15px;
                    margin-left: 40%;
                    height: 250px;
                    "> <?php echo $faq['answer']; ?>
                    </textarea>
                </div>
 
                <!-- submit button -->

                <div style="text-align: center; margin-top: 20px;">
                <input type="submit" name="submit" class="btn btn-warning" value="Modifier FAQ" id="submit-faq" style="font-family: 'Carme';
    font-style: normal;
    font-weight: 400;
    font-size: 24px;
    line-height: 1;
    text-align: center;
    color: #FFFFFF;
    background-color:#82BBBA ;
    border-color: transparent;
    border-radius: 10px;
    margin-left: 35%;
    padding: 10px;"/>
                </div>
            </form>
        </div>
    </div>
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