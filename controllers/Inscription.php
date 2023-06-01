<?php
class InscriptionController
{
    public function inscripte()
    {   
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
    }
}