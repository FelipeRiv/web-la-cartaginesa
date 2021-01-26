<?php 

    include './ClsCustomer.php';

    $customer = new Customer();
    $customers = $customer->selectCustomers();
    
    if (!$customers) {
        echo json_encode('no hay datos en la tabla'); // no enviar string sino cae en fail
    } else {
        
        foreach ($customers as $value) {
            $arreglo['data'][] = $value;
        }
    
        echo json_encode($arreglo);
    }
    

    
    

?>