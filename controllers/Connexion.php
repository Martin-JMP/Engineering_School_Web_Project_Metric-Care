<?php


class ConnectionController
{
    public function connect()
    {
        function alert($msg) {
            echo "<script type='text/javascript'>alert('$msg');</script>";
          }
          if (isset($_POST['button'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $bdd = new PDO("mysql:host=localhost;dbname=metric_care","vapr@metric.care","vapr333!");
            
              if (!empty($email && $password)){
                try{
                  $sth = $bdd->query("SELECT personnes.PersonneId FROM logins, personnes  WHERE logins.PersonneId = personnes.PersonneId AND personnes.AdressMail = '$email' AND logins.MotDePas = '$password'");
                  $post = $sth->fetch();
                  if($post){
                    session_start();
                    if ($email == "ad@metric.care"){
                      header('Location: ../../Administrateur/Tableau_de_Bord_Admin/Tableau_de_Bord_Admin.PHP');
                    } else 
                    if($email == "gest1@metric.care" || $email == "gest2@metric.care" || $email == "gest3@metric.care" || $email == "gest4@metric.care"){
                      header('Location: ../../Gestionnaire/Tableau_de_bord_Gestionnaire/Tableau_de_Bord_Gestionniare.PHP');
                    }
                    else {
                      header('Location: ../../Utilisateur/Tableau%20de%20bord/Tableau_de_Bord.PHP');
                    }
                    $_SESSION['email'] = $email;
                    exit();
                  }else{
                    alert("Utilisateur inconnu");
                  }
                }catch(PDOException $e){
                  $erreur = $e->getMessage();
                }
              }else{
                alert('Veuillez remplir les champs obligatoires');
              }
            }
        // Check if the form was submitted
        /*if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get the email and password inputs
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Validate the inputs
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // Connect to the database (assuming PDO)
                $host = 'localhost';
                $dbname = 'metric_care';
                $username = 'vapr@metric.care';
                $password = 'vapr333!';

                try {
                    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e) {
                    die('Database connection error: ' . $e->getMessage());
                }

                // Query the users table
                $query = $db->prepare("SELECT personnes.PersonneId FROM logins, personnes  WHERE logins.PersonneId = personnes.PersonneId AND personnes.AdressMail = :email AND logins.MotDePas = :password");
                $query->execute([
                    'email' => $email,
                    'password' => $password,
                ]);
                
                // Check if a matching user was found
                $user = $query->fetch(PDO::FETCH_ASSOC);
                if ($user) {
                    if ($email == "ad@metric.care"){
                        header('Location: ../../Administrateur/Tableau_de_Bord_Admin/Tableau_de_Bord_Admin.PHP');
                      } else 
                      if($email == "gest1@metric.care" || $email == "gest2@metric.care" || $email == "gest3@metric.care" || $email == "gest4@metric.care"){
                        header('Location: ../../Gestionnaire/Tableau_de_bord_Gestionnaire/Tableau_de_Bord_Gestionniare.PHP');
                      }
                      else {
                        header('Location: ../../Utilisateur/Tableau%20de%20bord/Tableau_de_Bord.PHP');
                      }
                    exit;
                } else {
                    // Invalid email or password, render the connection view with an error message
                    $errorMessage = 'Invalid email or password.';
                    require 'view/Connexion/Connexion.PHP';
                }
            } else {
                // Invalid email format, render the connection view with an error message
                $errorMessage = 'Invalid email format.';
                require 'view/Connexion/Connexion.PHP';
            }
        } else {
            // Render the initial connection view
            require 'view/Connexion/Connexion.PHP';
        }*/
    }
}
?>