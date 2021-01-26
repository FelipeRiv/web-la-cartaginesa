 <!DOCTYPE html>
 <html lang="es">

 <head>
     <title>Institucional la Cartaginesa</title>

     <meta charset="UTF-8">
     <meta name="author" content="Luis Felipe Rivera Alvarado">
     <meta name="owner" content="Alejandro Vargas Acuña">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <meta name="robots" content="index,follow">
     <meta name="description"
         content="En Institucional la Cartaginesa tenemos los mejores Productos e implementos de limpieza con precios económicos en Costa Rica para la empresa o cuidado del hogar">
     <meta name="keywords"
         content="productos de limpieza Costa Rica, limpieza institucional, la cartaginesa, limpieza de hogar">


     <!-- <link rel="stylesheet" href="css/normalize.css"> -->
     <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="lib/bootstrap/css/bootstrap-reboot.min.css">
     <link rel="stylesheet" href="lib/bootstrap/css/bootstrap-grid.min.css">

     <!-- iconos -->
     <link rel="stylesheet" href="css/styleFonts.css">

     <link rel="stylesheet" href="css/style.css">

     <!-- animaciones -->
     <link rel="stylesheet" href="css/animate.css">

     <!-- <script src="js/modernizr-custom.js"></script> -->
 </head>

 <body>
    <?php 
        include __DIR__.'/php/components/global/menu.php';    
    ?>

     <div class="container bg-primary text-white mb-3 rounded">
         <section id="scContactanos" class="row">

             <form action="" method="POST" class=" col-sm-8 mx-auto col-lg-6 mb-3"
                 id="form-contactenos">
                 <h1>Contáctanos</h1>

                 <!-- msjs de form -->
                 <div class="d-none alert msj-exito
                alert-success" >Enviado con éxito</div>
                 <div class="d-none alert msj-error  alert-danger" ></div>

                 <!-- <div class="form-group">
                     <label for="txtCedulaContacto">Cédula</label>

                     <span class="icon-checkmark icon-valid-input d-none"></span>
                     <span class="icon-cross icon-error-
                      d-none"></span>

                     <input  id="txtCedulaContacto" class="form-control" type="text"
                         name="txtCedulaContacto">
                 </div> -->
                 <div class="form-group">
                     <label for="txtNombreContacto">Nombre</label>

                     <span class="icon-checkmark icon-valid-input d-none"></span>
                     <span class="icon-cross icon-error-input d-none"></span>

                     <input  id="txtNombreContacto" class="form-control" type="text"
                         name="txtNombreContacto">
                 </div>
                 <div class="form-group">
                     <label for="txtApellidoContacto">Apellidos</label>

                     <span class="icon-checkmark icon-valid-input d-none"></span>
                     <span class="icon-cross icon-error-input d-none"></span>

                     <input  id="txtApellidoContacto" class="form-control" type="text"
                         name="txtApellidoContacto">
                 </div>
                 <div class="form-group">
                     <label for="txtCorreoContacto">Email</label>

                     <span class="icon-checkmark icon-valid-input d-none"></span>
                     <span class="icon-cross icon-error-input d-none"></span>

                     <input  id="txtCorreoContacto" class="form-control" type="text"
                         name="txtCorreoContacto">
                 </div>
                 <div class="form-group">
                     <label for="txtNumeroContacto">Número de contácto</label>

                     <span class="icon-checkmark icon-valid-input d-none"></span>
                     <span class="icon-cross icon-error-input d-none"></span>

                     <input  id="txtNumeroContacto" class="form-control" type="txt"
                         name="txtNumeroContacto">
                 </div>
                 <div class="form-group">
                     <label for="txtComentariosContacto">Preguntas o Comentarios</label>
                     <textarea name="txtComentariosContacto" id="txtComentariosContacto" rows="5"
                         class="form-control"></textarea>
                 </div>

                 <button type="submit" class="btn btn-success col-3" id="btnEnviarContacto">
                     Enviar
                     <span class="icon-arrow-right ml-2"></span>
                 </button>
                 <!-- <input type="submit" value="Enviar"> -->

             </form>

             <section id="sc-ubicacion" class="col-6  mx-auto text-center">
                 <h2>Ubicación</h2>

                 <iframe
                     src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3930.314211576171!2d-83.98766!3d9.907767!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe55e20119856a589!2sPa%C3%B1alera%20La%20Cartaginesa!5e0!3m2!1sen!2scr!4v1593186573939!5m2!1sen!2scr"
                     title="Mapa Tienda" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"
                     class="mt-4 rounded border-primary" id="contacto-main-map">
                 </iframe>

                 <p class="mt-3 lead">
                     Cartago, La Unión, Tres Ríos.
                 </p>
                 <p class="lead">
                     Diagonal al Ministerio de Salud
                 </p>
             </section>

         </section>

     </div>
     <!-- container -->


    <?php 
        include __DIR__.'/php/components/global/footer.php';    
    ?>



     <script src="lib/jquery-3.5.1.min.js"> </script>
     <script src="lib/popper.min.js"> </script>
     <script src="lib/bootstrap/js/bootstrap.min.js"> </script>
   
     <script src="js/controller/controller_mjs_alertas.js"></script>
     
     <!-- ? new contacto PDO -->
     <script src="js/contact-form/service_add_contacto.js"></script>

     <!-- ! old contacto -->
     <!-- <script src="js/services/service_add_contacto.js"></script> -->
     <script src="js/controller/controller_form_contacto.js"></script>
     <!-- <script src="js/services/service_form_contacto.js"></script> -->
 </body>


 </html>