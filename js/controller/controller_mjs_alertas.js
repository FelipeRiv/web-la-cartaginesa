'use strict'
/* Valido para form-contactenos y controller lista clientes form contacto y actualizar */
const msjExito = $('.msj-exito');//antes #msjExito
const msjError = $('.msj-error');//antes #msjExito


//! Funciones de msjs del formulario 
function correcto(text) {
    console.log(`FN coorecto`);
    msjExito.removeClass('d-none');
    msjError.addClass('d-none');
    
}

function phpError(text) {
    console.log(`FN error`);
    console.log('text');
    console.log(text);
    msjExito.addClass('d-none');
    msjError.removeClass('d-none');
    msjError.html(text);
}
