class UIGeneral{

    /**
     * 
     * @param {*} url path or url of file where you want to check if the file exists or not - return true || false
     */
    async isUrlFound(url) {
        try {
          const response = await fetch(url, {
            method: 'HEAD',
            cache: 'no-cache'
          });
      
          return response.status === 200;
      
        } catch(error) {
        //   console.log(error);
          return false;
        }
      }

      // -- use this one instead of the one in controller list category
/**
 * Specifies whether is an id or class and the name of it to delete the options inside it
 * @param {string} typeSelector id or class 
 * @param {string} selectName name of the id or class
 */
 deleteSelectOptions = (typeSelector, selectName) =>{

  if (typeSelector === 'id') {

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


}

class UIMessages{
    
}