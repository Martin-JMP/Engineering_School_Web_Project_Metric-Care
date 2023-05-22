<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="Inscription.css"> 
    <title>Metric Care</title>
    <link rel="icon" href="../../Origine/Images/Logo.png">
  </head>
  <body>
    /*<?php
        function alert($msg) {
            echo "<script type='text/javascript'>alert('$msg');</script>";
        }
        if (isset($_POST['button'])){

            $email = $_POST['email'];
            $password = $_POST['password'];
            $password1 = $_POST['password1'];
            $prenom = $_POST['prenom'];
            $nom = $_POST['nom'];
            $identification = $_POST['identification'];
            $cgu = $_POST['cgu'];

            $bdd = new PDO("mysql:host=localhost;dbname=metric_care","valentyna","12345");
            $sth = $bdd->query("SELECT * FROM authentificationprimaire  WHERE authentificationprimaire.AuthentificationId = '$identification' AND authentificationprimaire.PersonneId IS NULL");
            $sthf = $sth->fetch();
            if ((!empty($email && $password && $prenom && $nom && $identification && $cgu)) && $password == $password1 && !empty($sthf)){
                try{
                    $ins1 = $bdd->query("INSERT INTO personnes(Prenom, Nom, Adressmail) VALUES ('$prenom','$nom','$email')");
                    $ins2 = $bdd->query("INSERT INTO logins(PersonneId, MotDePas) VALUES((SELECT personnes.PersonneId FROM personnes where personnes.AdressMail = '$email'),'$password')");
                    $upd = $bdd->query("UPDATE authentificationprimaire SET authentificationprimaire.PersonneId = (SELECT personnes.PersonneId FROM personnes where personnes.AdressMail = '$email') where authentificationprimaire.AuthentificationId = $identification"); 
                    header('Location: http://localhost/Metric_Care/Authentification/Connexion/Connexion.PHP');
                    exit();
                }catch(PDOException $e){
                    $erreur = $e->getMessage();
                }

            }
            else{
                alert("Le problème de la création. Veuillez remplir les champs obligatoires");
            }
        }
    ?>*/
    <header>
        <div>
            <img id="Logo" src="../../Origine/Images/Logo.png" alt="Logo Metric Metro", width="100", height="55"> 
            <div class="Langue">
                <a>🌐Français</a>
            </div>
        </div>  
    </header>
    <main method="post" form="inscription-form">
        <div class="Inscription">
            <a>Inscription</a>
        </div>
        <form id="inscription-form"  method="post">
            <div class="Prenom_Nom">
                <input type="text" id="prenom" name="prenom" placeholder="Prenom">
                <input type="text" id="nom" name="nom" placeholder="Nom">
            </div>
            <div class="container">
                <div class="email">
                    <input type="email" placeholder="Email" name="email">
                </div>
                <div class="NUM_IDENT">
                    <input type="number" name="identification" placeholder="Numero d'Identification" pattern="[0-9]{6}" title="Le Numéro d'Identification doit comporter six chiffres">
                </div> 
                <div class="mdp">
                    <input type="password" name="password" placeholder="Mot de passe">
                </div> 
                <div class="mdp_Confirme">
                    <input type="password" name="password1" placeholder="Confirmer le mot de passe">
                </div>    
            </div>
            <br></br>
            <div class="CGU">
                <input type="checkbox" name="cgu" id="cgu">
                <label for="cgu">J'accepte les <span><a href="#">conditions générales d'utilisation</a></span></label>
            </div>
        
            </div>
            <div class="rectangle-creer">
            <button type="submit" name="button" id="submit_button">Créer mon compte</button>
            </div>
        </form>
    </main>
    <script src="Inscription.js"></script>
  </body>
</html>