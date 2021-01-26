const ui = new UIGeneral();

let listPrd = [];
let idPrd;

const listProducts = () => {

    listPrd = getProducts();

    for (let i = 0; i < listPrd.data?.length; i++) {
        const element = listPrd.data[i];

        $('#sltDltProducto').append(`<option value="${element.idProducto}" > ${element.nombre} </option>`);

    }
}

const showIdProduct = (idProduct) => {

    $('#txtIdProduct').val(idProduct);
}



const showImgProduct = async (id) => {
  
    if (id === '---' || !id) {
  
        const path = 'image/design/productoNoselecionado.jpg';
        $('#DltIdProduct').attr('src', path);
        
    } else {
        // * check if img exists
        let imgPath = listPrd.data.find(product => product.idProducto === id);
        

        if (imgPath?.imgPath && await ui.isUrlFound(imgPath?.imgPath)) {
            
            $('#DltIdProduct').attr('src', imgPath.imgPath);
            // const path = 'php/db/admin-products/products/';
            // $('#DltIdProduct').attr('src', path+imgPath.imgPath);
        }else{
            const path = 'image/design/productoNoEncontrado.jpg';
            $('#DltIdProduct').attr('src', path);
        }

  
    }

}


$(document).ready(function () {
    const selectCategory = $('#sltDltCategoriaProducto');
    const selectProduct = $('#sltDltProducto');

    selectCategory.change(() => {

        deleteSelectOptions('id', 'sltDltProducto');

        if (selectCategory.val() !== 'none') {
            
            getProducts();
            listProducts();
            showImgProduct();
        }

    });

    selectProduct.change((e) => {
        showIdProduct(e.target.value);
        showImgProduct(e.target.value);

    });

});