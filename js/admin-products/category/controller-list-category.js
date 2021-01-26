const listarCategorias = () => {

    let listaCategorias = getCategorias();

    //listaCategorias is a json wich 1st element is an array of jsons, so listaCategorias is the array that has the rest of jsons
    for (let i = 0; i < listaCategorias.data?.length; i++) {
        const elemento = listaCategorias.data[i];

        //JQuery option listado para todas las categorias en los select con esa class
        $('.sltDltCateg').append('<option value="' + elemento.idCategoria + '">' + elemento.nombre + '</option>');

    }
}


/**
 * Remove all the items first, then executes the callback to list the new items
 * @param {function} listItemsCallback after delete de items execute the callback to list items
 */
const deleteOptions = listItemsCallback => {
    console.log(`deleteOptions()`);

    $('.sltDltCateg')
        .find('option')
        .remove()
        .end()
        .append('<option> --- </option>');

    listItemsCallback();

};

/**
 * Specifies whether is an id or class and the name of it to delete the options inside it
 * @param {string} typeSelector id or class 
 * @param {string} selectName name of the id or class
 */
const deleteSelectOptions = (typeSelector, selectName) =>{
    if (typeSelector === 'id') {
        console.log(`dleete select options`);

        $('#'+selectName)
        .find('option')
        .remove()
        .end()
        .append('<option> --- </option>');

    } else if (typeSelector === 'class') {
        
        $('.'+selectName)
        .find('option')
        .remove()
        .end()
        .append('<option> --- </option>');
        
    }

   
}

$(document).ready(function () {

    listarCategorias();

}); //jq