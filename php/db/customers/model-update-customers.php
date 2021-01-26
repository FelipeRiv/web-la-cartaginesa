<?php 

    include './ClsCustomer.php';
    include './../contact-form/ClsValidationForm.php';

    $customer = new Customer();
    $validationF = new ValidationForm();

    $id = $validationF->idValidationCustomer();
    $name = $validationF->nameValidation();
    $lastName = $validationF->lastNameValidation();
    $email = $validationF->emailValidation();
    $phone = $validationF->phoneValidation();


    if (!$id || !$name || !$lastName || !$email || !$phone) {
        echo $validationF->errorMessage();
    }else{

        $customer->setId($id);
        $customer->setName($name);
        $customer->setLastName($lastName);
        $customer->setEmail($email);
        $customer->setPhone($phone);
    
        $customer->updateCustomer();
    }


?>