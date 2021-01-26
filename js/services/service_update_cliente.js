'use strict'


/**
 * ? Ajax method that gets through serialize the data form-update to send it to the back-end and update the row selected
 */
const actualizarCliente = () => {
  
    let datosForm = getDatosFormUpdate();

    let request = $.ajax({
        method: 'POST',
        url: './php/models/model_update_cliente.php',
        data: datosForm
    });

    request.done(response => {

        if (response == "exito") {
            //update de row 
            filterSelectedRowId();
            updateSelectedRow(txtInputsForm);

        } else {
            phpError(response);
        }
    });

    request.fail(response => {
        console.log(response);
    });

    
}
