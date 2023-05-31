<html>
<head>


</head>


<body>
<?php

$to = "martinjoncourt1@gmail.com";
$subject= 'Testing';
$message = "Hi , you just received this email";
$header = "From: metric.care@gmail.com" . "\r\n" .
    "MIME-Version: 1.0" . "\r\n" .
    "Content-type: text/html; charset=utf8";

    // Configuration des paramètres SMTP
ini_set("SMTP", "smtp.gmail.com");
ini_set("smtp_port", "465");
ini_set("sendmail_from", "metric.care@gmail.com");

if(mail($to, $subject, $message, $header)){
    echo 'mail sent';
} else{
    echo 'nope';
}
?>
</body>

</html>