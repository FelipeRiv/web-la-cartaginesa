class Service{
    request = axios;
    baseUrl = 'http://localhost:80/pry/cartaginesa-web/';

    
    async getData(entity){

        try {
            const resp = await this.request.get(`${this.baseUrl}${entity}`);
            let {data} = resp.data;

            return data;

        } catch (error) {
            console.log(`error en la peticion axios al obtener las categorias de productos productos.html`);
            console.log(error);
        }
    }



}