<?php

require_once("../Forum/database.php");

$sql = "SELECT * FROM forum ";

$stmt = $mysqlInstance->query($sql);

if ($stmt === false) {
    die("Erreur");
}

