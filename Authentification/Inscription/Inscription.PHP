<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="Inscription.css"> 
    <title>Metric Care</title>
    <link rel="icon" href="Origine/Images/Logo.png">
  </head>
  <body>
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
        <div class="CGU">
            <div> <a>J'accepte les</a> </div>
            <div class = "CGU_CLICK">
                <a>conditions générales d'utilisation</a>
            </div>
        </div>
        <div class="rectangle-creer">
            <a>Créer mon compte</a>
        </div>
    </main>
  </body>
</html>