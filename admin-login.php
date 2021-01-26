<?php 
    header('Access-Control-Allow-Origin: *');

    include_once './php/authentication/model-admin-login.php';
?>
 <!DOCTYPE html>
 <html lang="es">

 <head>
     <title>Institucional la Cartaginesa</title>

     <meta charset="UTF-8" http-equiv="encoding">
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

     <div class="container height-fix ">

         <section id="scAdmin-login" class="row d-flex mt-5">
             <!-- add categoria --> 
             <article id="" class="col col-md-8 mx-auto">
                <h1>Inicio de sesión</h1>

                 <div class="card-deck bg-primary">
                     <div class="card">
                         <div class="card-body">
                             <form action="" method="POST" id="form-Admin-login" class="col col-8 mx-auto mb-2 ">
                                 <h1 class="card-title h4"> Administrativo</h1>

                                 <div class="form-group">
                                     <label for="txtAdminEmail" class="col-form-label">Email</label>

                                     <span class="icon-eye"></span>
                                     <span class="icon-eye-blocked"></span>

                                     <input id="txtAdminEmail" class="form-control col-9" type="email"
                                         name="txtAdminEmail">
                                 </div>

                                 <div class="form-group">
                                     <label for="txtAdminPass">Contraseña</label>
                                     <input id="txtAdminPass" class="form-control col-9 mb-3" type="password"
                                         name="txtAdminPass">

                                 </div>

                                 <div class="form-group col-9">
                                     <span class="alert-danger p-2 position-relative" <?php echo $hidden ?>> <?php echo $errorLG ?></span>
                                     <a href="" class="float-right">Cambiar contraseña</a>
                                 </div>


                                 <input id="btnLoginAdmin" type="submit" value="Ingresar"
                                     class="btn btn-primary form-control col-9 mt-2">

                             </form>
                         </div>
                         <!--c body -->
                     </div>
                     <!-- card -->

                 </div>
                 <!-- deck -->
             </article>

         </section>
         <!--sc adminProductos -->

     </div>
     <!-- container -->

    <?php 
        include __DIR__.'/php/components/global/footer.php';    
    ?>
        
     <script src="lib/jquery-3.4.1.min.js"> </script>
     <script src="lib/popper.min.js"> </script>
     <script src="lib/bootstrap/js/bootstrap.min.js"> </script>
 </body>


 </html>