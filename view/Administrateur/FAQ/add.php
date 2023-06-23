<?php
 
    // connect with database
    $bdd = new PDO("mysql:host=localhost;dbname=metric_care","martin","test");
 
    // check if insert form is submitted
    if (isset($_POST["submit"]))
    {
        // create table if not already created
        $sql = "CREATE TABLE IF NOT EXISTS faqs (
            id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
            question TEXT NULL,
            answer TEXT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )";
        $statement = $bdd->prepare($sql);
        $statement->execute();
 
        // insert in faqs table
        $sql = "INSERT INTO faqs (question, answer) VALUES (?, ?)";
        $statement = $bdd->prepare($sql);
        $statement->execute([
            $_POST["question"],
            $_POST["answer"]
        ]);
    }
 
    // get all faqs from latest to oldest
    $sql = "SELECT * FROM faqs ORDER BY id DESC";
    $statement = $bdd->prepare($sql);
    $statement->execute();
    $faqs = $statement->fetchAll();
 
?>

<link rel="stylesheet" type="text/css" href="../../Utilisateur/FAQ/FAQ.css">


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
    <a id = "retour" href="../FAQ/FAQ.PHP">◄ FAQ</a>

  <p id = "FAQ"> Ajouter une Question à la FAQ </p>



<!-- layout for form to add FAQ -->
<div class="container">
    <div class="row" id="form-faq-">
        <div >
        
            <!-- for to add FAQ -->
            <form method="POST" action="add.php">
 
                <!-- question -->
                <div class="form-group" style="text-align: center;">
                    <label id = "retour" style="margin-left: -40%; font-size: 25px;">Question</label><br>
                    <input type="text" name="question" class="form-control" required 
                    style="
                    border-color: #9aa0a6; 
                    border: 1px solid #dfe1e5; 
                    resize: none; 
                    border-radius : 10px;  
                    width: 800px;
                    padding:10px;
                    margin-top : 15px;
                    margin-bottom: 30px;
                    margin-left: 15%;
                    "
                    />
                </div>
 
                <!-- answer -->
                <div class="form-group" style="text-align: center;">
                    <label id = "retour" style="margin-left: -40%; font-size: 25px;">Réponse</label><br>
                    <textarea name="answer" id="answer" class="form-control" required 
                    style="
                    border-color: #9aa0a6; 
                    border: 1px solid #dfe1e5;
                    resize: none; 
                    border-radius : 10px;  
                    width: 800px;
                    padding:10px;
                    margin-top : 15px;
                    margin-left: 15%;
                    height: 250px;
                    ">
                    </textarea>
                </div>
 
                <!-- submit button -->
                <div style="text-align: center; margin-top: 20px;">
                <input type="submit" name="submit" class="btn btn-info" value="Ajouter à la FAQ" id="submit-faq" style="font-family: 'Carme';
    font-style: normal;
    font-weight: 400;
    font-size: 24px;
    line-height: 1;
    text-align: center;
    color: #FFFFFF;
    background-color:#82BBBA ;
    border-color: transparent;
    border-radius: 10px;
    margin-left: 15%;
    padding: 10px;"/>
                </div>
            </form>
        </div>
    </div>
 
    <!-- show all FAQs added -->
    <div class="row" style=" font-family: 'Carme';
  src: url('../fonts/carme-regular.ttf') format('truetype');
  font-style: normal;
  font-weight: 400;
    margin-top:50px ;
  margin-left: 20%;
  ">
        <div class="offset-md-2 col-md-8">
            <table class="table table-bordered">
                <!-- table heading -->
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Question</th>
                        <th>Réponse</th>
                        <th>Actions</th>
                    </tr>
                </thead>
 
                <!-- table body -->
                <tbody>
                    <?php foreach ($faqs as $faq): ?>
                        <tr>
                            <td><?php echo $faq["id"]; ?></td>
                            <td><?php echo $faq["question"]; ?></td>
                            <td><?php echo $faq["answer"]; ?></td>
                            <td>
                                <!-- edit button -->
                                <a href="edit.php?id=<?php echo $faq['id']; ?>" class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <!-- delete form -->
                                <form method="POST" action="delete.php" onsubmit="return confirm('Are you sure you want to delete this FAQ ?');">
                                    <input type="hidden" name="id" value="<?php echo $faq['id']; ?>" required />
                                    <input type="submit" value="Delete" class="btn btn-danger btn-sm" />
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
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