<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="Inscription.css"> 
    <title>Metric Care</title>
    <link rel="icon" href="../../Origine/Images/Logo.png">
  </head>
  <body>
    <?php
    // Replace with your own database credentials
                  $host = "localhost";
                  $creds = file(".creds");
                  $creds_line = $creds[0];
                  $creds_parts = explode(":", $creds_line);
                  $username = $creds_parts[0];
                  $password = $creds_parts[1];
                  $dbname = "employees";

                  // Connect to the database using PDO
                  $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
                  $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                  ];
                  try {
                    $pdo = new PDO($dsn, $username, $password, $options);
                  } catch (PDOException $e) {
                    echo "error connecting";
                    throw new PDOException($e->getMessage(), (int) $e->getCode());
                  }

                  // Get the email and password from the form
                  $email = $_POST["email"];
                  $password = $_POST["password"];

                  // Prepare and execute the query to check if the user exists
                  $sql = "SELECT password FROM creds WHERE email = :email";
                  $stmt = $pdo->prepare($sql);
                  $stmt->execute(["email" => $email]);
                  if ($stmt->rowCount() > 0) {
                    $row = $stmt->fetch();
                    $password_hash = $row["password"];
                    if (password_verify($password, $password_hash)) {
                      echo "Password is valid!";
                      echo '<script>alert("Your password is valid ! Congratulation")</script>';
                    } else {
                      echo "Invalid password.";
                    }
                  } else {
                    echo "Error, bad credentials";
                  }
    ?>
    <header>
        <div>
            <img id="Logo" src="../../Origine/Images/Logo.png" alt="Logo Metric Metro", width="100", height="55"> 
            <div class="Langue">
                <a>🌐Français</a>
            </div>
        </div>  
    </header>
    <main>
        <div class="Inscription">
            <a>Inscription</a>
        </div>
        <div class="Prenom_Nom">
            <input type="text" id="prenom" name="prenom" placeholder="Prenom">
            <input type="text" id="nom" name="nom" placeholder="Nom">
        </div>
        <div class="container">
            <div class="email">
                <input type="email" placeholder="Email">
            </div>
            <div class="NUM_IDENT">
                <input type="number" placeholder="Numero d'Identification" pattern="[0-9]{6}" title="Le Numéro d'Identification doit comporter six chiffres">
            </div> 
            <div class="mdp">
                <input type="password" placeholder="Mot de passe">
            </div> 
            <div class="mdp_Confirme">
                <input type="password" placeholder="Confirmer le mot de passe">
            </div>    
        </div>
        <br></br>
        <div class="CGU">
            <input type="checkbox" name="cgu" id="cgu">
            <label for="cgu">J'accepte les <span><a href="#">conditions générales d'utilisation</a></span></label>
        </div>

        </div>
        <div class="rectangle-creer">
            <a>Créer mon compte</a>
        </div>
    </main>
  </body>
</html>