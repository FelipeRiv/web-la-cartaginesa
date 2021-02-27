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

    <!-- <link rel="stylesheet" href="lib/datatables/jquery.dataTables.min.css"> -->
    
     <!-- <link rel="stylesheet" href="css/normalize.css"> -->
     <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="lib/bootstrap/css/bootstrap-reboot.min.css">
     <link rel="stylesheet" href="lib/bootstrap/css/bootstrap-grid.min.css">
     
  
    <link rel="stylesheet" href="css/dataTables.css">

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
        <div class="row">

             <h1 class="mb-4">Carrito de Cotización</h1>

             <div class="d-none col-12" id="empy-cart">

                <h2 class="border-bottom">Su carrito está vacío</h2>
                <h3>Agregue productos para cotizar con nosotros</h3>
                <a href="./productos.php" class="btn btn-success mt-3">Productos</a>

             </div>

            <div class="d-none table-responsive" id="div-cart">
    
                <table class="tb-cart table  table-bordered table-dark" id="tb-cart">
    
                    <thead class="tb-cart__thead">
                        <tr>
                            <th scope="col">Imágen</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">ID-Código</th>
                        </tr>
                    </thead>
    
    
                    <tbody class="tb-cart__tbody">
    
                    </tbody>
    
    
                </table>
    
            </div>

            <?php include "./php/components/cart/form-cart.php"; ?>

         </div>
     </div>

    <?php 
        include __DIR__.'/php/components/global/footer.php';    
    ?>

     <script src="lib/axios.min.js"></script>

     <script src="lib/jquery-3.4.1.min.js"> </script>
     <script src="lib/popper.min.js"> </script>
     <script src="lib/bootstrap/js/bootstrap.min.js"> </script>

     <script src="./lib/datatables/jquery.dataTables.min.js"></script>

     <script src="./js/cart/controller-cart.js"></script>

     <script src="./js/controller/controller-form-general.js"></script>


     <script >

     </script>
 </body>


 </html>

 <!-- 

                             <tr class="tb-cart__body-row flex-wrap">
    
                            <td class="tb-cart__cell tb-cart--cell-img">
                                <figure class="tb-cart__main-figure">
                                    <img class="tb-cart__main-img" src="https://picsum.photos/800" alt="" srcset="">
                                </figure>
                            </td>
    
                            <td class="tb-cart__cell tb-cart--cell-name">Detergente Jabon Zote Plus Ultra lorem100</td>
    
                            <td class="tb-cart__cell tb-cart--cell-quantity">
    
                                <div class="tb-cart__form-group form-group col-12 d-flex  ">
                                    <input type="text" class="col-6 form-control  p-1">
                                    <button class="col-1 mx-1 btn btn-success" data-toggle="tooltip" data-placement="top" title="Actualizar">
                                        <span class="icon-plus"></span>
                                    </button>
    
                                    <button class="col-1 mx-1 btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                        <span class="icon-minus"></span>
                                    </button>
    
                                    <button class="col-1 mx-1 btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar"><span class="icon-bin"></span>
                                    </button>
                                </div>
    
                            </td>
    
                            <td class="tb-cart__cell tb-cart--cell-id">34534543khjsd</td>
                        </tr>
  -->