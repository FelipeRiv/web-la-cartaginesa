'use strict'

const getCategorias = () => {

    let data = '';

    $.ajax({
        type: "POST",
        url: "./php/db/admin-products/category/model-select-categories.php",
        async: false,
        dataType: "json",
        success: function (response) {
            // data = JSON.parse(response);
            data = response;
        },
        error: function (response) {
            console.log(response + ` - error en ajax lista categorias`);
        }
    });
    
    return data;

}; 

const insertCategory = () => {
        
    let datosForm = $('#form-agregar-categoria').serialize();

    console.log(datosForm);

    $.ajax({
        type: "POST",
        url: "./php/db/admin-products/category/model-insert-category.php",
        data: datosForm,
        async: false,
        success: function (text) {
            console.log(text);
            alert(text);
        },
        error: function (text) {
            console.log(text);
        }
    });//ajax
    
}

const eliminarCategoria = () => {
    let datosForm = $('#form-eliminar-categoria').serialize();

    let msj;
    let request = $.ajax({
        type: "POST",
        url: "./php/db/admin-products/category/model-delete-category.php",
        data: datosForm,
        async: false
    });

    request.done(response => {
        msj = response
        alert(response);
    });
    
    request.fail(response => {
        alert(response);
        msj = response

    });

    return msj;
};