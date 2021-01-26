<?php 

    include './ClsProduct.php';
    include './../../ClsMessage.php';
    
    $product = new Product();
    $message = new Message();

    if (isset($_POST['sltDltProducto'])) {

        // -- Delete product
        $idProduct = $_POST['sltDltProducto'];

           // -- Get imgPath if delete producto
           $imgPath = $product->selectFilePath($idProduct); //!test

        $product->setId($idProduct);
        $products = $product->deleteProduct();

        if (!$products) {

            $msj = 'No hay data en la tabla';
            $message->setMessage(false, $msj, '');
            $message->getJsonMessage();

        }else {

            if ($product->deleteImg($imgPath[0]) ) {// !test
                
                $msj  = 'exito producto e imagen eliminados';

                $message->setMsj(true, $msj);
                $message->getJsonMsj();
            } else {
                $msj  = 'exito solo producto';
                $message->setMsj(true, $msj);
                $message->getJsonMsj();
    
            }



 
        }
    }

    


?>