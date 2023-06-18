<?php
 
    // connect database
    $bdd = new PDO("mysql:host=localhost;dbname=metric_care","martin","test");
 
    // check if FAQ existed
    $sql = "SELECT * FROM faqs WHERE id = ?";
    $statement = $bdd->prepare($sql);
    $statement->execute([
        $_REQUEST["id"]
    ]);
    $faq = $statement->fetch();
 
    if (!$faq)
    {
        die("FAQ not found");
    }
 
    // delete from database
    $sql = "DELETE FROM faqs WHERE id = ?";
    $statement = $bdd->prepare($sql);
    $statement->execute([
        $_POST["id"]
    ]);
 
    // redirect to previous page
    header("Location: " . $_SERVER["HTTP_REFERER"]);
 
?>