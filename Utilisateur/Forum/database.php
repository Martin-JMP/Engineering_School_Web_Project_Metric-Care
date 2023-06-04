<?php
$host = "localhost";
$dbname = "metric_care";
$username = "root";
$password = "";

/**
 * @var PDO $mysqlInstance
 */

$mysqlInstance = null;
try {
    $mysqlInstance = new PDO("mysql:dbname=$dbname;host=$host", $username, $password);
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
    exit();
}


