<?php 
        include __DIR__ . './ClsMailerConfig.php';
        include __DIR__ . './ClsTemplateEmail.php';
        include_once __DIR__.'/./../db/ClsMessage.php';

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;

        require __DIR__ . '/../lib/phpmailer/src/Exception.php';
        require __DIR__ . '/../lib/phpmailer/src/PHPMailer.php';
        require __DIR__ . '/../lib/phpmailer/src/SMTP.php';

    class SendEmail extends MailerConfig{

        
        public function sendEmailContactUs2($name, $lastName, $email, $phone, $comments, $toEmail, $cart = false){
            
            $template = new TemplateEmail();
            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                // * Server settings
                $mail->SMTPDebug = false;                                  // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                // $mail->Host = 'smtp.office365.com';                   // Specify main and backup SMTP servers
                $mail->Host = 'smtp.gmail.com';                   // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = $this->getMailTienda();  // SMTP username
                $mail->Password = $this->getPassword();                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;              
                $mail->setLanguage('es', __DIR__ . './../lib/phpmailer/language/phpmailer.lang-es.php');          
                
                // * Recipients
                // * from
                $mail->setFrom($this->getMailTienda(), 'Institucional-Mailer');

                // * to owner
                $mail->addAddress($toEmail, 'Cotización Cliente');    
    
                // * Attachments
                $mail->addAttachment(__DIR__.'./../../image/banderaCR.png');// TCP port to connect to

                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Cotización - Institucional La Cartaginesa';
                
                // * template params 
                $mail->Body    = $template->emailTemplateOwnerForm($name, $lastName, $email, $phone, $comments);

                //spanish
                $mail->CharSet = 'UTF-8';

                $mail->send();

                $mail->ClearReplyTos();

                return true;

            } catch (Exception $e) {
                // echo 'El correo no pudo ser enviado. Mailer Error:  ', $mail->ErrorInfo;

                return false;

                // TODO mandar el errorInfo a una tabla con fecha etc
            }

        }
        

        public function sendEmailContactUs($name, $lastName, $email, $phone, $comments, $cart = false){
            
            // * test code 
                // $name = 'Test Name';
                // $email = 'test@g.com';
                // $comment = 'test comment';
            // * test code end

            $template = new TemplateEmail();

            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                // * Server settings
                $mail->SMTPDebug = false;                                  // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                // $mail->Host = 'smtp.office365.com';                   // Specify main and backup SMTP servers
                $mail->Host = 'smtp.gmail.com';                   // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = $this->getMailTienda();  // SMTP username
                $mail->Password = $this->getPassword();                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;              
                $mail->setLanguage('es', __DIR__ . './../lib/phpmailer/language/phpmailer.lang-es.php');          
                
                // * Recipients
                // * from
                $mail->setFrom($this->getMailTienda(), 'Institucional-Mailer');

                // * to owner
                $mail->addAddress($this->getMailTo(), 'Cotización Cliente');    

                 // Add a recipient
                // * customer
              
               
                // * email where the reply goes to if needed to be aswered
                // $mail->addReplyTo('emailAuxAPrincipal.com', 'Pregunta Cotización');
                
                //$mail->addCC('cc@example.com');
                //$mail->addBCC('bcc@example.com');
    
                // * Attachments

                $mail->addAttachment(__DIR__.'./../../image/banderaCR.png');// TCP port to connect to
                // $mail->addAttachment(__DIR__.'marvel.png');// TCP port to connect to
    
                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Cotización - Institucional La Cartaginesa';
                
                // TODO probar luego con archivo externo
                // $mail->msgHTML(file_get_contents('contents.php'), './contents.php'); // este o mail body
    
                // * alternativa
                // $mail->Body    = 'Nombre: ' . $name . '<br/>Correo: ' . $email . '<br/>' . $comments. '<br/>' . '<img src="banderaCR.png" width="100"> ';
                // $mail->Body    = 'Nombre: ' . $name . '<br/>Correo: ' . $email . '<br/>' . $comment. '<br/>';
                // * template params 
                $mail->Body    = $template->emailTemplateOwnerForm($name, $lastName, $email, $phone, $comments);

                //* template quemado
                // $mail->Body    = $template->emailContactUs(111, 'Fel', 'R', 'f@g', 8888, 'producto jabon? 100uni');
               
               
                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
                //spanish
                $mail->CharSet = 'UTF-8';
    
                $mail->send();

                $mail->ClearReplyTos();

                return true;


            } catch (Exception $e) {
                // echo 'El correo no pudo ser enviado. Mailer Error:  ', $mail->ErrorInfo;
                $message = new Message();

                // $message->setMessage(false, 'Correo problema: ' . $e);
                // $message->getJsonMessage();
                return false;

                // TODO mandar el errorInfo a una tabla con fecha etc
            }

        }

    }

?>

