<html>
<head>

    ....

    <style>

        body {
            font-family: Arial;
            width: 550px;
        }

        .response-ribbon {
            padding: 10px;
            background: #ccc;
            border: #bcbcbc 1px solid;
            margin-bottom: 15px;
            border-radius: 3px;
        }

        input,
        textarea {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        #Submit-btn {
            background: #1363cc;
            color: #fff;
            width: 150px;
        }




        #email-form {
            border: 1px solid #ccc;
            padding: 20px;

        }

    </style>

</head>


<body><?php
        $to="martinjoncourt1@gmail.com";
        $sujet = 'Inscription';
        $message = 'Message';
        $entete = 'From: ********@gmail.com';
        $entete.= 'Return-Path: ********@gmail.com';
        $entete.= 'MIME-Version: 1.0'.'\n';
        $entete.= 'Content-Type: text/html; charset=UTF=8\r\n';
        $entete.= 'X-Mailer: PHP/' . phpversion();
         
        //fonction e-mail
        function smtpmailer($to,$sujet,$message,$entete){
            require_once("mailer/class.phpmailer.php");
            require_once("mailer/class.smtp.php");
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->IsHTML();    
            $mail->Host='localhost';
            $mail->SMTPDebug=0;
            $mail->SMTPAuth=true;
            $mail->SMTPSecure='ssl';
            $mail->Host='smtp.gmail.com';
            $mail->Port=465;
            $mail->Username='martinjoncourt1@gmail.com';
            $mail->Password='Metric345'; //ton mdp gmail
            $mail->SetFrom('metric.care@gmail.com');
            $mail->AddReplyTo('metric.care@gmail.com');
            $mail->CharSet="utf-8";
            $mail->Subject = $sujet;
            $mail->Body = $message;
            $mail->AddAddress($to);
                 
            if(!$mail->Send()){
                echo 'E-mail non envoyé';
                echo 'Mailer error:'.$mail->Errorinfo;
            }else{
                echo 'Message envoyé';
            }
        } //fin fonction e-mail
         
        //envoi de l'e-mail
        smtpmailer($to,$sujet,$message,$entete);
        ?>
<?php


if (isset($_POST["submit_btn"])) {


    $to = $_POST["email"];

    $subject = 'Mail sent from sendmail PHP script';

    $from = "matric.care@gmail.com";

    $message = $_POST["msg"];

    $headers = "From: $from";


    if (mail($to, $subject, $message, $headers)) {

        $responseText = 'Mail sent successfully.';

    } else {

        $responseText = 'Unable to send mail. Please try again.';

    }
}

?>
    <?php 

        if(!empty($responseText)) {

    ?>


    <div class="response-ribbon">

        <?php echo $responseText; ?>

    </div>


    <?php 

        }

    ?>


    <form id="email-form" name="email-form" method="post" action="test.php">

        <table width="100%" border="0" align="center" cellpadding="4" cellspacing="1">

            <tr>

                <td>

                    <div class="label">Nom:</div>

                    <div class="field">

                        <input name="name" type="text" id="name" required />

                    </div>

                </td>

            </tr>

            <tr>

                <td>

                    <div class="label">E-mail:</div>

                    <div class="field">

                        <input name="email" type="text" id="email" required />

                    </div>

                </td>

            </tr>

            <tr>

                <td>

                    <div class="label">Message:</div>

                    <div class="field">

                        <textarea name="msg" cols="45" rows="5" id="msg" required></textarea>

                    </div>

                </td>

            </tr>

            <tr>

                <td>

                    <div class="field">

                        <input name="submit_btn" type="submit" id="submit-btn" value="Envoyer" />

                    </div>

                </td>

            </tr>

        </table>

    </form>

</body>

</html>