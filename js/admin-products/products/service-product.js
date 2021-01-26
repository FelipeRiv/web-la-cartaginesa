'use strict'

const insertProduct = () => {

    let formData = new FormData();

    let nombre = $('#txtAddProducto').val();
    let id = $('#txtAddId').val();
    let categoria = $('#sltAddCategoriaProd').val();

    let descripcion = $('#txtAddDescripcion').val();

    let imgVal = $('#sltAddCategoriaProd').val();

    if (imgVal !== '') {
        let img = $('#file')[0].files[0];

        formData.append('nombre', nombre);
        formData.append('id', id);
        formData.append('categoria', categoria);
        formData.append('descripcion', descripcion);
        formData.append('file', img);


    }

    $.ajax({
        url: "./php/db/admin-products/products/model-insert-product.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        async: false,
        success: function (text) {
            console.log('succ');
        },
        error: function (text) {
            console.log('err');
            console.log(text);
        }
    }); //ajax

}

const getProducts = () => {

    let data = $('#form-eliminar-producto').serialize();

    let msj = '';

    const request = $.ajax({
        type: "POST",
        url: "./php/db/admin-products/products/model-select-products.php",
        async: false,
        data: data,
        dataType: "json",
    });

    request.done(response => {

        if (response.succ) {

            data = response;
            console.log(data);

        } else {
            console.log(response.succ);
            console.log(response.msj);
            console.log(response.data);
        }

    });

    request.fail(err => {
        console.log(err.responseText);
        console.log(`error`);
        // msj = err;
    });

    return data;

}


const formulario = document.getElementById('form-eliminar-producto');

const deleteProduct = async function () {


    const datos = new FormData(formulario);

    console.log(`datos`);
    console.log(datos);

    await fetch('./php/db/admin-products/products/model-delete-product.php', {
            method: 'POST',
            body: datos
        })
        .then(res => res.text())
        .then(data => {
            console.log('dataRes');
            console.log(data);
            

        });

}