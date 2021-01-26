$(document).ready(() => {

    /**
     * reset the id and img field when the product is deleted
     */
    const resetIDImgFields = () =>{
        const idField = document.querySelector('#txtIdProduct');
        const imgField = document.querySelector('#DltIdProduct');

        const path = 'image/design/productoNoselecionado.jpg';

        idField.value = '---';
        imgField.setAttribute('src', path);
    }

    /**
     * Waits for the result of the delete and then delte the options in the select and get the products to list them later
     */
    const result = async () => {
        
        await deleteProduct();

        deleteSelectOptions('id', 'sltDltProducto');
        getProducts();
        listProducts();
    }

    /**
     * when the form is submited delete the product then the select options to get the products and list the updated list
     */
    $('#form-eliminar-producto').submit((event) => {
        event.preventDefault();

        deleteProduct();
        deleteSelectOptions('id', 'sltDltProducto');
        resetIDImgFields();
        getProducts();
        listProducts();

    });

});