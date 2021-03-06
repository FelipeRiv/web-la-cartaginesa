$(document).ready(function () {

    // **************
    // formCart.trigger("reset");
    loadCart();


    // -- Events
    formCart.submit(async function (e) { 
        e.preventDefault();

        const url = this;

        if (localStorage.getItem(localSTCart)) {
            
            let cart = localStorage.getItem(localSTCart);
    
            const formData = new FormData(this);
            formData.append('cart', cart);

            console.log(formData);

            const resp = await sendCart(url, formData);
    
            console.log(`hola`);
            console.log(resp);

        } else {
            
        }


    });
    

});
