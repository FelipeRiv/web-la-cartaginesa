$(document).ready( () => {

    const divCart = $('#div-cart');
    const empyCart = $('#empy-cart');
    const tableCart = $('#tb-cart');
    const formCart = $('#form-contactenos');

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

    // const getLocalSTCart = (localStorageKey) => {

    //     if (localStorage.getItem(localStorageKey)) {
    
    //         let dataJson = JSON.parse(localStorage.getItem(localStorageKey));
    
    //         let dataArr = [];
    
    //         // ## Iterate and convert json into array of jsons
    //         Object.values(dataJson).forEach(itemCart => {
    //             dataArr.push(itemCart);
    //         });
    
    //         console.log(dataJson);
    //         console.log(dataArr);
    
    //         // another way but it doesnt match here
    //         // let data = [JSON.parse(localStorage.getItem('cartList'))];
    //         // console.log(data);
    //         return dataArr;

    //     }else{
    //         return false;
    //     }
    // }

    const showCart = () => {
        empyCart.addClass('d-none');
        divCart.removeClass('d-none');
    }

    const hideCart = () => {
        divCart.addClass('d-none');
        empyCart.removeClass('d-none');
    }


    const cart = () => {

        if (localStorage.getItem('cartList')) {

            showCart();
    
            let dataJson = JSON.parse(localStorage.getItem('cartList'));
            
            let dataArr = parseArrayofJsons(dataJson);
    
            printCartTable(tableCart, dataArr);
    
        }else{
            hideCart();
        }

    };


    // **************
    formCart.trigger("reset");
    cart();


    // -- Events

    formCart.submit((e) => { 
        e.preventDefault();
        
        console.log(`hola`);
    });
    
    

});