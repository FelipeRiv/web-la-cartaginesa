<?php 
    header('Access-Control-Allow-Origin: *');
    include './ClsCategory.php';

    $category = new Category();

    if (isset($_POST['sltDltCategoria'])) {

        $categoryId = $_POST['sltDltCategoria'];
        
        $category->setId($categoryId);

        $category->deleteCategory();
    }

?>