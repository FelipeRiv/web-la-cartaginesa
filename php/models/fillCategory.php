<?php

    /* en lugar de add categoria no implementado aun testear */

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    /* conexion a DB */
    include "conexion.php";

    for ($i=0; $i < 100; $i++) { 
        # code...
        $value = 'ct'. $i;

        $sql = "INSERT INTO categoria VALUES(null, '$value', NULL)";
        $result = mysqli_query($conexion, $sql);
    
        if ($result) {
        
            echo "Categoría aregada con éxito";
        }else{
            echo "Error BD insert";
            
        }
    }



?>