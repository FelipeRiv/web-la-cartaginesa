<?php 

    include_once __DIR__.'/ClsMailerConfig.php';

    $mailerConfig = new MailerConfig;

    if ( isset($_POST['mail']) && isset($_POST['password']) ) {
       

        $mail = $_POST['mail'];
        $password = $_POST['password'];

        $encrypPassword = $mailerConfig->EncrypPassword($password);


            echo 'test: ' . $mail. $password . ' : ____ : ' .$encrypPassword;
            
            if (password_verify($password, $encrypPassword)) {
                # code...
                echo "<br/> :  son iguales";
            }
    }
        
?>