 <!DOCTYPE html>
 <html lang="es">

 <head>
     <title>Inicio - Institucional la Cartaginesa</title>

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
     <?php include __DIR__.'/php/components/global/menu.php'; 
     ?>

     <div class="container">
         <h1 class="h3 text-center mb-3">Bienvenidos a Institucional La Cataginesa</h1>

         <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="./image/design/clientes.jpg" class="d-block w-100 rounded " alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Cotice con nosotros</h5>
                  <p>Consulte sobre una cotización de los productos para su empresa, negocio u hogar.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="./image/design/productos.jpg" class="d-block w-100 rounded " alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Productos Ecónomicos</h5>
                  <p>Los mejores precios para usted.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="./image/design/userComputer.jpg" class="d-block w-100 rounded " alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Third slide label</h5>
                  <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
         
     </div>

    <?php 
        include __DIR__.'/php/components/global/footer.php';
    ?>

     <script src="lib/jquery-3.4.1.min.js"> </script>
     <script src="lib/popper.min.js"> </script>
     <script src="lib/bootstrap/js/bootstrap.min.js"> </script>
 </body>


 </html>