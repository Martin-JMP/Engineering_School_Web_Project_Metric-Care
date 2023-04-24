<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="Connexion.css"> 
    <title>Metric Care</title>
    <link rel="icon" href="../../Origine/Images/Logo.png">
  </head>
  <body>
    <?php
      function executePHP(){
        if (isset($_POST['button'])){
          $email = $_POST['email'];
          $password = $_POST['password'];

          $host = "localhost";
          $username = "valentyna";
          $password = "12345";
          $dbname = "metric_care";
          $dsn = "mysql:host=$host;dbname=$dbname";
          $bdd = new PDO($dsn, $username, $password);
          if (!empty($email && $password)){
            try{
              $sth = $bdd->query("SELECT personnes.PersonneId FROM logins, personnes  WHERE logins.PersonneId = personnes.PersonneId AND personnes.AdressMail = '$email' AND logins.MotDePas = '$password' ");
              $post = $sth->fetch();
        
              if($post){
                
                session_start();
                $_SESSION['email'] = $email;
                //header('Location: bonjour.php');
                echo 'ok';
                exit();
        
              }else{
                echo "Utilisateur inconnu";
              }
              
        
            }catch(PDOException $e){
              $erreur = $e->getMessage();
            }
        
        
          }else{
            echo 'Veuillez remplir les champs obligatoires';
          }
        }
      }
    // Replace with your own database credentials
                      /*

                      // Connect to the database using PDO
                      $dsn = "mysql:host=$host;dbname=$dbname";
                      $options = [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_EMULATE_PREPARES => false,
                      ];
                      try {
                        $pdo = new PDO($dsn, $username, $password);
                      } catch (PDOException $e) {
                        echo "error connecting";
                        //throw new PDOException($e->getMessage(), (int) $e->getCode());
                      }

                      // Get the email and password from the form
                      $email = $_GET['email'];
                      $password = $_GET['password'];

                      // Prepare and execute the query to check if the user exists
                      $sql = "SELECT MotDePas FROM logins, personnes  WHERE logins.PersonneId = personnes.PersonneId AND personnes.AdressMail = :email";
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
                      }*/
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
        <div class="Connexion">
            <a>Connexion</a>
        </div>
        <div class="container">
            <input type="email" id='email' name="email" placeholder="Email"><br></br>
            <input type="password" id='password' name="password" placeholder="Mot de passe">
        </div>
        <div class="MDP_OUBLIE">
            <a>Mot de passe oublié ?</a>
        </div>
        <div class="rectangle-connecter">
            <a id="button">Se Connecter</a>
        </div>
        <div class = "Pas_compte">
            <div>
                <div><a>Pas de</a></div>
                <div><a>compte ?</a></div>
            </div>
            <div class="Inscrivez-vous" href="#">
                <div><a href="Connexion.css">Inscrivez</a></div>
                <div><a href="Connexion.css">vous</a></div>
            </div>
        </div>
    </main>
  </body>
</html>