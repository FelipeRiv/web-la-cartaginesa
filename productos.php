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
    <div class="content">

        <?php 
            include __DIR__.'/php/components/global/menu.php';    
        ?>

        <div class="container height-fix">

            <h1>Productos</h1>
            <!--section filtro -->
            <section id="filtroProductos" class="">
                <form action="" class="row" id="productOptionsForm">

                    <div class="form-group col-9 col-sm-7 col-md-6 col-lg-4">
                        <label for="sltGetCategoria">Categoría</label>
                        <select name="sltGetCategoria" id="sltGetCategoria" class="form-control border-primary">
                            <option value="all">Todos</option>
                        </select>

                    </div>
                    <!-- <div class="form-group col-3"> -->
                        <!-- <label for="sltOrdenProductos">Orden</label> -->
                        <!-- <select name="sltOrdenProductos" id="sltOrdenProductos" class="form-control border-primary"> -->
                            <!-- <option value="">A-Z</option> -->
                            <!-- <option value="">Z-A</option> -->
                        <!-- </select> -->
                    <!-- </div> -->
                    <div class="row">
                        <div class="form-group col-12 container row ml-auto ">
                            <label for="txtBuscarProductos" class="col-12 pl-0">Buscar
                            </label>
                            <input id="txtBuscarProductos" class="form-control col-9 col-sm-9 col-md-6 col-lg-8 border-primary" type="text" name="">

                            <button id="btnBuscarProductos" class="form-control col-2 col-sm-2 col-md-3 col-lg-3 ml-1 form-control btn btn-success">
                                <span class="icon-search "></span>
                            </button>
                        </div>

                    </div>
                </form>
            </section>

            <section id="sectionProducts" class="items-container">

            </section>

            <nav aria-label="...">
                    <ul class="pagination  flex-wrap pages">
                    
                    </ul>
            </nav>

        </div>
        <!-- container -->

        <!-- Templates -->
        <?php 
            include __DIR__.'/php/components/products/template-product.php';
        ?>
        <!-- End Templates -->

        <?php 
            include __DIR__.'/php/components/global/footer.php';    
        ?>
    
    </div>

     <!-- -- lib -->
     <!-- * axios -->
     <script src="lib/axios.min.js"></script>

     <!--  * jquery boostrap -->
     <script src="lib/jquery-3.4.1.min.js"> </script>
     <script src="lib/popper.min.js"> </script>
     <script src="lib/bootstrap/js/bootstrap.min.js"> </script>

     <!-- main code -->

     <!-- ? oop code -->
     <script src="js/controller/UIGeneral.js"></script>
     <script src="js/products/app-products.js"></script>


 </body>


 </html>