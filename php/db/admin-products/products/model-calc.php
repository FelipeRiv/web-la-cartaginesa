<?php 
    header('Access-Control-Allow-Origin: *');
    
    include './ClsProduct.php';
    include './../../ClsMessage.php';
    // ## Rename to product-pagination
    $product = new Product();
    $message = new Message();

    // all or 1,2,3 ...
    if (isset($_POST['sltGetCategoria']) && isset($_POST['pgProducts'])) {

        $category = $_POST['sltGetCategoria'];
        $currentPage = $_POST['pgProducts'];

        
        $product->paginationConstruct($currentPage);
        $product->setCategory($category);

        // $products = $product->selectProductsLimit();
     
        $product->calcPages();
        
        $result = $product->selectProductsLimit();
        // $result = $product->selectProducts();
        if ($result) {
            # code...
            foreach ($result as $value) {
                $arreglo[] = $value;
            }   

            // $countArreglo = count($arreglo); 
            $countArreglo = $product->getRowCount(); 
            $message->setMessage(true, 'exito', $arreglo);
            $message->setMessageExtraField('count', $countArreglo);
            $message->setMessageExtraField('totalPages', $product->getTotalPages());
            // $message->setMessageExtraField('indexPage', $product->getIndex());
            $message->setMessageExtraField('indexPage', $currentPage -1);
    
            $message->getJsonMessage();
        }else{
            $message->setMessage(false, 'no data');
            $message->getJsonMessage();
        }


       
    }


?>