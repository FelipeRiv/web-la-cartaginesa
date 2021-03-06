const divCart = $('#div-cart');
const empyCart = $('#empy-cart');
const tableCart = $('#tb-cart');
const formCart = $('#form-contactenos');
const localSTCart = 'cartList';

// Enables tool tips in bootstrap
$(() => {
    $('[data-toggle="tooltip"]').tooltip();
});

//* RENDER COMPONENTS FOR DATATABLES
const tdImgPath = (data) => (`
                
    <tr class="odd tb-cart__body-row flex-wrap">

        <td class="tb-cart__cell tb-cart--cell-img">
            <figure class="tb-cart__main-figure">
                <img class="tb-cart__main-img" src="${data}" 
                />
            </figure>
        </td>
    </tr>

`);

const tdQuatity = (data) =>  (`
    <div class="form-group ">

    <input type="text" class="w-25 h-25 form-control d-inline" value="${data}">
    
    <button class=" mx-1 btn btn-success" data-toggle="tooltip" data-placement="top" title="Agregar">
        <span class="icon-plus"></span>
    </button>
    
    <button class=" mx-1 btn btn-warning" data-toggle="tooltip" data-placement="top" title="Reducir">
        <span class="icon-minus"></span>
    </button>
    
    
    <button class=" mx-1 btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar">
        <span class="icon-bin"></span>
    </button>

    </div>

`);

const printCartTable = (tableObj, dataArray) => {

    tableObj.DataTable({
        data: dataArray,
        columns: [
            {
                data: 'imgPath',
                render: (data) => tdImgPath(data)
            },
            {data: 'name'},
            {
                data: 'quantity', 
                render: (data) => tdQuatity(data),
            },
            {data: 'id'},
        ],
    });
};


/**
 * 
 * @param {*} json json to convert into array of jsons
 */
const parseArrayofJsons = (jsonObj) => {
    let arrayOfJsons = [];

    // ## Iterate and convert json into array of jsons
    Object.values(jsonObj).forEach(itemCart => {
        arrayOfJsons.push(itemCart);
    });

    return arrayOfJsons;
}

const showCart = () => {
    empyCart.addClass('d-none');
    divCart.removeClass('d-none');
}

const hideCart = () => {
    divCart.addClass('d-none');
    empyCart.removeClass('d-none');
}


const loadCart = () => {

    if (localStorage.getItem(localSTCart)) {

        showCart();

        let dataJson = JSON.parse(localStorage.getItem(localSTCart));
        
        let dataArr = parseArrayofJsons(dataJson);

        printCartTable(tableCart, dataArr);

    }else{
        hideCart();
    }

};
