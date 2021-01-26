  $(document).ready(function () {

      $('#form-eliminar-categoria').submit(function (event) {
          event.preventDefault();

          /**
           * delete the category then deletes the select options and list
           */
          const promiseEliminarCategoria = new Promise((resolve, reject) => {

              let msj = eliminarCategoria();

              if (msj.toLowerCase().startsWith('error')) {

                  reject(msj);

              } else {

                  resolve();
              }

          });// ! corregir con promesa dentro de funcion return promise o async await
          promiseEliminarCategoria
              .then(() => {
                deleteSelectOptions('class', 'sltDltCateg');
              })
              .then(() => {
                listarCategorias();
              })
              .catch((msj) => {
                  alert(msj);
              })

      });





  }); //jq



  /* codigos */


  /* 
    //Vanilla JS option listado solo una categoria
                  var sltDlt = document.querySelector('#sltDltCategoria');

                  var option = document.createElement('option');
                  option.setAttribute("value", i);

                  var categoria = document.createTextNode(elemento.nombre);
                  option.appendChild(categoria);

                  sltDlt.appendChild(option); 

  */

  /* 
  // Vanila JS option listado de todas las clases

  $.ajax({
          type: "POST",
          url: "./db/../php/db/select2.php",
          // dataType: "json",
          success: function (response) {

              contenido = JSON.parse(response);
              //contenido is a json wich 1st element is an array of jsons, so data is the array that has the rest of jsons
              for (let i = 0; i < contenido.data.length; i++) {
                  const elemento = contenido.data[i];


                  //JQuery option listado para todas las categorias
                  // $('.sltDltCateg').append('<option value="'+ elemento.idCategoria +'">'+ elemento.nombre +'</option>');

                  //Vanilla JS option listado para todas las categorias
                  var sltDlt = document.querySelectorAll('.sltDltCateg'); //get all 3 selects
                  var option = document.createElement('option'); //create new every option
                  option.setAttribute("value", elemento.idCategoria); //set the value with its id

                  var categoria = document.createTextNode(elemento.nombre); //get the name to create a new text node
                  option.appendChild(categoria); //append every text node into every option

                  //set the content of the options in every select element of the array sltDlt
                  for (const key in sltDlt) {
                      if (sltDlt.hasOwnProperty(key)) {
                          const element = sltDlt[key];
                          sltDlt[key].innerHTML += (option).outerHTML; //set de content of every option inside of them, 
                          //it doesnt work with append
                      }
                  }
              }
          },
          error: function () {
              console.log(`errro`);
          }
      });

  */