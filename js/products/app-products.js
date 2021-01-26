// -- Classes

class ProductServices {

    request = axios;
    baseUrl = 'http://localhost:80/pry/cartaginesa-web/';
    // baseUrl = 'https://cartaginesa.000webhostapp.com/';

    
    async getData(entity, page = 1){

        const form = document.querySelector('#productOptionsForm');
        // const page = document.querySelector('#productOptionsForm');

        const formData = new FormData(form);
        formData.append('pgProducts', page);

        try {
            const resp = await this.request({
                method: 'post',
                url: `${this.baseUrl}${entity}`,
                data: formData
            });
            // let {data} = resp.data;

            return resp;

        } catch (error) {
            console.log(`error en la peticion axios al obtener el count`);
            console.log(error);
        }


    }

    getCategories = async () => {

        try {

            const response = await axios.get('./php/db/admin-products/category/model-select-categories.php');

            return response.data.data;

        } catch (error) {
            console.log(`error en la peticion axios al obtener las categorias de productos productos.html`);
            console.log(error);
        }
    }

    getProducts = async () => {

        const form = document.querySelector('#productOptionsForm');

        const formData = new FormData(form);

        try {
            const response = await axios({
                method: 'post',
                url: './php/db/admin-products/products/model-select-products.php',
                data: formData,
                headers: {
                    'Content-Type': 'multipart/form-data'
                }

            });
            // * msj response.succ | response.msj | response.data
            
            // console.log('response');
            // console.log(response);
            // console.log(response.data);
            return response.data.data;


        } catch (error) {
            console.log(`error en la peticion axios al obtener los productos de productos productos.html`);
            console.log(error);
        }
    }

}




class ProductUI {

    sectionProducts = document.querySelector('#sectionProducts');

    templateProduct = document.querySelector('#template-product').content;

    productFragment = document.createDocumentFragment();

    // stores the selected products of cart
    cartList = {};

    /**
     * @param {*} array array with the category elements to list in select
     * @param {*} selectObject html select objetct which contains all categories
     */
    listSelectOptions = (array, selectObject) => {
        selectObject.innerHTML = '';
        
        const option = document.createElement('option');

            option.text = 'Todos';
            option.value = 'all';

            selectObject.appendChild(option);
        
        for (let i = 0; i < array.length; i++) {
 
            const option = document.createElement('option');

            option.text = array[i].nombre;
            option.value = array[i].idCategoria;

            selectObject.appendChild(option);

        }

    }

    /** 
     *  * async function to get the categories and then call >listSelectOptions function to list them in the select 
     * 
     * */
    listCategories = (categoryList, selectCategoria) => {

        // categoryList = await getCategories();
        this.listSelectOptions(categoryList, selectCategoria);
    }

    /**
     * * Print all products according its category
     * @param {*} productList array with the products to print them in GUI
     */
    printProducts = async (data) => {

        this.sectionProducts.innerHTML = '';

        for (const product of data) {

            let {fkCategoria, categoria, idProducto, nombre, descripcion, imgPath} = product;

            // console.log(data); // array de jsons completo
            // console.log(product); // array de 1 producto
            // console.log(product[1]); // 

            // fill the template
            
            if (await uiGeneral.isUrlFound(imgPath)) {
                
                this.templateProduct.querySelector('.item-image').setAttribute('src', imgPath);
                
            } else {
                const imgPath404 = 'image/logo256px.png';
                
                this.templateProduct.querySelector('.item-image').setAttribute('src', imgPath404);
            }


            this.templateProduct.querySelector('.item-title').textContent = nombre;
            this.templateProduct.querySelector('.item-text').textContent = descripcion;
            this.templateProduct.querySelector('.item-btn').dataset.id = idProducto;

            // cloneNode the template
            let clone = this.templateProduct.cloneNode(true);

            //fill the fragment
            this.productFragment.appendChild(clone);
        }

        // fill the section with the fragment
        this.sectionProducts.appendChild(this.productFragment);

    }

   /**
    * 
    * @param {*} e event from the parent box
    */
    addCart(e){
        // console.log(e);
        if (e.target.classList.contains('item-btn')) {
            // console.log(`btn`);

            const parent = e.target.parentElement.parentElement.parentElement

            // console.log(parent);
            // this.setCart(parent);
            this.setCart(parent);

        }
        e.stopPropagation();
    }

    setCart(objParent){
        let quantity = parseInt(objParent.querySelector('.item-quantity').value);
        console.log(`quantity`);
        console.log(quantity);

        if (Number.isNaN(quantity)) {
            console.log(`isnan`);
            quantity = 1;
        }

        const product = {
            id: objParent.querySelector('.item-btn').dataset.id,
            name: objParent.querySelector('.item-title').textContent,
            description: objParent.querySelector('.item-text').textContent,
            imgPath: objParent.querySelector('.item-image').getAttribute('src'),
            quantity
            
        }

        const {id} = product;

        // if contains the product
        if (this.cartList.hasOwnProperty(id)) {
            console.log(`ya tiene este producto`);

            // quantity counter plus 1
            this.cartList[id].quantity = this.cartList[id].quantity + quantity;
            
        }else{
            // the json in pos or key ->id it would have the entire product with the spread operator
            this.cartList[id] = {...product}

        }

        localStorage.setItem('cartList', JSON.stringify(this.cartList));
        
        // console.log(product);
        console.log('this.cartList');
        console.log(this.cartList);
        objParent.querySelector('.item-quantity').value = '';
    }

    loadLocalCart(){
        if (localStorage.getItem('cartList')) {
            this.cartList = JSON.parse(localStorage.getItem('cartList'));
            console.log(`cart LOCAL`);
            console.log(this.cartList);
        }
    }

    pagination(totalPages, indexPage){
        
        const pagination = document.querySelector('.pages');

        let stringTemplate = '';
        let nextBtn = false;
      
        //       0 < 7
        for (let i = 0; i < totalPages; i++) {
            // -- previous button
            // if (indexPage === 0 && i === 0) {
            //     stringTemplate += 
            //     `
            //         <li class="page-item disabled">
            //             <span class="page-link">Anterior</span>
            //         </li>
        
            //     `;
            // }else if(indexPage !== 0 && i === 0){
            //     stringTemplate += 
            //     `
            //         <li class="page-item">
            //             <span class="page-link">Anterior</span>
            //         </li>
        
            //     `;
            // }

            // console.log(`indexPage`);
            // console.log(indexPage);
            // console.log(`for`);
            // console.log(i);
            // -- pages
            if (indexPage === i  ) {
                console.log(`indexPage`);
                console.log(indexPage);
                console.log(i);
                stringTemplate += 
                `
                <li class="page-item active">
                    <a class="page-link" dataset.page="${i+1}">${i+1}
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                `;
            }else{
                
                stringTemplate += 
                `
                        <li class="page-item">
                            <a class="page-link" dataset.page="${i+1}">${i+1}</a>
                        </li>
    
                `;
            }

            // // -- Next button

            // if (indexPage === (totalPages-1) && i === totalPages-1) {
            //     stringTemplate += 
            //     `
            //         <li class="page-item disabled">
            //             <span class="page-link">Siguiente</span>
            //         </li>
        
            //     `;
            //     nextBtn = true;
            // }

            
        }

        // if(indexPage !== totalPages && !nextBtn ){
        //     stringTemplate += 
        //     `
        //         <li class="page-item">
        //             <span class="page-link">Siguiente</span>
        //         </li>
    
        //     `;
        // }
  
        pagination.innerHTML = stringTemplate;
    }

    // ? Wrapper methods
    async getAndShowProducts(selectCategory){
        currentIndexPage = 1; // reset when change the category
        // get and print categories select

        // if category is changed do not get the categories again
        if (selectCategory) {
            let categoryList = await service.getCategories();
            ui.listCategories(categoryList, selectCategory);
        }

        // get and print products based on the category
        const resp = await service.getData('php/db/admin-products/products/model-calc.php', currentIndexPage);

        const totalPages = resp.data?.totalPages;
        const indexPage = resp.data?.indexPage;
        // console.log(resp.data.count);
        // console.log(resp.data?.indexPage);
        // console.log(resp.data);
        // console.log('resp.data?.data');
        // console.log(resp.data?.data);
        
        ui.pagination(totalPages, indexPage);

        $('#productOptionsForm').show();
        
        productList = resp.data.data;
      
        ui.printProducts(productList);

    }

    async paginationClick(e){
        console.log(`pagination`);
        // console.log(e.target.classList.contains('page-link'));
        let page;

        if (e.target.classList.contains('page-link')) {
            page = e.target;
            console.log(page);
            // console.log(page.attributes);
            
            currentIndexPage = page.getAttribute('dataset.page');
            console.log(currentIndexPage);

        }
        
        e.stopPropagation();
        
        const resp = await service.getData('php/db/admin-products/products/model-calc.php', currentIndexPage);
        console.log(`currentIndexPage`);
        console.log(currentIndexPage);
        
        const totalPages = resp.data?.totalPages;
        const indexPage = resp.data?.indexPage;
        console.log(resp.data);
        productList = resp.data?.data;
        
        ui.pagination(totalPages, indexPage);
        ui.printProducts(productList);

    }

}


// -- Instances ***
const service = new ProductServices();
const ui = new ProductUI();
const uiGeneral = new UIGeneral();

// -- *** Variables ***

let productList = [];
let idCardRow = 0;
let cartArray = [];
let currentIndexPage = 0;

// -- *** Events ***

// * ready event
$(document).ready(async () => {
    
    // -- Dom Variables ready doc
    const selectCategory = document.querySelector('#sltGetCategoria');
    const sectionProducts = document.querySelector('#sectionProducts');
    const pagination = document.querySelector('.pagination');
    
    $('#productOptionsForm').hide();
    ui.loadLocalCart();
    ui.getAndShowProducts(selectCategory);


    $('#productOptionsForm').show();

    // ------------Events Ready-----------------

    $(selectCategory).change(async () => {
        ui.getAndShowProducts();
       
    });

    $(sectionProducts).click((e) => {
        ui.addCart(e);
    });

    $(pagination).click( async (e) => {
        
        ui.paginationClick(e);
        
    });


});