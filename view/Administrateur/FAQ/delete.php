<?php
 
    // connect database
    $conn = new PDO("mysql:port=3307;host=localhost;dbname=test", "root", "");
 
    // check if FAQ existed
    $sql = "SELECT * FROM faqs WHERE id = ?";
    $statement = $conn->prepare($sql);
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
    $statement = $conn->prepare($sql);
    $statement->execute([
        $_POST["id"]
    ]);
 
    // redirect to previous page
    header("Location: " . $_SERVER["HTTP_REFERER"]);
 
?>