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
     
     <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>

     <!-- iconos -->
     <link rel="stylesheet" href="css/styleFonts.css">
    <!-- main style -->
     <link rel="stylesheet" href="css/style.css">

     <!-- animaciones -->
     <link rel="stylesheet" href="css/animate.css">

     <!-- <script src="js/modernizr-custom.js"></script> -->
 </head>

 <body>
    <?php 
        include __DIR__.'/php/components/global/menu.php'
    ?>

     <div class="container table-responsive height-fix">
         <h1>Clientes</h1>


         <table class="table table-hover" id="tablaClientes">
             <thead>
                 <tr class="bg-primary text-white">
                     <th scope="col">ID</th>
                     <th scope="col">Nombre</th>
                     <th scope="col">Apellidos</th>
                     <th scope="col">Correo</th>
                     <th scope="col">Télefono</th>
                     <th scope="col">Opciones</th>
                 </tr>
             </thead>
             <tbody>

             </tbody>
         </table>

         <!-- update modal form -->
         <div class="modal fade" id="contactoModal" tabindex="-1" aria-labelledby="contactoModalLabel"
             aria-hidden="true">
             <div class="modal-dialog">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title" id="contactoModalLabel">Actualizar Contacto Cliente</h5>

                         <button type="button" class="close" id="mark-close-modal" data-dismiss="modal"
                             aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>

                     </div>
                     <div class="modal-body">

                         <form action="" method="POST" class="col"
                             id="form-actualizar-contacto">

                             <!-- msjs de form -->
                             <div class="msj-exito d-none alert alert-success" >Actualizado con éxito</div>
                             <div class="msj-error d-none alert alert-danger" ></div>

                             <div class="form-group">
                                 <label for="txtCedulaContacto">ID</label>

                                 <span class="icon-checkmark icon-valid-input d-none"></span>
                                 <span class="icon-cross icon-error-input d-none"></span>

                                 <input autocomplete="off" id="txtCedulaContacto" class="form-control" type="text"
                                     name="txtCedulaContacto">
                             </div>
                             <div class="form-group">
                                 <label for="txtNombreContacto">Nombre</label>

                                 <span class="icon-checkmark icon-valid-input d-none"></span>
                                 <span class="icon-cross icon-error-input d-none"></span>

                                 <input autocomplete="off" id="txtNombreContacto" class="form-control" type="text"
                                     name="txtNombreContacto">
                             </div>
                             <div class="form-group">
                                 <label for="txtApellidoContacto">Apellidos</label>

                                 <span class="icon-checkmark icon-valid-input d-none"></span>
                                 <span class="icon-cross icon-error-input d-none"></span>

                                 <input autocomplete="off" id="txtApellidoContacto" class="form-control" type="text"
                                     name="txtApellidoContacto">
                             </div>
                             <div class="form-group">
                                 <label for="txtCorreoContacto">Email</label>

                                 <span class="icon-checkmark icon-valid-input d-none"></span>
                                 <span class="icon-cross icon-error-input d-none"></span>

                                 <input autocomplete="off" id="txtCorreoContacto" class="form-control" type="email"
                                     name="txtCorreoContacto">
                             </div>
                             <div class="form-group">
                                 <label for="txtNumeroContacto">Número de contácto</label>

                                 <span class="icon-checkmark icon-valid-input d-none"></span>
                                 <span class="icon-cross icon-error-input d-none"></span>

                                 <input autocomplete="off" id="txtNumeroContacto" class="form-control" type="txt"
                                     name="txtNumeroContacto">
                             </div>
                             <!-- <input type="submit" value="Enviar"> -->
                             <div class="modal-footer">
                                 <button type="button" id="btn-close-modal" class="mr-auto btn btn-danger"
                                     data-dismiss="modal">Cerrar</button>

                                 <button type="submit" class="mr-auto btn btn-success col-6" id="btnEnviarContacto">
                                     Actualizar
                                     <span class="icon-arrow-right ml-2"></span>
                                 </button>
                             </div>

                         </form>
                     </div>
                 </div>
             </div>
         </div>

         <!-- delete modal form -->
         <div class="modal fade" id="deleteContactModal" tabindex="-1" role="dialog"
             aria-labelledby="deleteContactModalLabel" aria-hidden="true">
             <div class="modal-dialog" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title" id="deleteContactModalLabel"> ¿Desea eliminar el registro?
                         </h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <div class="modal-body">

                         <form action="" method="POST" id="form-eliminar-contacto"
                             class="text-center">

                            <div class="msj-exito d-none alert-success">Eliminado con éxito</div>
                            <div class="msj-error d-none alert-danger"></div>

                            <div id="info-eliminar-contacto" class="">

                                 <div class="form-group text-center m-auto">
                                     <label for="txtDltCedulaContacto">ID: </label>

                                     <input type="text" id="txtDltCedulaContacto" name="txtDltCedulaContacto"
                                         class="border-0 disabled">
                                 </div>

                                 <div class="form-group text-center m-auto text-center">
                                     <label for="txtDltNombreContacto">Nombre: </label>
                                     <input type="text" disabled id="txtDltNombreContacto" name="txtDltNombreContacto"
                                         class="border-0">

                                 </div>

                                 <div class="form-group text-center m-auto">

                                     <label for="txtDltApellidoContacto">Apellido: </label>
                                     <input type="text" disabled id="txtDltApellidoContacto"
                                         name="txtDltApellidoContacto" class="border-0">
                                 </div>

                            </div>

                             <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                                 <button type="submit" class="btn btn-danger">Eliminar</button>
                             </div>
                         </form>

                     </div>

                 </div>
             </div>
         </div>

     </div>
     <!-- container -->

    <?php 
        include __DIR__.'/php/components/global/footer.php'
    ?>

     <!-- * external libraries -->
     <script src="lib/jquery-3.5.1.min.js"> </script>

     <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>

     <script src="lib/popper.min.js"> </script>
     <script src="lib/bootstrap/js/bootstrap.min.js"> </script>

     <!-- * services -->
     <!-- ? nuevo service general-->
     <script src="js/customers/service-customers.js"></script>
     
    
     <!-- * controllers -->

     <!-- ? nuevo controller -->
     <script src="js/customers/controller-select-customers.js"></script>
     
     <!-- ? nuevo -->
     <script src="js/customers/controller-btn-update-delete-cliente.js"></script>
     <!-- shared contollers -->
     <script src="js/controller/controller_mjs_alertas.js"></script>
     <script src="js/controller/controller_form_contacto.js"></script>

     <script>
$(document).ready(function(){
    $('#tablaClientes').dataTable({
        language: {
            search: 'Buscar',
            paginate: {
                first: 'Primero',
                last: 'Último',
                next: 'Siguiente',
                previous: 'Anterior'
            },
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "processing": "Procesando...",
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "emptyTable": "Ningún dato disponible en esta tabla",
            // count: {'total'},
            // countFiltered: {'shown'} "({total})",
            emptyPanes: 'Sin paneles de búsqueda',
            loadMessage: 'Cargando paneles de búsqueda',
            title: 'Filtros Activos - %d'
        }
    });
});
</script>
 </body>


 </html>