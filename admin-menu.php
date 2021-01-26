<?php 
    header('Access-Control-Allow-Origin: *');
    include_once __DIR__.'/php/authentication/ClsUserSession.php';

    // construct do session_start;
    $userSession = new UserSession(); 

    define('ADMIN_LOGIN', 'location: admin-login.php');

    $userRol = $userSession->getCurrentRol();
    // if there's a session rol and it's different than 1 = admin then go to index
    if( !isset($userRol) ){
        header(ADMIN_LOGIN);
    }else{
        if($userRol != 1){
            header(ADMIN_LOGIN);
        }
    }
?>
<!DOCTYPE html>
 <html lang="es">

 <head>
     <title>Menú Administrativo | Institucional La Cartaginesa</title>

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

     <div class="container height-fix">

         <h1 class="text-center mb-3">Panel Administrativo</h1>
         <section id="scPanel-Admin" class="row d-flex justify-content-center flex-xl-wrap">

             <div class="card text-center" style="width: 17rem;">
                 <div class="card-body">
                     <h1 class="card-title lead font-weight-normal">Categorías y Productos</h1>

                     <a href="admin-productos.php" target="_blank" class="btn btn-primary">
                         <figure>
                             <img src="image/design/productos.jpg" class="img-fluid rounded" alt="productos">
                         </figure>
                         Ir
                         <span class="icon-enter"></span>
                     </a>
                 </div>
             </div>

             <!-- <div class="card text-center" style="width: 17rem;">
                 <div class="card-body">
                     <h1 class="card-title lead font-weight-normal">Usuarios y Roles</h1>

                     <a href="usuarios.php" target="_blank" class="btn btn-primary">
                         <figure>
                             <img src="image/design/userComputer.jpg" class="img-fluid rounded" alt="productos">
                         </figure>
                         Ir
                         <span class="icon-enter"></span>
                     </a>
                 </div>
             </div>

             <div class="card text-center" style="width: 17rem;">
                 <div class="card-body">
                     <h1 class="card-title lead font-weight-normal">Cotizaciones</h1>

                     <a href="cotizaciones.php" target="_blank" class="btn btn-primary">
                         <figure>
                             <img src="image/design/cotizacion1.jpg" class="img-fluid rounded" alt="productos">
                         </figure>
                         Ir
                         <span class="icon-enter"></span>
                     </a>
                 </div>
             </div> -->

             <div class="card text-center" style="width: 17rem;">
                 <div class="card-body">
                     <h1 class="card-title lead font-weight-normal">Clientes</h1>

                     <a href="customers.php" target="_blank" class="btn btn-primary">
                         <figure>
                             <img src="image/design/clientes.jpg" class="img-fluid rounded" alt="productos">
                         </figure>
                         Ir
                         <span class="icon-enter"></span>
                     </a>
                 </div>
             </div>




         </section>
         <!--scPanelAdmin -->

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