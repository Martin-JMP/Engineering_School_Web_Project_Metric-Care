<?php
    ini_set('display_errors', 1);
    include("controllers/Connexion.php");
    include("view/Authentification/Connexion/Connexion.PHP")
    if(isset($_GET['cible']) && !empty($_GET['cible'])) {
        // Si la variable cible est passé en GET
        $url = $_GET['cible']; //user, sensor, etc.
        
    } else {
        // Si aucun contrôleur défini en GET, on bascule sur utilisateurs
        $url = 'Connexion';
    }
    
    // On appelle le contrôleur
    include('controllers/' . $url . '.php');
    ?>
?>