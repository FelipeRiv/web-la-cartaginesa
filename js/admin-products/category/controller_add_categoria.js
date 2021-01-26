$(document).ready(function () {
    
    $('#form-agregar-categoria').submit(function (event) {

        event.preventDefault();
        insertCategory();

        deleteOptions(function(){
            listarCategorias();

            $('#txtAddCategoria').val('');
            deleteSelectOptions('id', 'sltDltProducto');
        });

    });

}); //jq
