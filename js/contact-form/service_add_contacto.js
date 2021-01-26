'use strict'
function enviarFormContato() { //pasar a service_form_contacto

  //get datos name y los lleva a un array
  var datosForm = formContactenos.serialize();

  //envio por Ajax de datos
  $.ajax({
    type: "POST",
    url: "./php/db/contact-form/model-insert-contact.php",
    data: datosForm,
    success: function (response) {
      try {
        response = JSON.parse(response);
        console.log(`response`);
        console.log(response);
        
        if (response.succ) {
          correcto(response.msj);
          
        } else {
          phpError(response.msj);
        }
      } catch (error) {
        // TODO treat error in this case
        // phpError(response);
        phpError('Ha ocurrido un error, intentalo más tarde');
        console.log(JSON.stringify(error));
        
      }

    }

  });
} 


























// const formContactenos = $('#form-contactenos');

// const enviarFormContacto = () => {

//     // let request = fet


//     let data = formContactenos.serialize();

//     fetch('./php/models/model_form_contacto.php', {
//             method: 'POST', // or 'PUT'
//             headers: {
//                 'Content-Type': 'application/json',
//             },
//             body: JSON.stringify(data),
//         })
//         .then(response => response.text())
//         .then(data => {
//             console.log('Success:', data);
//         })
//         .catch((error) => {
//             console.error('Error:', error);
//         });
// }


// formContactenos.submit( event =>{
//     event.preventDefault();
//     enviarFormContacto();
// });


/* 
// original code

const data = { username: 'example' };

fetch('https://example.com/profile', {
  method: 'POST', // or 'PUT'
  headers: {
    'Content-Type': 'application/json',
  },
  body: JSON.stringify(data),
})
.then(response => response.json())
.then(data => {
  console.log('Success:', data);
})
.catch((error) => {
  console.error('Error:', error);
});

*/