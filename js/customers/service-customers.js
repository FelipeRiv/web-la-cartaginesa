'use strict'

const getListaClientes = () => {

    let listaClientes = [];

    let request = $.ajax({
        type: "POST",
        url: "./php/db/customers/model-select-customers.php",
        async: false,
        dataType: "json",
    });

    
    request.done( (response) =>{
        // console.log('done');
        listaClientes = response;
    });
    request.fail( (response) =>{
        console.log('request.fail');
        console.log(response);
    });
    
    return listaClientes;
}

/* Funciones */
/**
 * ? Ajax method that gets through serialize the data form-update to send it to the back-end and update the row selected
 */
const actualizarCliente = () => {
  
    let datosForm = getDatosFormUpdate();

    let request = $.ajax({
        method: 'POST',
        url: './php/db/customers/model-update-customers.php',
        data: datosForm
    });

    request.done(response => {

        if (response == "exito") {
            //update de row 
            // filterSelectedRowId();
            // updateSelectedRow(txtInputsForm);// !deprecated
            listarClientesTable();

        } else {
            phpError(response);
        }
    });

    request.fail(response => {
        console.log(response);
    });

    
}


const eliminarCliente = () => {

    let data = getDatosFormDelete();

    let msj = "";

    let request = $.ajax({
        type: "POST",
        url: "./php/db/customers/model-delete-customer.php",
        data: data,
        async: false

    });

    request.done((response) => {
        msj = response;
        if (msj == 'exito') {
            correcto();
            listarClientesTable();
        } else {
            phpError(msj);
        }
    });

    request.fail((response) => {
        console.log(response);
    });

    return msj;

}
