<?php 
    header('Access-Control-Allow-Origin: *');
    
    include './ClsProduct.php';
    include './../../ClsMessage.php';
    
    $product = new Product();
    $message = new Message();

    // * request can be sent from admin-products or products page service
    if (isset($_POST['sltDltCategoriaProducto']) || isset($_POST['sltGetCategoria'])) {

    
        // * Depending on the page that sent the request it will check the name attr of the select
        if (isset($_POST['sltDltCategoriaProducto'])) {
        
            $category = $_POST['sltDltCategoriaProducto'];

        }elseif (isset($_POST['sltGetCategoria'])) {

            $category = $_POST['sltGetCategoria'];
            
        }

        $product->setCategory($category);

        if ($product->getCategory() === 'all') {
         
            $products = $product->selectAllProducts();
        }else{
            $products = $product->selectProducts();
        }

        if (!$products) {
   
            $msj = 'No hay data en la tabla';
            $message->setMessage(false, $msj, '');
            $message->getJsonMessage();

        }else {
            foreach ($products as $value) {
                $arreglo[] = $value;
            }    

            $msj  = 'exito';
            $data = $arreglo;
            $message->setMessage(true, $msj, $data);
            $message->setMessageExtraField('count', $product->getRowCount());
            $message->getJsonMessage();
        }
    }

    


?>