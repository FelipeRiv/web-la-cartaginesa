'use strict'

const getListaClientes = () => {

    let listaClientes = [];

    let request = $.ajax({
        type: "POST",
        url: "./php/models/model_lista_clientes.php",
        async: false,
        dataType: "json",
    });
    
    request.done( (response) =>{
        listaClientes = response;
    });
    
    request.fail( () =>{
        console.log(`error response listaclientes`);
        
    });
    
    return listaClientes;
}