'use strict'

/* Variables DOM*/
let formActualizarContacto = $('#form-actualizar-contacto');
let formEliminarContacto = $('#form-eliminar-contacto');

const txtInputsForm = $('#txtCedulaContacto, #txtNombreContacto, #txtApellidoContacto, #txtCorreoContacto, #txtNumeroContacto');
const txtInputsFormDelete = $('#txtDltCedulaContacto, #txtDltNombreContacto, #txtDltApellidoContacto');

let datosForm = '';
let datosFormDelete = '';

let selectedAttrRowId = '';
let selectedRowId = '';

// -- Funciones

/** to delete and update - 
 * ?filtra con un regex el attr de los btn-update-id y asi obtiene index del row de la tabla a actualizar
 */
const filterSelectedRowId = () => {
    let regexNumero = /(\d+)/g; //1 o mas numeros

    //the number is in selectedRowId[0]
    selectedRowId = selectedAttrRowId.match(regexNumero);
    
}


/** to delete and update - 
 * ?Reset the style of the inputs in update form
 * @param {*inputs} txtInputsForm Every input in the contacto form
 */
const resetInputStyleModal = (txtInputsForm) => {

    txtInputsForm.siblings('.icon-valid-input').addClass('d-none');
    txtInputsForm.siblings('.icon-error-input').addClass('d-none');

    txtInputsForm.removeClass('input-border-valid'); //green border
    txtInputsForm.removeClass('input-border-error'); //green border

    msjExito.addClass('d-none');
    msjError.addClass('d-none');

}



// Obtiene los datos del form
const getDatosFormUpdate = () => datosForm;
// Obtiene los datos del form
const getDatosFormDelete = () => datosFormDelete;


/**
 * 
 * @param {number} index id of every row of the list clientes
 * @param  {...string} inputsValues ...rest param - array of values from every input of the form
 */
const crearIdBotones = (index, ...inputsValues) => {

    $('#btn-update-' + index).click(function () {
    
        //gets de attr with the id of this button
        selectedAttrRowId = $(this).attr('id');

        fillModalForm(txtInputsForm, ...inputsValues);

    });

}

/**
 * 
 * @param {number} index id of every row of the list clientes
 * @param  {...string} inputsValues ...rest param - array of values from every input of the form
 */
const crearIdBotonesDelete = (index, ...inputsValues) => {

    $('#btn-delete-' + index).click(function () {

        //gets de attr with the id of this button
        selectedAttrRowId = $(this).attr('id');
  
        fillModalFormDelete(txtInputsFormDelete, ...inputsValues);

    });

}

/**
 * fill the modal form with the ...inputsValues from the selected-clicked row
 * @param {*} txtInputsForm jq array selector filled with form inpues
 * @param  {...any} inputsValues ...rest param, item values from selected row
 */
const fillModalForm = (txtInputsForm, ...inputsValues) => {


    // go through every input in the const txtInputsFrom
    for (let i = 0; i < txtInputsForm.length; i++) {
     
        //gets every input according to the index
        const inputForm = txtInputsForm.eq(i);
        //assigns the value to every input that comes from the ...rest params
        inputForm.val(inputsValues[i]);
    }

    //gets data input from modal form
    datosForm = $('#form-actualizar-contacto').serialize();

}


/**
 * fill the modal form with the ...inputsValues from the selected-clicked row
 * @param {*} txtInputsForm jq array selector filled with form inpues
 * @param  {...any} inputsValues ...rest param, item values from selected row
 */
const fillModalFormDelete = (txtInputsFormDelete, ...inputsValues) => {

    // go through every input in the const txtInputsFrom
    for (let i = 0; i < txtInputsFormDelete.length; i++) {

        //gets every input according to the index
        const inputForm = txtInputsFormDelete.eq(i);
        //assigns the value to every input that comes from the ...rest params
      
        inputForm.val(inputsValues[i]);
    }

    //gets data input from modal form
    datosFormDelete = $('#form-eliminar-contacto').serialize();

}

/** just to update button // !Deprecated
 * ? Update the table only at the row that is has been updated
 * @param {*} formInputs it has all the inputs from the update form
 */
const updateSelectedRow = (formInputs) => {

    let table = document.querySelector('#tablaClientes tbody');
    let rowId = selectedRowId[0];

    //number of cells minus 1 cell from options btns
    let numCells = table.rows[rowId].cells.length - 1;

    for (let i = 0; i < numCells; i++) {

        const formValue = formInputs[i].value;
        table.rows[rowId].cells[i].innerHTML = formValue;

    }


} //updateSelectedRows


// -- Fin Funciones


// -- Eventos

//Executes when the modal hiddes
$('#deleteContactModal').on('hidden.bs.modal', function () {
    resetInputStyleModal(txtInputsFormDelete);
    
});

//Executes when the modal hiddes
$('#contactoModal').on('hidden.bs.modal', function () {
    resetInputStyleModal(txtInputsForm);
    
});


formActualizarContacto.submit(function (event) {
    event.preventDefault();

    //Updates the form fields with new values if any
    datosForm = $('#form-actualizar-contacto').serialize();
    actualizarCliente();
});

formEliminarContacto.submit(event => {
  
    event.preventDefault();
    eliminarCliente();
    listarClientesTable();
});


// -- Fin Eventos

/* Fin Reseteo de campos form clientes actualizar */