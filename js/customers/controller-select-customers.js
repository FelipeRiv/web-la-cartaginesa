'use strict'
/* Funciones */
const listarClientesTable = () => {
    resetTableRows('tablaClientes');

    let listaClientes = getListaClientes();
    let tbody = document.querySelector('#tablaClientes tbody');
    // tbody.innerHTML = '';
    // * listaClientes.data?  el simbolo de ? valida si hay datos para poder acceder a la propiedad si es undefind no entra
    for (let i = 0; i < listaClientes.data?.length; i++) {

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
        cellCedula.innerHTML = element.id;
        cellNombre.innerHTML = element.name;
        cellApellidos.innerHTML = element.lastName;
        cellCorreo.innerHTML = element.email;
        cellTelefono.innerHTML = element.phone;
        cellOptions.innerHTML = btnEditar;
        cellOptions.innerHTML += btnEliminar;

        //index, ...rest param
        crearIdBotones(i, element.id, element.name, element.lastName, element.email, element.phone);

        crearIdBotonesDelete(i, element.id, element.name, element.lastName);
 
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

}); //jq