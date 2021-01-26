<?php 

    include './ClsCustomer.php';

    $customer = new Customer();

    if (isset($_POST['txtDltCedulaContacto'])) {
    
        $customer->setId($_POST['txtDltCedulaContacto']);
        $customer->deleteCustomer();

    } else {
        echo 'error';
    }
    



?>