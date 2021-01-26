<?php 
    
    include_once __DIR__.'/php/authentication/ClsUserSession.php';

    // construct do session_start;
    $userSession = new UserSession(); 


    $userRol = $userSession->getCurrentRol();
    // if there's a session rol and it's different than 1 = admin then go to index
    if( !isset($userRol) ){
        header($userSession->getAdmin_Login());
    }else{
        if($userRol != 1){
            header($userSession->getAdmin_Login());
        }
    }
?>
 <!DOCTYPE html>
 <html lang="es">

 <head>
     <title>Administración de Productos |Institucional la Cartaginesa</title>

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

     <div class="container">

         <h1 class="text-center my-3">Administración de Categorias y Productos</h1>

         <section id="adminCatalogo" class="row d-flex mt-3">

             <!-- add categoria -->
             <article id="" class="col-md-6 artAdmin">

                 <div class="card-deck">
                     <div class="card">
                         <div class="card-body">

                             <form action="./php/db/category/insertCategory.php" method="POST" class="col mb-2"
                                 id="form-agregar-categoria">
                                 <h4 class="card-title">Agregar Categoría</h4>

                                 <div class="form-group">
                                     <label for="txtAddCategoria">Nombre Categoría</label>

                                     <input id="txtAddCategoria" class="form-control" type="text"
                                         name="txtAddCategoria">

                                 </div>

                                 <input id="btnAddCategoria" type="submit" value="Agregar"
                                     class="btn btn-primary form-control">

                             </form>
                         </div>
                         <!--c body -->
                     </div>
                     <!-- card -->

                 </div>
                 <!-- deck -->
             </article>

             <!-- Delete Categoria -->
             <article id="" class="col-md-6 artAdmin">

                 <div class="card-deck">

                     <div class="card">
                         <div class="card-body">

                             <form id="form-eliminar-categoria" action="php/models/model_delete_categoria.php"
                                 method="POST" class="col mb-2">
                                 <h4 class="card-title">Eliminar Categoría</h4>

                                 <div class="form-group">
                                     <label for="txtDeleteCategoria">Nombre Categoría</label>

                                     <select name="sltDltCategoria" id="sltDltCategoria"
                                         class="sltDltCateg form-control">
                                         <option value="">---</option>
                                     </select>

                                 </div>

                                 <input id="btnDeleteCategoria" type="submit" value="Eliminar"
                                     class="btn btn-danger form-control">

                             </form>
                         </div>
                         <!--c body -->
                     </div>
                     <!-- card -->

                 </div>
                 <!-- deck -->
             </article>

             <!-- Add producto -->
             <article id="artAddProducto" class="mt-4 col-md-6 artAdmin">

                 <div class="card-deck">
                     <div class="card">
                         <div class="card-body">

                             <form action="php/models/model_insert_product.php" method="POST"  enctype="multipart/form-data" class="col mb-2"
                                 id="form-insert-product">
                                 <h4 class="card-title">Agregar Producto</h4>


                                 <div class="form-group">
                                     <label for="txtAddProducto">Nombre Producto</label>
                                     <input id="txtAddProducto" class="form-control" type="text" name="txtAddProducto">

                                 </div>

                                 <div class="form-group">
                                     <label for="txtAddId">ID</label>
                                     <input id="txtAddId" class="form-control" type="text" name="txtAddId">

                                 </div>

                                 <div class="form-group">

                                    <label for="sltAddCategoriaProd">Categoría</label>

                                    <select name="sltAddCategoriaProd" id="sltAddCategoriaProd" class="sltDltCateg form-control">
                                        <option value="--">---</option>
                                    </select>
                                
                                 </div>

                                 <div class="form-group">
                                     <label for="txtAddDescripcion">Descripción</label>
                                     <textarea name="txtAddDescripcion" id="txtAddDescripcion" class="form-control" "></textarea>
   
                                </div>
   
                                <div class=" form-group">
                                    <label for="file" class="btn btn-primary">Insertar imagen
                                        <span class="ml-2 icon-cloud-upload"></span>
                                       
                                    </label>

                                    <input id="file" class="form-control col-6 float-right" type="file" name="file"> 
                                    
                                </div>
   
                                <input type="submit" value="Agregar" id="btnAddProducto" class="btn btn-primary form-control">
   
                            </form>
                        </div>
                        <!--c body -->
                    </div>
                    <!-- card -->
   
                </div>
                <!-- deck -->
            </article>
 
             
             <!-- Delete producto -->
             <article id="artDltProducto" class="mt-4 col-md-6 artAdmin">
    
                <div class="card-deck">
   
                    <div class="card">
                        <div class="card-body">
                            <form class="col mb-2" id="form-eliminar-producto">
                                <h4 class="card-title">Eliminar Producto</h4>
   
                                <div class="form-group">
                                    <label for="sltDltCategoriaProducto">Categoría</label>
                                    <select name="sltDltCategoriaProducto" id="sltDltCategoriaProducto" class="sltDltCateg form-control">
                                        <option value="none">---</option>
                                    </select>
                                </div>
   
                                <div class="form-group">
                                    <label for="sltDltProducto">Nombre Producto</label>
                                    <select name="sltDltProducto" id="sltDltProducto" class="form-control">
                                        <!-- <option value="">---</option> -->
                                     
                                    </select>
                                </div>
   
                                <div class="form-group">
                                    <label for="txtIdProduct">ID</label>

                                    <input type="text" id="txtIdProduct" class="form-control" value="" name="txtIdProduct" disabled>
                                </div>
                             
                                <figure class="text-center">
                                    <img id="DltIdProduct" src="image/design/productoNoselecionado.jpg" height="170" width="auto" alt="Imagen de producto a eliminar">
                                </figure>
   
                                <input type="submit" value="Eliminar" id="btnDltProduct" class="btn btn-danger form-control  ">
   
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

     <!-- * lib -->
     <script src="lib/jquery-3.4.1.min.js"> </script>
     <script src="lib/popper.min.js"> </script>
     <script src="lib/bootstrap/js/bootstrap.min.js"> </script>

     <!-- ? Category PDO -->
     <!-- ? service general category -->
     <script src="js/admin-products/category/service-category.js"></script>

     <!--* General -->
     <script src="js/controller/UIGeneral.js"></script>

     <!-- * controllers category -->
     <script src="js/admin-products/category/controller_add_categoria.js"></script>
     <script src="js/admin-products/category/controller-list-category.js"></script>

     <script src="js/admin-products/category/controller-delete-category.js"></script>

     <!-- ? Products PDO-->
     <script src="js/admin-products/products/service-product.js"></script>

     <script src="js/admin-products/products/controller-insert-product.js"></script>
     <script src="js/admin-products/products/controller-getProducts.js"></script>
     <script src="js/admin-products/products/controller-delete-product.js"></script>

     <script src="js/controller/controller_mjs_alertas.js"></script>


 </body>


 </html>