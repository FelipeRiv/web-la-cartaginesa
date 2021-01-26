<?php 
    header('Access-Control-Allow-Origin: *');
    include './ClsCategory.php';

    $category = new category();
    $categories = $category->selectCategories();

    if (!$categories) {
        echo json_encode('no hay datos en la tabla'); // no enviar string sino cae en fail
    } else {
        
        foreach ($categories as $value) {
            $arreglo['data'][] = $value;
        }
        
        echo json_encode($arreglo);
    }
    

    
    

?>