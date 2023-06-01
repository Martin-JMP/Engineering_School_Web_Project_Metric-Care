<?php
// ConnectionController.php

class ConnectionController
{
    public function connect()
    {
        // Check if the form was submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get the email and password inputs
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Validate the inputs
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // Connect to the database (assuming PDO)
                $host = 'localhost';
                $dbname = 'metric_care';
                $username = 'vapr@metric.care';
                $password = 'vapr333!';

                try {
                    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e) {
                    die('Database connection error: ' . $e->getMessage());
                }

                // Query the users table
                $query = $db->prepare("SELECT personnes.PersonneId FROM logins, personnes  WHERE logins.PersonneId = personnes.PersonneId AND personnes.AdressMail = :email AND logins.MotDePas = :password");
                $query->execute([
                    'email' => $email,
                    'password' => $password,
                ]);
                
                // Check if a matching user was found
                $user = $query->fetch(PDO::FETCH_ASSOC);
                if ($user) {
                    // Connection successful, redirect to a different page
                    header('Location: http://localhost/Metric_Care/view/Utilisateur/Tableau%20de%20bord/Tableau_de_Bord.PHP');
                    exit;
                } else {
                    // Invalid email or password, render the connection view with an error message
                    $errorMessage = 'Invalid email or password.';
                    require 'view/Connexion/Connexion.PHP';
                }
            } else {
                // Invalid email format, render the connection view with an error message
                $errorMessage = 'Invalid email format.';
                require 'view/Connexion/Connexion.PHP';
            }
        } else {
            // Render the initial connection view
            require 'view/Connexion/Connexion.PHP';
        }
    }
}
?>