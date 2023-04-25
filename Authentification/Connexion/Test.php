<!DOCTYPE html>


<?php 

if (isset($_POST['button'])){
  

$email = $_POST['email'];
$password = $_POST['password'];


$bdd = new PDO("mysql:host=localhost;dbname=metric_care","valentyna","12345");

    
  if (!empty($email && $password)){
    try{
      $sth = $bdd->query("SELECT personnes.PersonneId FROM logins, personnes  WHERE logins.PersonneId = personnes.PersonneId AND personnes.AdressMail = '$email' AND logins.MotDePas = '$password'");
      $post = $sth->fetch();

      if($post){
        
        session_start();
        $_SESSION['email'] = $email;
        header('Location: Connexion.css');
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

?>


<head>
  <title>Présentation</title>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="CommunStyle.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="StyleFormulaire.css">
</head>

<html>
  <body>


   <div class="container">
        <h1>Login</h1>
        <form method="post">
            <div class="champs">
                <label for="Email">Email </label>
                <input type="text" name="email">
            </div>
            <div class="champs">
                <label for="Password">Password  </label>
                <input type="Password" name="password">
            </div>

            <div class="champs">
                <button id="connect" type="submit" name="button">Connect</button>
            </div>

        </form>
   </div>


  </body>
</html>