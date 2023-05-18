<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="Mot_de_passe_oublie.css"> 
    <title>Metric Care</title>
    <link rel="icon" href="Origine/Images/Logo.png">
  </head>
  <body>

  <?php
if (isset($_POST['oublie'])){
$email = htmlentities(strtolower(trim($email))); // On récupère le mail afin d envoyer le mail pour la récupèration du mot de passe 
    
if(empty($email)){
     $valid = false;
$er_mail = "Il faut mettre un mail";
}
 
 if($valid){
 $verification_mail = $bdd->query("SELECT personnes.PersonneId FROM logins, personnes  WHERE logins.PersonneId = personnes.PersonneId AND personnes.AdressMail = '$email'");
 array($email);
 $verification_mail = $verification_mail->fetch();
 
if(isset($verification_mail['email'])){
// On génère un mot de passe à l'aide de la fonction RAND de PHP
$new_pass = rand();
 
// Le mieux serait de générer un nombre aléatoire entre 7 et 10 caractères (Lettres et chiffres)
 $new_pass_crypt = crypt($new_pass, "$6$rounds=5000$macleapersonnaliseretagardersecret$");
// $new_pass_crypt = crypt($new_pass, "VOTRE CLÉ UNIQUE DE CRYPTAGE DU MOT DE PASSE");
 
 $objet = 'Nouveau mot de passe';
 $to = $verification_mail['email'];
 
//===== Création du header du mail.
 $header = "From: NOM_DE_LA_PERSONNE <no-reply@test.com> \n";
 $header .= "Reply-To: ".$to."\n";
 $header .= "MIME-version: 1.0\n";
 $header .= "Content-type: text/html; charset=utf-8\n";
 $header .= "Content-Transfer-Encoding: 8bit";
 
//===== Contenu de votre message
 $contenu = "<html>".
 "<body>".
 "<p style='text-align: center; font-size: 18px'><b>Bonjour Mr, Mme".$verification_mail['nom']."</b>,</p><br/>".
 "<p style='text-align: justify'><i><b>Nouveau mot de passe : </b></i>".$new_pass."</p><br/>".
 "</body>".
 "</html>";
//===== Envoi du mail
 mail($to, $objet, $contenu, $header);
 $bdd->insert("UPDATE logins SET MotDePas = ?, email = ?",
 array($new_pass_crypt, $verification_mail['mail']));
}
}
 header('Location: Mot_de_passe_oublie.php');
 exit;
 }}
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
        <div class="MDP">
            <a>Mot de passe oublié</a>
        </div>
        <div class="MDP_nouveau">
            <a>Nous vous enverrons un e-mail pour créer un nouveau mot de passe :</a>
        </div>
        <div class="container">
            <input type="email" placeholder="Email" name="mail" value="<?php if(isset($mail)){ echo $mail; }?>" required><br></br>
        </div>
        <div class="rectangle-envoye">

        <button type="submit" name="oublie">Envoyer</button>

        </div>
    </main>
  </body>
</html>