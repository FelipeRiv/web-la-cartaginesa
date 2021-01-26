<?php 
    include './ClsContact.php';
    include './ClsValidationForm.php';
    include __DIR__.'/../../mail/ClsSendEmail.php'; // do not include mailerConfig class
    include_once __DIR__.'/../ClsMessage.php';
   
    $contact = new Contact();
    $validationF = new ValidationForm();
    $sendEmail = new SendEmail();
    $message = new Message();

    // $id = $validationF->idValidation();
    $name = $validationF->nameValidation();
    $lastName = $validationF->lastNameValidation();
    $email = $validationF->emailValidation();
    $phone = $validationF->phoneValidation();

  
    $comments = $_POST['txtComentariosContacto'];
   
    if (!$name || !$lastName || !$email || !$phone) {
        $error = $validationF->errorMessage();

        $message->setMessage(false, $error, $name);
        $message->getJsonMessage();

    }else{

        // $contact->setId($id);
        $contact->setName($name);
        $contact->setLastName($lastName);
        $contact->setEmail($email);
        $contact->setPhone($phone);
        $contact->setComments($comments);

        // * Email to Owner
        // ? 3 mails here
        $mailToOwner = $sendEmail->sendEmailContactUs2($name, $lastName, $contact->getEmail(), $phone, $comments, $sendEmail->getMailTienda());

        // TODO 1 here
        $mailToCustomer = $sendEmail->sendEmailContactUs2($name, $lastName, $contact->getEmail(), $phone, $comments, $contact->getEmail());

        // if ($mailToOwner) {
        //     $message->setMessage(true, 'Correo entregado con éxito');
        //     $message->getJsonMessage();
        // }

        if ($mailToOwner && $mailToCustomer) {

            $message->setMessage(true, 'Correo entregado con éxito');
            // ? insert contact
            $result = $contact->insertContact();

            // response message
            $message->getJsonMessage();
        }
        
    }

?>