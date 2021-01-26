const getInfoTemp = () => {
    let form = $('#form-insert-product');

    form.change(function () {


        let nombre = $('#txtAddProducto').val();
        let id = $('#txtAddId').val();
        let categoria = $('#sltAddCategoriaProd').val();

        let descripcion = $('#txtAddDescripcion').val();

        let imgVal = $('#sltAddCategoriaProd').val();


        console.log(`chambio`);
        console.log(nombre);
        console.log(id);
        console.log(categoria);
        console.log(descripcion);

        console.log('imgval' + imgVal);
        console.log(`123123`);

        if (imgVal !== '') {
            // let img = $('#sltAddCategoriaProd')[0].files[0];

            formData = new FormData();

            formData.append('nombre', nombre);
            formData.append('id', id);
            formData.append('categoria', categoria);
            formData.append('descripcion', descripcion);
            // formData.append('img', img);

            // console.log(img);
        }

        return formData;


    });


}

// getInfoTemp();



$(document).ready(function () {

    $('#form-insert-product').submit(function (event) {

        event.preventDefault();

        deleteSelectOptions('id', 'sltDltProducto');

        insertProduct();

        getProducts();

        listProducts();
        
        // * To reset the form, activate later
        // $('#form-insert-product').trigger("reset");
        // $('#form-eliminar-producto').trigger("reset");

        showImgProduct();




    });

}); //jq