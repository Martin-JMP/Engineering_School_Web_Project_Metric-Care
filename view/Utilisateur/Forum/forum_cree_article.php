<?php

session_start();

require_once('../Forum/database.php');

if (isset($_POST['titre']) && isset($_POST['message'])) {
    $id = $_SESSION['user'];

    if (!empty($_SESSION['nom']) && !empty($_SESSION['prenom'])) {
        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom'];
    } else {
        header('Location: ./forum.php?error=missing_data');
        exit();
    }
    $date = (new DateTime('now', new DateTimeZone('Europe/Paris')))->format('Y-m-d H:i:s');
    $titre = filter_var($_POST['titre'], FILTER_SANITIZE_STRING);;
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    $statement = $mysqlInstance->prepare("INSERT INTO forum (ID, nom, prenom, date, titre, message) VALUES (:id, :nom, :prenom, :date, :titre, :message)");
    $statement->execute([
        'id' => $id,
        'nom' => $nom,
        'prenom' => $prenom,
        'date' => $date,
        'titre' => $titre,
        'message' => $message
    ]);

    header('Location: ./forum.php');
    exit();
}

header('Location: ./forum.php?error=missing_data');