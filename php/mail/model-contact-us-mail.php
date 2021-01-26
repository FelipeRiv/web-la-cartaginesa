<?php 

    include './ClsSendEmail.php';

    $mail = new SendEmail();

    $mail->sendEmailContactUs();

?>