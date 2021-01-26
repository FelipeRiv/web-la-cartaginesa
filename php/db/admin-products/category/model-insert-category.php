<?php 
    header('Access-Control-Allow-Origin: *');
    include './ClsCategory.php';

    $category = new Category();

    if (isset($_POST['txtAddCategoria'])) {

        $categoryName = $_POST['txtAddCategoria'];
        
        $category->setName($categoryName);

        $category->insertCategory();
    }

?>