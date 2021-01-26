'use strict'
/* Funciones */
const listarClientesTable = () => {
    resetTableRows('tablaClientes');

    let listaClientes = getListaClientes();
    let tbody = document.querySelector('#tablaClientes tbody');
    // tbody.innerHTML = '';

    for (let i = 0; i < listaClientes.data.length; i++) {

        const element = listaClientes.data[i];

        

        //inset new tr
        let row = tbody.insertRow();

        //Creacion de botones dinamicos
        let btnEditar = `   <button type="button" class="btn btn-primary btn-update-cliente" id="btn-update-${i}" data-toggle="modal" data-target="#contactoModal" data-whatever="@getbootstrap">
                                <span class="icon-pencil2"></span>
                            </button>`;

        let btnEliminar = ` <button type="button" class="btn btn-danger" id="btn-delete-${i}" data-toggle="modal" data-target="#deleteContactModal">
                                <span class="icon-bin"></span>
                            </button>`;

        // insetCell = td in existence tr
        let cellCedula = row.insertCell();
        let cellNombre = row.insertCell();
        let cellApellidos = row.insertCell();
        let cellCorreo = row.insertCell();
        let cellTelefono = row.insertCell();
        let cellOptions = row.insertCell();

        //insert content in the html element
        cellCedula.innerHTML = element.idContacto;
        cellNombre.innerHTML = element.nombre;
        cellApellidos.innerHTML = element.apellidos;
        cellCorreo.innerHTML = element.correo;
        cellTelefono.innerHTML = element.telefono;
        cellOptions.innerHTML = btnEditar;
        cellOptions.innerHTML += btnEliminar;


        //index, ...rest param
        crearIdBotones(i, element.idContacto, element.nombre, element.apellidos, element.correo, element.telefono);

        crearIdBotonesDelete(i, element.idContacto, element.nombre, element.apellidos);

 

    } //for


} //listarClientesTable FN


/**
 * remove all the tr -> table rows if there is any in the table 
 * @param {string} idTableName specific id from table whose tbody row's children will be removed. Ex: resetTableRows('client_table');
 */
const resetTableRows = (idTableName) => {
    //remove all the tr if any to list a new update ones
    let tableRows = $(`#${idTableName} tbody tr`);
    tableRows.remove();
}

/* Fin Funciones */

$(document).ready(() => {

    listarClientesTable();

});