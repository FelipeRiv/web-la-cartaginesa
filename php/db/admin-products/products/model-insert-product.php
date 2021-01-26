<?php 
    header('Access-Control-Allow-Origin: *');
    include './ClsProduct.php';

    $product = new Product();

    $product->setFileName();

    if (!isset($_POST['nombre']) || !isset($_POST['id']) || !isset($_POST['categoria']) || !isset($_POST['descripcion']) || $product->testFileName() ) {

 
        echo $_POST['categoria'];

        
        $product->setName($_POST['nombre']);
        $product->setId($_POST['id']);
        $product->setCategory($_POST['categoria']);
        $product->setDescription($_POST['descripcion']);        
        
        $product->imgValidation();
    }


?>