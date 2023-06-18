<?php

require('../Forum/database.php');

if(isset($_POST['validate'])){

    if(!empty($_POST['titre']) AND !empty($_POST['contenu'])){
        
        $question_title = htmlspecialchars($_POST['title']);
        $question_content = nl2br(htmlspecialchars($_POST['content']));
        $question_date = date('d/m/Y');
        $question_id_author = $_SESSION['identification'];
        $question_pseudo_nom = $_SESSION['nom'];
        $question_pseudo_prenom = $_SESSION['prenom'];
        
        $insertQuestionOnWebsite = $bdd-> prepare('INSERT INTO question(titre, contenu, PersonneId, Nom, Prenom, date_publication) VALUES(?, ?, ?, ?, ?, ?)');
        $insertQuestionOnWebsite->execute(array($question_title, $question_content, 4, jacques,  paul, $question_date));

        $successMsg = "Votre Question a bien été publiée";

    } else {
        $php_errormsg = "Veuillez compléter tous les champs";
    }
}
