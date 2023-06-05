<?php

session_start();

require_once('../Forum/database.php');

$numero_article=$_GET['numero_article'];

if (isset($_POST['message'])) {
    //$id = $_SESSION['user'];
/*
    if (!empty($_SESSION['nom']) && !empty($_SESSION['prenom'])) {
        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom'];
    } else {
        header('Location: ./sujet.php?error=missing_data');
        exit();
    } */
    
    if (!empty($_SESSION['email']) ) {
        $email = $_SESSION['email'];
        $sql = "SELECT PersonneId,Nom,Prenom FROM personnes WHERE AdressMail = :email";
        $stmt = $mysqlInstance->prepare($sql);
        $stmt->bindValue(':PersonneId', $id);
        $stmt->bindValue(':Prenom', $prenom);
        $stmt->bindValue(':Nom', $nom);
        $stmt->execute();
    } else {
        header('Location: ./sujet.php?error=missing_data');
        exit();
    }


    $date = (new DateTime('now', new DateTimeZone('Europe/Paris')))->format('Y-m-d H:i:s');
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    $statement = $mysqlInstance->prepare("INSERT INTO forum_message (PersonneId, Nom, Prenom, email, date, message,numero_article) VALUES (:id, :nom,:prenom,:email, :date, :message,:numero_article)");
    $statement->execute([
        'PersonneId' => $id,
        'nom' => $nom,
        'prenom' => $prenom,
        'email' => $email,
        'date' => $date,
        'message' => $message,
        'numero_article' => $numero_article
    ]);

    header("Location: ./sujet.php?numero_article=$numero_article");
    exit();
}

header('Location: ./sujet.php?error=missing_data');